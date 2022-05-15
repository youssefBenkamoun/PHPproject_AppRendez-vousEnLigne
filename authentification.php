<?php 
$uri = $_SERVER['REQUEST_URI']; 

$url_components = parse_url($uri);

parse_str($url_components['query'], $params);
      
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css?v=4">
    <title>Document</title>
</head>
<body class="auth">
    <form action="controller/CreateUser.php" method="post">
        <div class="auth-box">
            <h1>Créer Compte</h1>
            <div class="textbox">
                <!--i class="fas fa-user"></i-->
                <input type="text" name="email" value="<?php echo $params['email']?>" readonly>
            </div>

            <div class="textbox">
                <!--i class="fas fa-agenda"></i-->
                <input type="text" name="nom" placeholder="Nom" required>
            </div>

            <div class="textbox">
                <!--i class="fas fa-user"></i-->
                <input type="text" name="prenom" placeholder="Prenom" required>
            </div>

            <div class="textbox">
                <!--i class="fas fa-lock"></i-->
                <input type="password" name="password" placeholder="Password" required id="pass1" required>
            </div>

            <div class="textbox">
                <!--i class="fas fa-lock"></i-->
                <input type="password" name="re-password" placeholder="Validez password" oninput="verify()" id="pass2" required>
            </div>

            <div class="textbox">
                <!--i class="fas fa-agenda"></i-->
                <input type="text" name="cin" placeholder="CIN" required>
            </div>

            <div class="textbox">
                <!--i class="fas fa-agenda"></i-->
                <input type="text" name="tele" placeholder="Télèphone" required>
            </div>

            <div class="textbox">
                <!--i class="fas fa-agenda"></i-->
                <input type="text" name="adresse" placeholder="Adresse" required>
            </div>

            <div class="textbox">
                <!--i class="fas fa-calendar"></i-->
                <input type="date" name="date_naissance" placeholder="Date de naissance" required>
            </div>


            <input type="text" id="msg" placeholder="test" readonly hidden>

            <button type="submit" class="btn" name="btn_submit" value="Sign in"> Sign in</button>
            <a href="index.php" style="color: #1977cc;">Vous avez déja un compte? Login.</a>
        </div>
    </form>
    <script>
        function verify (){
        var pass1 = document.getElementById("pass1");
        var pass2 = document.getElementById("pass2");
        var msg = document.getElementById("msg")
        
        if(pass1.value === pass2.value){
            msg.style.color = 'green';
            msg.value ="identique";
        }else  {
            msg.style.color = 'red';
            msg.value ="non indentique";
        }
    }
    </script>
</body>
</html>