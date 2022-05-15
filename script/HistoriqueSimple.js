$(document).ready(function () {
    var employe = $('#employe').attr('cin');
    loadHistorique('', '');
    function loadHistorique(dated, datef) {
        $.ajax({
            url: 'controller/gestionPointage.php',
            data: {op: 'historique', cin: employe, dated: dated, datef: datef},
            type: 'POST',
            success: function (data, textStatus, jqXHR) {
                var line = '';
                var heure = '';
                for (var i = 0; i < data.length; i++) {
                    line += '<tr><th>' + data[i].date + '</th>'
                    line += '<td>' + data[i].heure_entrer + '</td>'
                    line += '<td>' + data[i].heure_sortie + '</td>'
                    if (data[i].minute != '0')
                        line += '<td>' + data[i].heure + 'h ' + data[i].minute + 'min</td></tr>';
                    else
                        line += '<td>' + data[i].heure + 'h</td></tr>';
                }
                $("#table-content").html(line);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus);
            }
        });
    }
    $("#check").change(function () {
        if ($(this).eq(0).is(":checked")) {
            $("#cardDate").eq(0).removeClass("d-none");
            $("#dated").eq(0).attr({disabled: false});
        } else {
            $("#cardDate").eq(0).addClass("d-none");
            $("#dated").eq(0).attr({disabled: true});
            $("#datef").eq(0).attr({disabled: true});
            $("#dated").eq(0).val('');
            $("#datef").eq(0).val('');
        }
        onchange();
    });
    function onchange() {
            if ($("#check").is(":checked")) {
                if ($("#dated").eq(0).val().length == 10 && $("#datef").eq(0).val().length == 10)
                    loadHistorique($("#dated").eq(0).val(), $("#datef").eq(0).val());
                else if ($("#dated").eq(0).val().length != 0 || $("#datef").eq(0).val().length != 0)
                    $("#table-content").html('');
                else
                    loadHistorique('', '');
            } else
                loadHistorique('', '');

    }
    $("#datef").change(function () {
        onchange();
    });
    $("#dated").change(function () {
        if ($(this).eq(0).val().length == 10) {
            $("#datef").eq(0).attr({disabled: false});
        } else {
            $("#datef").eq(0).attr({disabled: true});
        }
        onchange();
    });

});
