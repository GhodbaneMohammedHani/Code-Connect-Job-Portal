<?php 
$num_offre=$_GET['numoffre'];
include("../model/database.php");
include("../model/Enterprise.php");
$enterprise=new Enterprise();
$enterprise->supprimerOffre($num_offre);
header("location:enterprise.php");
?>