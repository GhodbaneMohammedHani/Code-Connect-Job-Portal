<?php 
include("../model/database.php");
include("../model/Enterprise.php");
$enterpise=new Enterprise();
$numch=$_GET['numch'];
$numoffre=$_GET['numoffre'];
$enterpise->envoiEmailRefuse($numch,$numoffre);
$enterpise->supprimerApplication($numoffre,$numch);
header("location: applications.php?numoffre=".$numoffre);
?>