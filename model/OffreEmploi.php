<?php 
class OffreEmploi extends Database{
    public function publieOffre($titre,$date,$description,$anneexperiance,$num_domaine,$num_enterprise){
        $query=$this->connect()->prepare("INSERT INTO offreemploi 
        (titre,datepublication,description,anneexperience,num_domaine,num_enterprise)
        VALUES (?,?,?,?,?,?)
        ");
        $query->execute([$titre,$date,$description,$anneexperiance,$num_domaine,$num_enterprise]);
    }
    public function getOffresEmploi(){
        $query=$this->connect()->prepare("SELECT * FROM offreemploi,enterprise where offreemploi.num_enterprise=enterprise.num_en");
        $query->execute();
        return $query->fetchAll();
    }
    public function getOffresEmploiPourEnterprise($num_enterprise){
        $query=$this->connect()->prepare("SELECT * FROM offreemploi,domaine where offreemploi.num_domaine=domaine.num_domaine
        and offreemploi.num_enterprise=?");
        $query->execute([$num_enterprise]);
        return $query->fetchAll();
    }
    public function getApplications($numoffre){
        $query=$this->connect()->prepare("SELECT * FROM application,chercheuremploi where 
        application.num_ch=chercheuremploi.num_chercheur and application.num_offre=?
        ");
        $query->execute([$numoffre]);
        return $query->fetchAll();
    }
}









?>