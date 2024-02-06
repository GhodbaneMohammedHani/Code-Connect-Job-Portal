<?php 
include("../model/database.php");
include("../model/User.php");
include("../controllers/UserContr.php");
if(isset($_POST['login'])){
$email=$_POST['email'];
$password=$_POST['password'];
$login=new UserController($email,$password);
$login->Login();
}







?>