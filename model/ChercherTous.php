<?php 
class ChercherTous extends Database implements SearchStrategy{
    public function chercher(){
        $query=$this->connect()->prepare("SELECT * FROM offreemploi,enterprise where offreemploi.num_enterprise=enterprise.num_en");
        $query->execute();
        return $query->fetchAll();
    }
}




?>