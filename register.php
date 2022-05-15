<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css?v=1">
    <title>Document</title>
</head>
<body class="register">
    <form action="controller/RegistrationMail.php" method="post">
        <div class="register-box">
            <h1>S'inscrire</h1>
            <div class="textbox">
                <i class="fas fa-user"></i>
                <input type="text" name="email" placeholder="email" required>
            </div>

            <button type="submit" class="btn" name="btn_submit" value="Register"> envoyer</button>

            <a href="index.php" style="color: #1977cc;">Vous avez déja un compte? Login.</a>
        </div>
    </form>
</body>
</html>