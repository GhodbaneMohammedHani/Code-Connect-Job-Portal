<?php 
class chercherParExperianceEtDomaine extends Database implements SearchStrategy{
    private $experiance;
    private $domaine;
    public function __construct($experiance,$domaine)
    {
        $this->experiance;
        $this->domaine;
    }
    public function chercher(){
        $query=$this->connect()->prepare("SELECT * FROM offreemploi,enterprise where 
        offreemploi.num_enterprise=enterprise.num_en and offreemploi.anneexperience>=? and offreemploi.num_domaine=?");
        $query->execute([$this->experiance,$this->domaine]);
        return $query->fetchAll();
    }
}








?>