$(document).ready(function () {
    /*$('#currentPassword').on('input',function(){
        document.getElementById("currentPassword").style.backgroundColor = "white";
    });
    $('#newPassword').on('input',function(){
        document.getElementById("currentPassword").style.backgroundColor = "white";
    });*/
    var _id = $('#id1').val();
    $.ajax({
            url: '../../controller/gestionRendezVous.php',
            data: {op: 'refuser', id: _id},
            type: 'POST',
            success: function (data, textStatus, jqXHR) {
                var contenu = $('#missing');
                var ligne = "";
                
                for (i = 0; i < data.length; i++) {
                    var ana =  data[i].id ;
                    ligne += '<tr><th scope="row">' + data[i].id + '</th>';
                    ligne += '<td>' + data[i].date + '</td>';
                    ligne += '<td>' + data[i].time + '</td>';
                    ligne += '<td>' + data[i].medecin + '</td>';
                    ligne += '<td>' + data[i].service + '</td>';
                    ligne += '<td>' + data[i].specialite + '</td>';
                    //ligne += '<td>' + data[i].etat + '</td></tr>';
                    ligne += '<td><button type="button" class="btn btn-outline-primary justifier">justifier</button></td></tr>';
                    //ligne += '<td><button type="button" class="btn btn-outline-secondary modifier">Modifier</button></td></tr>';

                }
                contenu.html(ligne);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus);
                console.log(errorThrown);
                console.log(jqXHR);
            }
        });
    $(document).on('click', '.justifier', function () {
        var _cin = $(this).closest('tr').find('th').text();
        
        console.log(_cin);
        var ligne = '<div class="form-group mt-3"><textarea id="area" class="form-control" name="message" rows="5" placeholder="Message (Justification d\'abscence)"></textarea><div class="validate"></div><div class="text-center"><button type="button" class="btn btn-outline-primary envoyer">Envoyer</button></div></div>';
        $('#profile-settings').html(ligne);
        $(document).on('click', '.envoyer', function () {
            var abc = $('#area');
            console.log(abc.val());
            console.log(_cin);
            $.ajax({
                url: '../../controller/gestionRendezVous.php',
                data: {op: 'jus', id: _cin, justifier:abc.val()},
                type: 'POST',
                success: function (data, textStatus, jqXHR) {
                    console.log(data);
                    console.log(textStatus);
                    console.log(jqXHR);

                    $('#profile-settings').html('<div class="alert alert-success alert-dismissible fade show" role="alert">Votre justification a été envoyé avec succès!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div><div class="text-center"><button type="button" class="btn btn-outline-danger profile">Profile</button></div>');
                    $(document).on('click', '.profile', function () {
                        window.location.reload();
                    });
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR);
                    console.log(errorThrown);
                }
            });
        });
    });
    
    var ind = $('#ind');
    $('#renewPassword').on('input',function(){
        //var currentPassword = $('#currentPassword').val();
        var newPassword = $('#newPassword').val();
        var renewPassword = $('#renewPassword').val();
        var idUser = $('#idUser').val();
        var realPassword = $('#realPassword').val();
        if(renewPassword == newPassword){
            if(newPassword.length != 0 ){
                document.getElementById("renewPassword").style.backgroundColor = "white";
                document.getElementById("newPassword").style.backgroundColor = "white";
                
                $('#edit').click(function () {
                    var currentPassword = $('#currentPassword').val();
                    var newPassword = $('#newPassword').val();
                    var renewPassword = $('#renewPassword').val();
                    var idUser = $('#idUser').val();
                    var realPassword = $('#realPassword').val();
                    console.log(currentPassword);
                    console.log(realPassword);
                    console.log(idUser);
                    console.log(newPassword);
                    if(currentPassword.length != 0 ){
                        document.getElementById("currentPassword").style.backgroundColor = "white";
                    $.ajax({
                        url: 'controller/gestionUser.php',
                        data: {op: 'update', id: idUser, password:newPassword, email: 'ff', role:'medecin', realpassword:realPassword, currentPassword:currentPassword},
                        type: 'POST',
                        success: function (data, textStatus, jqXHR) {
                            console.log(textStatus);
                            console.log(data);
                            console.log(jqXHR);
                            $('#currentPassword').val('');
                            $('#newPassword').val('');
                            $('#renewPassword').val('');
                            ind.html('<div class="alert alert-success alert-dismissible fade show" role="alert">changement de mot de passe réussit!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            console.log(textStatus);
                            $('#currentPassword').val('');
                            $('#newPassword').val('');
                            $('#renewPassword').val('');
                            ind.html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Votre mot de passe est incorrect!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                        }
                    });
                    
                    }else{
                        document.getElementById("currentPassword").style.backgroundColor = "pink";
                    }
                });
            }else{
                document.getElementById("newPassword").style.backgroundColor = "pink";
            }
        }else{
            document.getElementById("renewPassword").style.backgroundColor = "pink";
        }   
    });
    
    
    $('#btn').click(function () {
        var id = $('#id');
        var id_user = $('#id_user');
        var service = $('#service');
        var specialite = $('#specialite');
        var prenom = $("#prenom");
        var nom = $("#nom");
        var cin = $("#cin");
        var date_naissance = $('#date_naissance');
        var photo = $('#photo');
        var sans = $('#photo1');
        var telephone = $('#telephone');
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
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                    }
                });
                $.ajax({
                    url: 'controller/gestionMedecin.php',
                    data: {op: 'update', id: id.val(), nom: nom.val(), specialite:specialite.val(), service:service.val(), id_user:id_user.val(), prenom: prenom.val(), telephone: telephone.val(), cin: cin.val(), date_naissance:date_naissance.val(), photo:photo.val().split('\\').pop()},
                    type: 'POST',
                    success: function (data, textStatus, jqXHR) {
                        console.log(textStatus);
                        
                        window.location.reload();
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(textStatus);
                        console.log(jqXHR);
                        console.log(errorThrown);
                    }
                });
            }else{
                $.ajax({
                    url: 'controller/gestionMedecin.php',
                    data: {op: 'update', id: id.val(), nom: nom.val(), specialite:specialite.val(), service:service.val(), id_user:id_user.val(), prenom: prenom.val(), telephone: telephone.val(), cin: cin.val(), date_naissance:date_naissance.val(), photo:sans.val()},
                    type: 'POST',
                    success: function (data, textStatus, jqXHR) {
                        console.log(textStatus);
                        window.location.reload();
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(textStatus);
                        console.log(jqXHR);
                        console.log(errorThrown);
                    }
                });
            }
    
    });
    $('#bimo').click(function(){
        console.log('ybjn');
        document.getElementById("oo").src='img/default.jpg';
        document.getElementById("photo1").value='default.jpg';
        //document.getElementById("photo").value='default.jpg';
        
    });
});