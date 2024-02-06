<?php 
class chercherParExperiance extends Database implements SearchStrategy{
    private $experiance;
    public function __construct($experiance)
    {
        $this->experiance=$experiance;
    }
    public function chercher()
    {
        $query=$this->connect()->prepare("SELECT * FROM offreemploi,enterprise where offreemploi.num_enterprise=enterprise.num_en
        and offreemploi.anneexperience>=?");
        $query->execute([$this->experiance]);
        return $query->fetchAll();
    }
}



?>