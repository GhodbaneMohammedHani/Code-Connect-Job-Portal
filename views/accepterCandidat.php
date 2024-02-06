<?php 
include("../model/database.php");
include("../model/Enterprise.php");
$enterpise=new Enterprise();
$numch=$_GET['numch'];
$numoffre=$_GET['numoffre'];
$enterpise->envoiEmailAccepte($numch,$numoffre);
$enterpise->supprimerApplication($numoffre,$numch);
$enterpise->supprimerOffre($numoffre);
header("location: applications.php?numoffre=".$numoffre);
?>