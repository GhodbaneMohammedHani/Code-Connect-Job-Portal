<?php 
class EnterpriseController{
    private $nom_en;
    private $email_en;
    private $num_tel;
    private $logo;
    private $adresse;
    private $password;
    private $model;
    public function __construct($nom,$email,$numtel,$logo,$adresse,$password)
    {
        $this->nom_en=$nom;
        $this->email_en=$email;
        $this->num_tel=$numtel;
        $this->logo=$logo;
        $this->adresse=$adresse;
        $this->password=$password;
        $this->model=new Enterprise();
    }
    public function SignUp(){
        if($this->inputVide()){
            header("location: inscrire_en.php?error=vide");
        }
        else if(!$this->nom_valid($this->nom_en)){
            header("location: inscrire_en.php?error=nom");
        }
        else if(!$this->emailValid($this->email_en)){
            header("location: inscrire_en.php?error=email");
        }
        else if(!$this->numtelValide($this->num_tel)){
            header("location: inscrire_en.php?error=numtel");
        }
        else if(!$this->fileIsValid($this->logo)){
            header("location:inscrire_en.php?error=logo");
        }
        else{
            // upload logo first before storing it in the database
            $logoName=$this->logo['name'];
            $logoExt=explode(".",$logoName); // [filename,jpg] for example
    $actualExt=strtolower(end($logoExt)); // get extension
            $newLogoName=uniqid('',true).".".$actualExt;//new file name
            $source=$this->logo['tmp_name'];// tempery location
            $array=explode("\\",realpath('inscrire.php'));
            $slice=array_slice($array,0,count($array)-2);
            $join=implode("\\",$slice);//
            $destination=$join."\uploads\logos\\".$newLogoName; //new logo name
            $imgpath="\uploads\logos\\".$newLogoName;
            move_uploaded_file($source,$destination);
            $this->model->ajouterEnterprise($this->nom_en,$this->email_en,$this->num_tel,$imgpath,$this->adresse,$this->password);
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
        if(empty($this->nom_en || empty($this->email_en) || empty($this->num_tel)
        || empty($this->logo) || empty($this->adresse) || empty($this->password)
        )){
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
    $filetypes=array('jpg','jpeg','png');
    if(!in_array($actualExt,$filetypes)) return false; //invalid file type
    if($fileError!=0) return false; //error uploading file
    if($fileSize>=1000000) return false;// file is too big
    return true;
    }
}



?>