$(document).ready(function () {
    $.ajax({
        url: 'controller/gestionRendezVous.php',
        data: {op: ''},
        type: 'POST',
        success: function (data, textStatus, jqXHR) {
            remplir(data);
            console.log(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR);
        }
    });
    $.ajax({
            url: 'controller/gestionRendezVous.php',
            data: {op: 'today'},
            type: 'POST',
            success: function (data, textStatus, jqXHR) {
                var contenu = $('#today');
                var ligne = "";
                
                for (i = 0; i < data.length; i++) {
                    var ana =  data[i].id ;
                    ligne += '<tr><th scope="row">' + data[i].id + '</th>';
                    ligne += '<td class="fw-bold">' + data[i].time + '</td>';
                    ligne += '<td class="fw-bold">' + data[i].patient + '</td>';
                    ligne += '<td class="fw-bold">' + data[i].medecin + '</td>';
                    ligne += '<td class="fw-bold">' + data[i].service + '</td>';
                    ligne += '<td class="fw-bold">' + data[i].specialite + '</td>';
                    ligne += '<td><button type="button" class="btn btn-outline-primary modifier">present</button></td>';
                    ligne += '<td><button type="button" class="btn btn-outline-danger abscent">abscent</button></td>';
                    ligne += '<td><a href="./users-profile.php?id='+ana+'" class="btn btn-outline-info ">plus</a></td></tr>';

                }
                contenu.html(ligne);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus);
            }
        });
    $("#datef").change(function () {
        onchange();
    });
    function loadHistorique( datef) {
        console.log(datef);
        $.ajax({
            url: 'controller/gestionRendezVous.php',
            data: {op: 'historique', datef: datef},
            type: 'POST',
            success: function (data, textStatus, jqXHR) {
                var contenu = $('#rv');
                var ligne = "";
                var tp =[];
                
                for (i = 0; i < data.length; i++) {
                    var ana =  data[i].id ;
                    ligne += '<tr><th scope="row">' + data[i].id + '</th>';
                    ligne += '<td>' + data[i].date + '</td>';
                    ligne += '<td>' + data[i].patient + '</td>';
                    ligne += '<td>' + data[i].medecin + '</td>';
                    ligne += '<td>' + data[i].service + '</td>';
                    ligne += '<td>' + data[i].specialite + '</td>';
                    ligne += '<td>' + data[i].etat + '</td></tr>';
                    //ligne += '<td><button type="button" class="btn btn-outline-secondary modifier">Modifier</button></td>';
                    //ligne += '<td><button type="button" class="btn btn-outline-secondary modifier">Modifier</button></td></tr>';

                }
                contenu.html(ligne);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus);
            }
        });
    }
    function onchange() {
            
        if ( $("#datef").eq(0).val().length == 10)
            loadHistorique($("#datef").eq(0).val());
        else if ( $("#datef").eq(0).val().length != 0)
            $("#table-content").html('');
        else
            loadHistorique('', '');

    }
    function remplir(data) {
        var contenu = $('#rv');
        var ligne = "";
        console.log(data);
        for (i = 0; i < data.length; i++) {
            var ana =  data[i].id ;
            ligne += '<tr><th scope="row">' + data[i].id + '</th>';
            ligne += '<td>' + data[i].date + '</td>';
            ligne += '<td>' + data[i].patient + '</td>';
            ligne += '<td>' + data[i].medecin + '</td>';
            ligne += '<td>' + data[i].service + '</td>';
            ligne += '<td>' + data[i].specialite + '</td>';
            ligne += '<td>' + data[i].etat + '</td></tr>';
            //ligne += '<td><button type="button" class="btn btn-outline-secondary modifier">Modifier</button></td>';
            //ligne += '<td><button type="button" class="btn btn-outline-secondary modifier">Modifier</button></td></tr>';

        }
        contenu.html(ligne);
        
    }
    $(document).on('click', '.modifier', function () {
        
        var _id = $(this).closest('tr').find('th').text();
        
        console.log(_id);
        $.ajax({
            url: 'controller/gestionRendezVous.php',
            data: {op: 'present',id:_id},
            type: 'POST',
            success: function (data, textStatus, jqXHR) {
                window.location.reload();
                /*console.log(data);
                var contenu = $('#today');
                var ligne = "";
                
                for (i = 0; i < data.length; i++) {
                    ligne += '<tr><th scope="row">' + data[i].id + '</th>';
                    ligne += '<td>' + data[i].date + '</td>';
                    ligne += '<td>' + data[i].patient + '</td>';
                    ligne += '<td>' + data[i].medecin + '</td>';
                    ligne += '<td>' + data[i].service + '</td>';
                    ligne += '<td>' + data[i].specialite + '</td>';
                    ligne += '<td><button type="button" class="btn btn-outline-primary modifier">present</button></td>';
                    ligne += '<td><button type="button" class="btn btn-outline-danger modifier">abscent</button></td>';
                    ligne += '<td><button type="button" class="btn btn-outline-info modifier">plus</button></td></tr>';

                }
                contenu.html(ligne);*/
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus);
            }
        });
        
    });
    $(document).on('click', '.abscent', function () {
        
        var _id = $(this).closest('tr').find('th').text();
        var _nom = $(this).closest('tr').find('td').eq(1).text();
        console.log(_id);
        $.ajax({
            url: 'controller/gestionRendezVous.php',
            data: {op: 'abscent',id:_id, nom:_nom},
            type: 'POST',
            success: function (data, textStatus, jqXHR) {
                //console.log(data,textStatus,jqXHR);
                window.location.reload();
                /*console.log(data);
                var contenu = $('#today');
                var ligne = "";
                
                for (i = 0; i < data.length; i++) {
                    ligne += '<tr><th scope="row">' + data[i].id + '</th>';
                    ligne += '<td>' + data[i].date + '</td>';
                    ligne += '<td>' + data[i].patient + '</td>';
                    ligne += '<td>' + data[i].medecin + '</td>';
                    ligne += '<td>' + data[i].service + '</td>';
                    ligne += '<td>' + data[i].specialite + '</td>';
                    ligne += '<td><button type="button" class="btn btn-outline-primary modifier">present</button></td>';
                    ligne += '<td><button type="button" class="btn btn-outline-danger modifier">abscent</button></td>';
                    ligne += '<td><button type="button" class="btn btn-outline-info modifier">plus</button></td></tr>';

                }
                contenu.html(ligne);*/
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus);
            }
        });
        
    });
    $.ajax({
            url: 'controller/gestionRendezVous.php',
            data: {op: 'noir'},
            type: 'POST',
            success: function (data, textStatus, jqXHR) {
                var contenu = $('#noir');
                console.log(textStatus);
                console.log(data);
                var ligne = "";
                
                for (i = 0; i < data.length; i++) {
                    var ana =  data[i].id ;
                    ligne += '<tr><th scope="row">' + data[i].id + '</th>';
                    ligne += '<td class="fw-bold">' + data[i].date + '</td>';
                    ligne += '<td class="fw-bold">' + data[i].time + '</td>';
                    ligne += '<td class="fw-bold">' + data[i].patient + '</td>';
                    ligne += '<td class="fw-bold">' + data[i].justifier + '</td>';
                    ligne += '<td><button type="button" class="btn btn-outline-primary accepter">accepter</button></td>';
                    //ligne += '<td><button type="button" class="btn btn-outline-danger refuser">refuser</button></td>';
                    ligne += '<td><a href="./users-profile.php?id='+data[i].cin+'" class="btn btn-outline-info ">plus</a></td></tr>';

                }
                contenu.html(ligne);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus);
                console.log(jqXHR);
                console.log(errorThrown);
            }
        });
        $(document).on('click', '.accepter', function () {
            var _cin = $(this).closest('tr').find('th').text();
            var _nom = $(this).closest('tr').find('td').eq(2).text();
            console.log(_cin);
            $.ajax({
            url: 'controller/gestionRendezVous.php',
            data: {op: 'accepter',id:_cin, nom:_nom},
            type: 'POST',
            success: function (data, textStatus, jqXHR) {
                console.log(data);
                console.log(textStatus);
                console.log(jqXHR);
                window.location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus);
                console.log(jqXHR);
                console.log(errorThrown);
            }
        });
        });


});