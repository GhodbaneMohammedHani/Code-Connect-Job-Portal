<?php 
class Enterprise extends Database{
    //ajouter un enterprise
    public function ajouterEnterprise($nom,$email,$numtel,$logo,$adresse,$password){
        $query=$this->connect()->prepare("INSERT INTO Enterprise 
        (email_en,nom_en,numero_tel,adresse,logo_en,password)
        VALUES (?,?,?,?,?,?)");
        $query->execute([$email,$nom,$numtel,$adresse,$logo,$password]);
    }
    //publie Offre emploi
    public function publieOffre($titre,$date,$description,$anneexperiance,$num_domaine,$num_enterprise){
        $query=$this->connect()->prepare("INSERT INTO offreemploi 
        (titre,datepublication,description,anneexperience,num_domaine,num_enterprise)
        VALUES (?,?,?,?,?,?)
        ");
        $query->execute([$titre,$date,$description,$anneexperiance,$num_domaine,$num_enterprise]);
    }
    public function supprimerApplication($num_offre,$num_ch){
        $query=$this->connect()->prepare("DELETE FROM application
        where num_offre=? and num_ch=?
        ");
        $query->execute([$num_offre,$num_ch]);
    }
    public function supprimerOffre($num_offre){
        $query=$this->connect()->prepare("DELETE FROM offreemploi where
        num_offre=?");
        $query->execute([$num_offre]);
    }
    public function getOffresPostulez($num_offre){
        $query=$this->connect()->prepare("SELECT * FROM offreEmploi where num_offre=?");
        $query->execute([$num_offre]);
    }
    public function envoiEmailAccepte($num_ch,$num_offre){
        $query=$this->connect()->prepare("SELECT * FROM application,chercheuremploi,enterprise,offreemploi where 
        application.num_offre=? and application.num_ch=? 
        and application.num_ch=chercheuremploi.num_chercheur and offreemploi.num_offre=application.num_offre
        and offreemploi.num_enterprise=enterprise.num_en
        ");
        $query->execute([$num_offre,$num_ch]);
        $result=$query->fetch();
        $to=$result['email'];
        $sujet="Candidat Accepte";
        $message="Bonjour ".$result['nom']." ".$result['prenom']."\n Vous avez accepter votre application pour cette position de ".$result['titre'].".";
        $headers="From: ".$result['email_en']."\r\n";
        $envoiEmail=mail($to,$sujet,$message,$headers);
        if(!$envoiEmail){
            die("Email n'est pas envoyer");
        }
    }
    public function envoiEmailRefuse($num_ch,$num_offre){
        $query=$this->connect()->prepare("SELECT * FROM application,chercheuremploi,enterprise,offreemploi where 
        application.num_offre=? and application.num_ch=? 
        and application.num_ch=chercheuremploi.num_chercheur and offreemploi.num_offre=application.num_offre
        and offreemploi.num_enterprise=enterprise.num_en
        ");
        $query->execute([$num_offre,$num_ch]);
        $result=$query->fetch();
        $to=$result['email'];
        $sujet="Candidat Refuse";
        $message="Bonjour ".$result['nom']." ".$result['prenom']."\nMalheureusement Vous avez refuser votre application pour cette position de ".$result['titre'].".";
        $headers="From: ".$result['email_en']."\r\n";
        $envoiEmail=mail($to,$sujet,$message,$headers);
        if(!$envoiEmail){
            die("Email n'est pas envoyer");
        }
    }
    




}



?>