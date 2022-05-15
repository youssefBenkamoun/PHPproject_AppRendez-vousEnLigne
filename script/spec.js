$(document).ready(function () {
    var ser = $('#tt').val();
    var spe = $('#pp').val();
    console.log(spe);
    $.ajax({
        url: '../../controller/gestionSpecialite.php',
        data: {op: 'by' , service:ser},
        type: 'POST',
        success: function (data, textStatus, jqXHR) {
        console.log(data);
        console.log(textStatus);
        console.log(jqXHR);
        var oo ='';
        for (var i = 0; i < data.length; i++) {
            oo+='<div id="ysf" class="col-lg-4 col-md-6 d-flex align-items-stretch"><div class="icon-box"><div class="icon"><i class="fas fa-heartbeat"></i></div><h4><a href="medecin.php?specialite='+data[i].id+'">'+data[i].libelle+'</a></h4><p>Voila une des specialités disponibles, Clicker pour choisir</p></div></div>';
            console.log(data[i].libelle);
        }
        $('#msati').html(oo);
        console.log("ysf");
        },
        error: function (jqXHR, textStatus, errorThrown) {
           /* console.log(jqXHR);
            console.log(errorThrown);*/
        }
    });
    $.ajax({
        url: '../../controller/gestionMedecin.php',
        data: {op: 'pp' , service:ser, specialite:spe},
        type: 'POST',
        success: function (data, textStatus, jqXHR) {
        console.log(data);
        console.log(textStatus);
        console.log(jqXHR);
        var oo ='';
        for (var i = 0; i < data.length; i++) {
            oo+='<div class="col-lg-6"><div class="member d-flex align-items-start"><div class="pic"><img src="../../img/'+data[i].photo+'" class="img-fluid" alt=""></div><div class="member-info"><h4><a href="time.php?medecin='+data[i].id+'">'+data[i].nom+' '+data[i].prenom+'</a></h4><span></span><p>Chief Medical Officer</p><div class="social"><a href=""><i class="ri-twitter-fill"></i></a><a href=""><i class="ri-facebook-fill"></i></a><a href=""><i class="ri-instagram-fill"></i></a><a href=""> <i class="ri-linkedin-box-fill"></i> </a></div></div></div></div>';
            console.log(data[i].libelle);
        }
        $('#you').html(oo);
        console.log("ysf");
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        }
    });
    $.ajax({
        url: '../../controller/gestionTime.php',
        data: {op: 'dd'},
        type: 'POST',
        success: function (data, textStatus, jqXHR) {
            var option = '<option selected>Choisi le temps</option>';
            for (var i = 0; i < data.length; i++) {
                option += '<option value="' + data[i].temps + '">' + data[i].temps + '</option>';
            }
            $('#time').html(option);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus);
        }
    });
   
    //var date = $('#date').val();
    $('#rdv').click(function(){
         var service = $('#service').val();
    var specialite = $('#specialite').val();
    var medecin = $('#medecin').val();
    var date = $('#date').val();
    var email = $('#email').val();
    console.log(date);
    console.log(time);
    var time = $('#time').val();
    var patient = $('#patient').val();
        $.ajax({
            url: '../../controller/gestionRendezVous.php',
            data: {op: 'add', date: date, time: time, medecin: medecin, service: service, specialite: specialite, patient: patient, email: email},
            type: 'POST',
            success: function (data, textStatus, jqXHR) {
                console.log(data);
                console.log(textStatus);
                console.log(jqXHR);
                
                $('#nadi').html('<div class="alert alert-success alert-dismissible fade show" role="alert">Un mail de verification a été envoyer sur votre adresse email!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                console.log("ysf");
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                console.log(errorThrown);
            }
        });
    });
});