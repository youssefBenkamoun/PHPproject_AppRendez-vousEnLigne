$(document).ready(function () {
    var _id = $('#id').val();
    $.ajax({
            url: 'controller/gestionRendezVous.php',
            data: {op: 'name', id: _id},
            type: 'POST',
            success: function (data, textStatus, jqXHR) {
                var contenu = $('#historique');
                var ligne = "";
                
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
});


