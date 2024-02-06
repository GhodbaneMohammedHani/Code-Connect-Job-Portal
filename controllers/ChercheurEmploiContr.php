<?php 
class ChercheurEmploiController {
private $email;
private $nom;
private $prenom;
private $numero_tel;
private $cv;
private $password;
private $model;
public function __construct($email,$nom,$prenom,$numero_tel,$cv,$password)
{
    $this->email=$email;
    $this->nom=$nom;
    $this->prenom=$prenom;
    $this->numero_tel=$numero_tel;
    $this->cv=$cv;
    $this->password=$password;
    $this->model=new ChercheurEmploi();
}
public function SignUp(){
    if($this->inputVide()){
        header("location: inscrire_ch.php?error=vide");
    }
    else if(!$this->nom_valid($this->nom)){
        header("location: inscrire_ch.php?error=nom");
    }
    else if(!$this->nom_valid($this->prenom)){
        header("location: inscrire_ch.php?error=prenom");
    }
    else if(!$this->emailValid($this->email)){
        header("location: inscrire_ch.php?error=email");
    }
    else if(!$this->numtelValide($this->numero_tel)){
        header("location: inscrire_ch.php?error=numtel");
    }
    else if(!$this->fileIsValid($this->cv)){
        header("location: inscrire_ch.php?error=cv");
    }
    else {
          // upload cv first before storing it in the database
          $cvName=$this->cv['name'];
          $logoExt=explode(".",$cvName); // [filename,jpg] for example
  $actualExt=strtolower(end($logoExt)); // get extension
          $newCvName=uniqid('',true).".".$actualExt;//new file name
          $source=$this->cv['tmp_name'];// tempery location
          $array=explode("\\",realpath('inscrire.php'));
          $slice=array_slice($array,0,count($array)-2);
          $join=implode("\\",$slice);// just fucking kill me
          $destination=$join."\uploads\cvs\\".$newCvName; //new logo name
          move_uploaded_file($source,$destination); //move file to location
          $imgpath="\uploads\cvs\\".$newCvName;
        $this->model->ajouterChercheur($this->nom,$this->prenom,$this->email,$this->numero_tel,$this->password,$imgpath);
        header("location: index.php");
    }
}
public function emailValid($email){
    if(filter_var($email,FILTER_VALIDATE_EMAIL)){
        return true;
    }
    return false;
}
public function nom_valid($nom){
    if(preg_match("/(\w)/",$nom)){
        return true;
    }
    return false;
}
public function numtelValide($numtel){
    if(preg_match("/^\d{8}$/",$numtel)){
        return true;
    }
    return false;
}
public function inputVide(){
    if(empty($this->nom) || empty($this->prenom) || empty($this->email) ||
    empty($this->numero_tel) || empty($this->cv) || empty($this->password)){
        return true;
    }
    return false;
}
public function fileIsValid($file){
    $fileName=$file['name'];
    $tmpLocation=$file['tmp_name'];
    $fileSize=$file['size'];
    $fileError=$file['error'];
    $fileType=$file['type'];
    $fileExt=explode(".",$fileName);
    $actualExt=strtolower(end($fileExt));
    $filetypes=array('pdf');
    if(!in_array($actualExt,$filetypes)) return false; //invalid file type
    if($fileError!=0) return false; //error uploading file
    if($fileSize>=1000000) return false;// file is too big
    return true;
    }
}





?>