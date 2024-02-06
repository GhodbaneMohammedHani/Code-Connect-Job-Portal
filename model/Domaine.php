<?php 
class Domaine extends Database{
    public function getDomaines(){
        $query=$this->connect()->prepare("SELECT * FROM domaine");
        $query->execute();
        return $query->fetchAll();
    }
}


?>