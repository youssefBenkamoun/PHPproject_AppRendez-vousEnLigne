/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {
    var email = $("#email");
    var password = $("#password");
    email.val('');
    password.val('');
    var btn = $("#btn");
    btn.click(function () {
        $.ajax({
            url: 'controller/loginCheck.php',
            data: {email: email.val(), password: password.val()},
            type: 'POST',
            success: function (data, textStatus, jqXHR) {
                alert(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(textStatus);
            }
        });
    });
    $(document).keypress(function (e) {
        if (e.which == 13) {
            btn.click();
        }
    });
});
