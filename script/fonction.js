$(document).ready(function () {
    var service = $("#service");
    var code = $("#code");
    var libelle = $("#libelle");
    var __id;

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
            remplir(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus);
        }
    });

    


    $('#btn').click(function () {
        var service = $("#service");
    var code = $("#code");
    var libelle = $("#libelle");
       
        if ($('#btn').text() == 'Ajouter') {
            $.ajax({
                url: 'controller/gestionSpecialite.php',
                data: {op: 'add', nom: libelle.val(), code: code.val(), service: service.val()},
                type: 'POST',
                success: function (data, textStatus, jqXHR) {
                    console.log(textStatus);
                    console.log(jqXHR);
                    remplir(data);
                    libelle.val('');
                    code.val('');
                    service.val('Choisi un service');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus);
                }
            });
            
        }

    });
    $('#send').click(function () {
        var service = $("#service");
    var code = $("#code");
    var libelle = $("#libelle");
        
        var specialite = $("#specialite");
        if ($('#send').text() == 'Send') {
            
            $.ajax({
                
                url: 'controller/gestionEmploye.php',
                data: {op: 'findS',specialite: specialite.val()},
                type: 'POST',
                success: function (data, textStatus, jqXHR) {
                    console.log("ana");
                    afficher(data);
                    //specialite.val('');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus);
                    alert("error");
                }
            });
            
        }

    });

    $(document).on('click', '.supprimer', function () {
        
        var id = $(this).closest('tr').find('th').text();
        $.ajax({
            url: 'controller/gestionSpecialite.php',
            data: {op: 'delete', id: id},
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
        var id = $(this).closest('tr').find('th').text();
        var libelle = $(this).closest('tr').find('td').eq(0).text();
        var code = $(this).closest('tr').find('td').eq(1).text();
        var service = $(this).closest('tr').find('td').eq(2).text();
        btn.text('Modifier');
        $("#code").val(code);
        $("#libelle").val(libelle);
        $("#service").val(service);
        $("#id").val(id);
        btn.click(function () {
            if ($('#btn').text() == 'Modifier') {
                $.ajax({
                    url: 'controller/gestionSpecialite.php',
                    data: {op: 'update', id: id,service: $("#service").val() , nom: $("#libelle").val(), code: $("#code").val()},
                    type: 'POST',
                    success: function (data, textStatus, jqXHR) {
                        console.log(textStatus);
                        console.log(jqXHR);
                        remplir(data);
                        $("#code").val('');
                        $("#libelle").val('');
                        $("#service").val('');
                        btn.text('Ajouter');
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                       
                        console.log(textStatus);
                    }
                });
            }
        });
    });
    function remplir(data) {
        var contenu = $('#table-content');
        var ligne = "";
        var choose = $('#specialite');
        var select = "";
        
        for (i = 0; i < data.length; i++) {
            var ana =  data[i].service ;
            select += '<option value="' + ana + '">' + ana + '</option>';
            ligne += '<tr><th scope="row">' + data[i].id + '</th>';
            ligne += '<td>' + data[i].libelle + '</td>';
            ligne += '<td>' + data[i].code  + '</td>';
            ligne += '<td value="' + data[i].service + '">' + data[i].libelle + '</td>';
            ligne += '<td><button type="button" class="btn btn-outline-danger supprimer">Supprimer</button></td>';
            ligne += '<td><button type="button" class="btn btn-outline-secondary modifier">Modifier</button></td></tr>';
        }
       
        contenu.html(ligne);
        choose.html(select);
    }
    function afficher(data) {   //hna fin wsalti
        var contenu = $('#table-content');
        
        var ligne = '';
        var choose = $('#specialite');
        var select = "";
       
        for (i = 0; i < data.length; i++) {
            console.log(data[i].id_specialite);
            //var ana =  data[i].service ;
            select += '<option value="'+data[i].id_specialite+'">'+data[i].id_specialite+'</option>';
// <img class="img-thumbnail img-fluid position-absolute float-left" src="img\\' + data[i].photo + '" style="width:300px;height: 300px;object-fit: cover;">
            ligne += '<tr><td><img src="img\\' + data[i].photo + '" alt="Photo"></td>';
            ligne += '<th scope="row">' + data[i].cin + '</th>';
            ligne += '<td>' + data[i].nom + '</td>';
            ligne += '<td>' + data[i].prenom + '</td>';
            ligne += '<td>' + data[i].telephone + '</td>';
            ligne += '<td>' + data[i].email + '</td>';
            ligne += '<td>' + data[i].role + '</td>';
            ligne += '<td value="' + data[i].id_specialite + '">' + data[i].id_specialite + '</td>';
            ligne += '<td value="' + data[i].id_service + '">' + data[i].id_service + '</td>';
            

        }
        console.log(ligne);
        
        rass.html(head);
        contenu.html(ligne);
        choose.html(select);
    }

});

