<?php 
$error="";
session_start();
include("../model/database.php");
include("../model/OffreEmploi.php");
include("../controllers/OffreEmploiContr.php");
if(isset($_POST['publie-offre'])){
    $titre=$_POST['titre'];
    $datepublication= date('Y-m-d');
    $description=$_POST['description'];
    $domaine=$_POST['domaine'];
    $experiance=$_POST['experiance'];
    $enterprise=$_SESSION['id'];
    $offre=new OffreEmploiController($titre,$datepublication,$description,$domaine,$experiance,$enterprise);
    $offre->postOffre();
    header("location:enterprise.php");
}
if(isset($_GET['error'])){
    $error=$_GET['error'];
}
?>