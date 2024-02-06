<?php 
class chercherParDomaine extends Database implements SearchStrategy{
    private $domaine;
    public function __construct($domaine)
    {
        $this->domaine=$domaine;
    }
    public function chercher(){
        $query=$this->connect()->prepare("SELECT * FROM offreemploi,enterprise where offreemploi.num_enterprise=enterprise.num_en
        and offreemploi.num_domaine=?");
        $query->execute([$this->domaine]);
        return $query->fetchAll();
    }

}









?>