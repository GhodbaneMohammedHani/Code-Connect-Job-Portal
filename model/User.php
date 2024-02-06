<?php 
class User extends Database{
    public function verifyUser($password,$email){
        $query=$this->connect()->prepare("SELECT * from chercheuremploi WHERE email=? ;");
        $query->execute([$email]);
        $users=$query->fetchAll();
        if(count($users)>0){
            if(password_verify($password,$users[0]['password'])){
                session_start();
                $_SESSION['id']=$users[0]['num_chercheur'];
                header("location: chercheur.php");
            }
            else{
                header("location: index.php?error=password");
            }
        }
        else{
            $query=$this->connect()->prepare("SELECT * from enterprise WHERE email_en=? ");
        $query->execute([$email]);
        $users=$query->fetchAll();
        if(count($users)>0){
            if(password_verify($password,$users[0]['password'])){
            session_start();
            $_SESSION['id']=$users[0]['num_en'];
            header("location: enterprise.php");
            }
            else{
                header("location: index.php?error=password");
            }
        }
        else{
        header("location: index.php?error=email");
        }
        }
    }

}
// i just want to kill my self
?>