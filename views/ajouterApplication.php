<?php 
session_start();
include("../model/database.php");
include("../model/ChercheurEmploi.php");
$numch=$_SESSION['id'];
if(isset($_POST['app'])){
$numoffre=$_GET['numoffre'];
if(isset($_POST['lettre'])){
    $lettre=$_POST['lettre'];
}
else{
     $lettre="";
}
$date=date('Y-m-d');
$chercheur=new ChercheurEmploi();
$chercheur->appliquerOffre($numch,$numoffre,$date,$lettre);
header("location:chercheur.php");
}



?>