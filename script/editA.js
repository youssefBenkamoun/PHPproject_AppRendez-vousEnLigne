$(document).ready(function () {
    /*$('#currentPassword').on('input',function(){
        document.getElementById("currentPassword").style.backgroundColor = "white";
    });
    $('#newPassword').on('input',function(){
        document.getElementById("currentPassword").style.backgroundColor = "white";
    });*/
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
                        data: {op: 'update', id: idUser, password:newPassword, email: 'ff', role:'admin', realpassword:realPassword, currentPassword:currentPassword},
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
                    url: 'controller/gestionAdmin.php',
                    data: {op: 'update', id: id.val(), nom: nom.val(), id_user:id_user.val(), prenom: prenom.val(), telephone: telephone.val(), cin: cin.val(), date_naissance:date_naissance.val(), photo:photo.val().split('\\').pop()},
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
                    url: 'controller/gestionAdmin.php',
                    data: {op: 'update', id: id.val(), nom: nom.val(), id_user:id_user.val(), prenom: prenom.val(), telephone: telephone.val(), cin: cin.val(), date_naissance:date_naissance.val(), photo:sans.val()},
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