<?php
extract($_POST);
$email = $_POST['email'];

//the subject
$sub = "Verification d'inscription";
//the message
$msg = "Bonjour, Validez votre inscription en cliquant sur le lien ci-dessous : \n\n http://localhost/MAYdocF/authentification.php?email=$email";
//recipient email here
$rec = "$email";
//send email
mail($rec,$sub,$msg);
echo "<script>if(confirm('Un mail a été envoyer sur votre adresse email !')){document.location.href='../login.php'};</script>";

?>