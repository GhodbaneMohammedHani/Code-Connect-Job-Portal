<?php 
class ChercheurEmploi extends Database{
    public function ajouterChercheur($nom,$prenom,$email,$numtel,$password,$cv){
        $query=$this->connect()->prepare("INSERT INTO chercheuremploi (email,nom,prenom,numero_tel,cv,password)
        VALUES (?,?,?,?,?,?)");
        $query->execute([$email,$nom,$prenom,$numtel,$cv,$password]);
    }
    public function appliquerOffre($numch,$num_offre,$date,$lettre){
        $query=$this->connect()->prepare(" INSERT IGNORE INTO application VALUES (?,?,?,?)");
        $query->execute([$numch,$num_offre,$date,$lettre]);
    }
}

?>