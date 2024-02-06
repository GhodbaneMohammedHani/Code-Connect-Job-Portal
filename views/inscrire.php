<?php 
if(isset($_POST['inscrire-en'])){
    include("../model/database.php");
    include("../model/Enterprise.php");
    include("../controllers/EnterpriseContr.php");
    $nom_en=$_POST['nom-en'];
    $email_en=$_POST['email-en'];
    $num_tel=$_POST['num-tel'];
    $logo=$_FILES['logo'];
    $adresse=$_POST['adresse'];
    $password=$_POST['password'];
    $hashedPassword=password_hash($password,PASSWORD_DEFAULT);
    $signup=new EnterpriseController($nom_en,$email_en,$num_tel,$logo,$adresse,$hashedPassword);
    $signup->SignUp();
}
else if(isset($_POST['inscrire-ch'])){
    include("../model/database.php");
    include("../model/ChercheurEmploi.php");
    include("../controllers/ChercheurEmploiContr.php");
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $email=$_POST['email'];
    $num_tel=$_POST['num-tel'];
    $cv=$_FILES['cv'];
    $password=$_POST['password'];
    $hashedPassword=password_hash($password,PASSWORD_DEFAULT);
    $signup=new ChercheurEmploiController($email,$nom,$prenom,$num_tel,$cv,$hashedPassword);
    $signup->SignUp();
}
?>