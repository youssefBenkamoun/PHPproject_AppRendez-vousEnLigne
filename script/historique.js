$(document).ready(function () {
    loadHistorique('', '', '');
    function loadHistorique(cin, dated, datef) {
        $.ajax({
            url: 'controller/GestionPointage.php',
            data: {op: 'historique', cin: cin, dated: dated, datef: datef},
            type: 'POST',
            success: function (data, textStatus, jqXHR) {
                var line = '';
                var heure = '';
                for (var i = 0; i < data.length; i++) {
                    line += '<tr><th>' + data[i].date + '</th>'
                    line += '<td>' + data[i].nom +' '+data[i].prenom + '</td>'
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
    $.ajax({
        url: 'controller/GestionEmploye.php',
        data: {op: ''},
        type: 'POST',
        success: function (data, textStatus, jqXHR) {
            var option = '<option selected>Tout</option>';
            for (var i = 0; i < data.length; i++) {
                option += '<option value="' + data[i].cin + '">' + data[i].nom + ' ' + data[i].prenom + '</option>';
            }
            $("#select").html(option);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus);
        }
    });
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
        if ($("#select").val() == 'Tout') {
            if ($("#check").is(":checked")) {
                if ($("#dated").eq(0).val().length == 10 && $("#datef").eq(0).val().length == 10)
                    loadHistorique('', $("#dated").eq(0).val(), $("#datef").eq(0).val());
                else if ($("#dated").eq(0).val().length != 0 || $("#datef").eq(0).val().length != 0)
                    $("#table-content").html('');
                else
                    loadHistorique('', '', '');
            } else
                loadHistorique('', '', '');
        } else {
            if ($("#check").is(":checked")) {
                if ($("#dated").eq(0).val().length == 10 && $("#datef").eq(0).val().length == 10)
                    loadHistorique($("#select").val(), $("#dated").eq(0).val(), $("#datef").eq(0).val());
                else if ($("#dated").eq(0).val().length != 0 || $("#datef").eq(0).val().length != 0)
                    $("#table-content").html('');
                else
                    loadHistorique($("#select").val(), '', '');
            } else
                loadHistorique($("#select").val(), '', '');
        }
    }
    $("#select").change(function () {
        onchange();
    });
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
