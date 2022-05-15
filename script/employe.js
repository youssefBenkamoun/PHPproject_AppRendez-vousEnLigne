$(document).ready(function () {
    var cin = $("#cin");
    var nom = $("#nom");
    var prenom = $("#prenom");
    var email = $("#email");
    var telephone = $("#telephone");
    var password = $("#password");
    var role = $("#role");
    var id_service = $("#id_service");
    var id_specialite = $("#id_specialite");
    var photo = $("#photo");

    photo.change(function () {
        if (photo[0].validity.valid == true) {
            $(".custom-file-label").eq(0).text(photo[0].files[0].name);
        } else {
            $(".custom-file-label").eq(0).text('Choose file...');
        }
    });
    $.ajax({
        url: 'controller/gestionEmploye.php',
        data: {op: ''},
        type: 'POST',
        success: function (data, textStatus, jqXHR) {
            remplir(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus);
        }
    });
    $.ajax({
        url: 'controller/gestionFonction.php',
        data: {op: ''},
        type: 'POST',
        success: function (data, textStatus, jqXHR) {
            var option = '<option selected>Choisi une fonction</option>';
            for (var i = 0; i < data.length; i++) {
                option += '<option value="' + data[i].id_specialite + '">' + data[i].id_specialite + '</option>';
            }
            $('#id_specialite').html(option);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus);
            alert("error");
        }
    });
    $.ajax({
        url: 'controller/GestionDepartement.php',
        data: {op: ''},
        type: 'POST',
        success: function (data, textStatus, jqXHR) {
            var option = '<option selected>Choisi un departement</option>';
            for (var i = 0; i < data.length; i++) {
                option += '<option value="' + data[i].id + '">' + data[i].libelle + '</option>';
            }
            departement.html(option);
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
                fd.append('cin', $('#cin').val());
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
                    url: 'controller/gestionEmploye.php',
                    data: {op: 'add', nom: nom.val(), cin: cin.val(), prenom: prenom.val(), email: email.val(), telephone: telephone.val()
                        , password: password.val(), role: role.val(), id_specialite: id_specialite.val(), id_service: id_service.val(), photo: pic},
                    type: 'POST',
                    success: function (data, textStatus, jqXHR) {
                        remplir(data);
                        cin.val('');
                        nom.val('');
                        prenom.val('');
                        email.val('');
                        telephone.val('');
                        password.val('');
                        role.val('');
                        id_service.val('');
                        id_specialite.val('');
                        photo.val('');
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
        $.ajax({
            url: 'controller/gestionEmploye.php',
            data: {op: 'delete', cin: _cin},
            type: 'POST',
            success: function (data, textStatus, jqXHR) {
                remplir(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus);
            }
        });
    });

    $(document).on('click', '.modifier', function () {
        var btn = $('#btn');
        var _photo = $(this).closest('tr').find('td').eq(0).find('img').attr('src').split('\\').pop();
        var _cin = $(this).closest('tr').find('th').text();
        var _nom = $(this).closest('tr').find('td').eq(1).text();
        var _prenom = $(this).closest('tr').find('td').eq(2).text();
        var _telephone = $(this).closest('tr').find('td').eq(4).text();
        var _email = $(this).closest('tr').find('td').eq(5).text();
        var _role = $(this).closest('tr').find('td').eq(6).text();
        var _id_service = $(this).closest('tr').find('td').eq(7).attr('value');
        var _id_specialite = $(this).closest('tr').find('td').eq(8).attr('value');
        btn.text('Modifier');
        $(".custom-file-label").eq(0).text(_photo);
        cin.val(_cin);
        nom.val(_nom);
        prenom.val(_prenom);
        email.val(_email);
        telephone.val(_telephone);
        role.val(_role);
        password.val("");
        id_service.val(_id_service);
        id_specialite.val(_id_specialite);

        btn.click(function () {
            if ($('#btn').text() == 'Modifier') {
                if (photo[0].files.length != 0) {
                    var fd = new FormData();
                    fd.append('file', photo[0].files[0]);
                    fd.append('cin', $('#cin').val());
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
                        url: 'controller/gestionEmploye.php',
                        data: {op: 'update', nom: nom.val(), cin: cin.val(), prenom: prenom.val(), email: email.val(), telephone: telephone.val()
                            , password: password.val(), role: role.val(), id_specialite: id_specialite.val(), id_service: id_service.val(), photo: pic},
                        type: 'POST',
                        success: function (data, textStatus, jqXHR) {
                            remplir(data);
                            cin.val('');
                            nom.val('');
                            prenom.val('');
                            email.val('');
                            telephone.val('');
                            password.val('');
                            role.val('');
                            id_service.val('');
                            id_specialite.val('');
                            photo.val('');
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
            fd.append('cin', $('#cin').val());
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
            ligne += '<tr><td><img src="img\\' + data[i].photo + '" alt="Photo"></td>';
            ligne += '<th scope="row">' + data[i].cin + '</th>';
            ligne += '<td>' + data[i].nom + '</td>';
            ligne += '<td>' + data[i].prenom + '</td>';
            ligne += '<td>' + data[i].telephone + '</td>';
            ligne += '<td>' + data[i].email + '</td>';
            ligne += '<td>' + data[i].role + '</td>';
            ligne += '<td value="' + data[i].id_service + '">' + data[i].id_service + '</td>';
            ligne += '<td value="' + data[i].id_specialite + '">' + data[i].id_specialite + '</td>';
            ligne += '<td><button type="button" class="btn btn-outline-danger supprimer">Supprimer</button></td>';
            ligne += '<td><button type="button" class="btn btn-outline-secondary modifier">Modifier</button></td></tr>';

        }
        contenu.html(ligne);
    }
});



