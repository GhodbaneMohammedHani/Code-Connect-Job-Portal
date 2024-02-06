<?php 
class OffreEmploiController{
private $titre;
private $date_publication;
private $description;
private $domaine;
private $experience;
private $id_enterprise;
private $model;
public function __construct($titre,$date_publication,$description,$domaine,$experience,$id_enterprise)
{
    $this->titre=$titre;
    $this->date_publication=$date_publication;
    $this->description=$description;
    $this->domaine=$domaine;
    $this->experience=$experience;
    $this->id_enterprise=$id_enterprise;   
    $this->model=new OffreEmploi();
}
public function postOffre(){
    if($this->inputVide()){
        header("location: publieOffre.php?error=vide");
    }
    $this->model->publieOffre($this->titre,$this->date_publication,$this->description,$this->experience,$this->domaine,$this->id_enterprise);
}
public function inputVide(){
    if(empty($this->titre) || empty($this->date_publication) || empty($this->description)
    || empty($this->experience) || empty($this->id_enterprise) || empty($this->domaine)
    )return true;
    return false;
}
}




?>