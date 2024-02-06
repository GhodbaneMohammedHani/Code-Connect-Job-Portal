<?php 
class UserController{
private $email;
private $password;
private $model;
public function __construct($email,$password)
{
    $this->email=$email;
    $this->password=$password;
    $this->model=new User($this->email,$this->password);
}
public function Login(){
    if($this->inputVide()) header("location: index.php?error=vide");
    $this->model->verifyUser($this->password,$this->email);
}
public function inputVide(){
    if(empty($this->email) || empty($this->password)) return true;
    return false;
}



}
?>