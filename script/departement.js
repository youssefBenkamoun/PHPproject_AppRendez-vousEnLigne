$(document).ready(function () {
    $.ajax({
        url: 'controller/gestionService.php',
        dataType: 'json',
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
        var code = $("#code");
        var libelle = $("#libelle");
        if ($('#btn').text() == 'Ajouter') {
            $.ajax({
                url: 'controller/gestionService.php',
                data: {op: 'add', libelle: libelle.val(), code: code.val()},
                type: 'POST',
                success: function (data, textStatus, jqXHR) {
                    remplir(data);
                    libelle.val('');
                    code.val('');
                   
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus);
                }
            });
        }

    });
    $('#sends').click(function () {
        
        var service = $("#service");
        if ($('#sends').text() == 'Send') {
            
            $.ajax({
                
                url: 'controller/gestionService.php',
                data: {op: 'findS',service: service.val()},
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
            url: 'controller/gestionService.php',
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
        btn.text('Modifier');
        $("#libelle").val(libelle);
        $("#code").val(code);
        $("#id").val(id);
        btn.click(function () {
            if ($('#btn').text() == 'Modifier') {
                $.ajax({
                    url: 'controller/gestionService.php',
                    data: {op: 'update', id: $("#id").val(), libelle: $("#libelle").val(), code: $("#code").val()},
                    type: 'POST',
                    success: function (data, textStatus, jqXHR) {
                        remplir(data);
                        $("#libelle").val('');
                        $("#code").val('');
                        btn.text('Ajouter');
                    },
                    
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(code);
                        console.log(textStatus);
                    }
                });
            }
        });
    });

    function remplir(data) {
       
        
        var contenu = $('#table-content');
        var ligne = "";
        for (i = 0; i < data.length; i++) {
          
            ligne += '<tr><th scope="row">' + data[i].id + '</th>';
            ligne += '<td>' + data[i].libelle + '</td>';
            ligne += '<td>' + data[i].code + '</td>';
            ligne += '<td><button type="button" class="btn btn-outline-danger supprimer">Supprimer</button></td>';
            ligne += '<td><button type="button" class="btn btn-outline-secondary modifier">Modifier</button></td></tr>';
        }
        contenu.html(ligne);
       
    }
   

});



