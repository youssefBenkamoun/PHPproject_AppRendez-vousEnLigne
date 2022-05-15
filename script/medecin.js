$(document).ready(function () {
    var nom = $("#nom");
    var prenom = $("#prenom");
    var date_naissance = $("#date_naissance");
    var telephone = $("#telephone");
    var photo = $("#photo");
    var cin = $("#cin");
    var password = $("#password");
    var service = $("#service");
    var specialite = $("#specialite");
    var email=$("#email");
    var time=$("#time");
    
    

    photo.change(function () {
        if (photo[0].validity.valid == true) {
            $(".custom-file-label").eq(0).text(photo[0].files[0].name);
        } else {
            $(".custom-file-label").eq(0).text('Choose file...');
        }
    });
   $.ajax({
        url: 'controller/gestionMedecin.php',
        data: {op: ''},
        type: 'POST',
        success: function (data, textStatus, jqXHR) {
            remplir(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus);
        }
    });

   /* $.ajax({
        url: 'controller/gestionMedecin.php',
        data: {op: 'mo'},
        type: 'POST',
        success: function (data, textStatus, jqXHR) {
            remplir(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus);
           
        }
    });
   */

    $.ajax({
        url: 'controller/gestionService.php',
        data: {op: ''},
        type: 'POST',
        success: function (data, textStatus, jqXHR) {
            var option = '<option selected>Choisir un service</option>';
            for (var i = 0; i < data.length; i++) {
                option += '<option value="' + data[i].id + '">' + data[i].libelle + '</option>';
            }
            service.html(option);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus);
        }
    });
    $.ajax({
        url: 'controller/gestionSpecialite.php',
        data: {op: ''},
        type: 'POST',
        success: function (data, textStatus, jqXHR) {
            var option = '<option selected>Choisir une specialite</option>';
            for (var i = 0; i < data.length; i++) {
                option += '<option value="' + data[i].id + '">' + data[i].libelle + '</option>';
            }
            specialite.html(option);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus);
        }
    });

    $('#btn').click(function () {
        if ($('#btn').text() == 'Ajouter') {
            if (photo[0].files.length != 0) {
                var fd = new FormData();
                fd.append('file', photo[0].files[0]);
               
                $.ajax({
                    url: 'controller/upload.php',
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    dataType: "text",
                    success: function (data, textStatus, jqXHR) {
                        if (data != 0) {
                            addEmploye(data);
                        } else {
                            addEmploye('no-photo.png');
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        addEmploye('no-photo.png');
                    }
                });
            } else {
                addEmploye('no-photo.png');
            }
            function addEmploye(pic) {
                $.ajax({
                    url: 'controller/gestionMedecin.php',
                    data: {op: 'add', nom: nom.val(),  prenom: prenom.val(), date_naissance:date_naissance.val(), telephone: telephone.val(), photo: pic,
                        service: service.val(), specialite: specialites.val(),cin: cin.val()},
                    type: 'POST',
                    success: function (data, textStatus, jqXHR) {
                        remplir(data);
                        nom.val('');
                        prenom.val('');
                        date_naissance.val('');
                        telephone.val('');
                        photo.val('');
                        cin.val('');
                        service.val('');
                        specialite.val('');
                        email.val('');
                        password.val('');
                       
                       
                       
                        $(".custom-file-label").eq(0).text('Choose file...');

                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(textStatus);
                    }
                });
            }
        }

    });

    $(document).on('click', '.supprimer', function () {
        var _cin = $(this).closest('tr').find('th').text();
        console.log(_cin);
        $.ajax({
            url: 'controller/gestionMedecin.php',
            data: {op: 'delete', cin: _cin},
            type: 'POST',
            success: function (data, textStatus, jqXHR) {
                remplir(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus);
                console.log(_cin);
            }
        });
    });
    $(document).on('click', '.modifier', function () {
        var btn = $('#btn');
        var _photo = $(this).closest('tr').find('td').eq(0).find('img').attr('src').split('\\').pop();
        var _cin = $(this).closest('tr').find('th').text();
        var _nom = $(this).closest('tr').find('td').eq(1).text();
        var _prenom = $(this).closest('tr').find('td').eq(2).text();
        var _datenaissance = $(this).closest('tr').find('td').eq(3).text();
        var _telephone = $(this).closest('tr').find('td').eq(4).text();
        var _service = $(this).closest('tr').find('td').eq(5).attr('value');
        var _specialite = $(this).closest('tr').find('td').eq(6).attr('value');
        var _time = $(this).closest('tr').find('td').eq(7).text();
        var _email = $(this).closest('tr').find('td').eq(7).text();
        console.log(_photo);
        console.log(_cin);
        console.log(_service);
        console.log(_specialite);
        console.log(_email);
        btn.text('Modifier');
        $(".custom-file-label").eq(0).text(_photo);
        
        cin.val(_cin);
        nom.val(_nom);
        prenom.val(_prenom);
        telephone.val(_telephone);
        date_naissance.val(_datenaissance);
        service.val(_service);
        specialite.val(_specialite);
        time.val(_time);
        email.val(_email);
        console.log(service);
        console.log(specialite);

        btn.click(function () {
            if ($('#btn').text() == 'Modifier') {
                if (photo[0].files.length != 0) {
                    var fd = new FormData();
                    fd.append('file', photo[0].files[0]);
                   
                    $.ajax({
                        url: 'controller/upload.php',
                        type: 'post',
                        data: fd,
                        contentType: false,
                        processData: false,
                        dataType: "text",
                        success: function (data, textStatus, jqXHR) {
                            if (data != 0) {
                                updateEmploye(data);
                            } else {
                                updateEmploye(_photo);
                            }
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            updateEmploye(_photo);
                        }
                    });
                } else {
                    updateEmploye(_photo);
                }
                function updateEmploye(pic) {
                    $.ajax({
                        url: 'controller/gestionMedecin.php',
                        data: {op: 'update', nom: nom.val(),  prenom: prenom.val(), date_naissance:date_naissance.val(), telephone: telephone.val(), photo: pic,
                        service: service.val(), specialite: specialite.val(), cin: cin.val(), email: email.val()},
                        type: 'POST',
                        success: function (data, textStatus, jqXHR) {
                            remplir(data);
                            nom.val('');
                            prenom.val('');
                            date_naissance.val('');
                            telephone.val('');
                            photo.val('');
                            cin.val('');
                            service.val('');
                            specialite.val('');
                            email.val('');
                            password.val('');
                           
                            $(".custom-file-label").eq(0).text('Choose file...');
                            btn.text('Ajouter');
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            console.log(textStatus);
                        }
                    });
                }
            }
        });
    });
    function upload() {
        if (photo.length != 0) {
            var fd = new FormData();
            fd.append('file', photo.files[0]);
            
            $.ajax({
                url: 'controller/upload.php',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response != 0) {
                        console.log(response);// Display image element
                    } else {
                        console.log('file not uploaded');
                    }
                },
            });
        }
    }
    function remplir(data) {
        var contenu = $('#table-content');
        var ligne = "";
        
        for (i = 0; i < data.length; i++) {
            
// <img class="img-thumbnail img-fluid position-absolute float-left" src="img\\' + data[i].photo + '" style="width:300px;height: 300px;object-fit: cover;">
                       
            ligne += '<tr><td><img src="img\\' + data[i].photo + '" alt="Photo" width="80" class="rounded-circle"></td>';
            
            ligne += '<td>' + data[i].nom + '</td>';
            ligne += '<td>' + data[i].prenom + '</td>';
            ligne += '<th scope="row">' + data[i].cin + '</th>';
            ligne += '<td>' + data[i].date_naissance + '</td>';
            ligne += '<td>' + data[i].telephone + '</td>';
     
            ligne += '<td>' + data[i].service + '</td>';
            ligne += '<td>' + data[i].specialite + '</td>';
            ligne += '<td>' + data[i].email + '</td>';
            ligne += '<td>' + data[i].time + '</td>';
           
           
            ligne += '<td><button type="button" class="btn btn-outline-danger supprimer">Supprimer</button></td>';
            ligne += '<td><button type="button" class="btn btn-outline-secondary modifier">Modifier</button></td></tr>';

        }
        contenu.html(ligne);
      
    }

   
});



