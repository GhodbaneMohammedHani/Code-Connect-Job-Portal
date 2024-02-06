<?php 
  session_start();
  include("../model/database.php");
  include("../model/ChercheurEmploi.php");
  include("../model/OffreEmploi.php");
  include("../model/Domaine.php");
  include("../model/SearchEngine.php");
  include("../model/SearchStrategy.php");
  include("../model/ChercherTous.php");
  include("../model/ChercherParDomaine.php");
  include("../model/ChercherParExperiance.php");
  include("../model/ChercherParExperianceEtDomaine.php");
  $chercheur=new ChercheurEmploi();
  $offreEmploi=new OffreEmploi();
  $Domaine=new Domaine();
if(isset($_POST['chercher'])){
    $searchEngine=new SearchEngine(new ChercherTous());
    $domaine=$_POST['domaine'];
    $experiance=$_POST['experience'];
    if(!empty($domaine) && !empty($experiance)){
        $chercherParDomaineEtExperiance=new chercherParExperianceEtDomaine($experiance,$domaine);
        $searchEngine->setSearchStrategy($chercherParDomaineEtExperiance);
        $offresemploi=$searchEngine->rechercher();
    }
    else if(!empty($domaine)){
        $chercherParDomaine=new chercherParDomaine($domaine);
        $searchEngine->setSearchStrategy($chercherParDomaine);
        $offresemploi=$searchEngine->rechercher();
    }
    else if(!empty($experiance)){
        $chercherParExperiance=new chercherParExperiance($experiance);
        $searchEngine->setSearchStrategy($chercherParExperiance);
        $offresemploi=$searchEngine->rechercher();
    }
    else{ 
        $offresemploi=$searchEngine->rechercher();
    }
}
else{
$offresemploi=$offreEmploi->getOffresEmploi();
}
if(isset($_GET['numoffre'])){
$con=mysqli_connect("localhost","root","","codeconnect");
$numOffre=$_GET['numoffre'];
$query="SELECT * FROM offreemploi,enterprise,domaine where offreemploi.num_enterprise=enterprise.num_en and
offreemploi.num_domaine=domaine.num_domaine and num_offre=$numOffre";
$result=mysqli_query($con,$query);
$response=mysqli_fetch_all($result,MYSQLI_ASSOC);
header('Content-Type: application/json');
echo json_encode($response);
exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<script src="descriptionOffre.js" defer></script>
</head>
<style>
     @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');
  @import url('https://fonts.googleapis.com/css2?family=Roboto+Slab&family=Roboto:wght@400;700&display=swap');
body{
    background-color:var(--color2)!important;
}
:root{
        --color1:#0080FF;
        --color2:#0080FF;
        --color3:#010C80;
        --color4:#8DBDFF;
}
.chercher-offre{
    background-color: var(--color4);
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 40px;
    margin: 40px 40px 0 40px;
    border-radius: 12px;
}
#domaine,#experience{
    padding: 10px 10px;
    border-radius: 4px
}
#chercher{
    padding: 0.8em;
    margin-left: 20px;
    background: black;
    color: white;
    cursor: pointer;
    border:solid 1px transparent;
    border-radius: 4px;
}
.enterprise-logo{
    display: block;
    width: auto;
    height: auto;
    max-width: 207px;
    max-height: 198px;
    padding: 1em;
}
.liste-emplois{
    display: flex;
    flex-direction: column;
    background-color: var(--color3);
    align-items: flex-start;
    width: 50%;
    height: 80vh;
    border-radius: 8px;
    padding:20px;
    overflow-y: scroll;
    border-radius: 15px;
}
#title{
    color: var(--color3);
    text-align: left;
    font-family: 'Sable Roboto',serif;
    margin:40px 0 20px 100px;
    font-size: 40px;
    font-weight: bold;
}
.offre-emploi{
    background-color: var(--color4);
    cursor: pointer;
    border-radius: 12px;
    display: flex;
    flex-direction: row;
    width: 500px;
    margin-bottom: 20px;
}
.offre-emploi:hover{
opacity: 0.9;
}
.liste-emplois>a{
    text-decoration: none;    
    color: var(--color3);
}
.offre-description{
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    align-items: flex-start;
    padding-left: 10px;
    color:var(--color3);
}
.offre-description>h1{
    font-family: 'Roboto',serif;
    font-weight: bold;
    font-size: 28px;
}
#details-offre{
    background-color: var(--color4);
    width: 50%;
    margin-left: 20px;
    margin-bottom: 20px;
    padding: 20px;
    border-radius: 15px;
}
#details-offre>p{
    font-weight: bold;
    font-family: 'Roboto',sans-serif;
    font-size: 20px;
    color: var(--color3);
}
#details-offre>h1{
    font-family: 'Roboto Sable';
    color: var(--color3);
    font-weight: bold;
    margin-top: 10px;
}
#titre-offre{
    color: var(--color3);
    font-family: 'Roboto Sable';

}
span{
    font-weight: lighter;
    margin-left: 10px;
}
.container{
    display: flex;
    justify-content: space-between;
}
.hidden{
    display: none;
}
#appliquer{
    background-color: var(--color3);
    padding: 10px 20px;
    font-size: 20px;
    border-radius: 12px;
    border: none;
    color: white;
}
.example::-webkit-scrollbar {
  display: none;
}

/* Hide scrollbar for IE, Edge and Firefox */
.example {
  -ms-overflow-style: none;  /* IE and Edge */
  scrollbar-width: none;  /* Firefox */
}
</style>
<body>
    <?php require("../views/nav.php"); ?>
    <div class="chercher-offre">
        <form action="chercheur.php" method="post">
        <select name="experience" id="experience">
            <option value="">Chercher par Experience</option>  
            <option value="1">1 anne ou plus</option>
            <option value="2">2 anne ou plus</option>
            <option value="3">3 anne ou plus</option>
            <option value="4">4 anne ou plus</option>
            <option value="5">5 anne ou plus</option>
        </select>
        <select name="domaine" id="domaine">
            <option value="">Chercher par Domaine</option>
            <?php 
            $domaines=$Domaine->getDomaines();
            foreach($domaines as $d){
                ?>
                <option value="<?php echo $d['num_domaine'] ;?>"><?php echo $d['nom']; ?></option>
                <?php 
        }
            ?>
        </select>
        <button type="submit" name="chercher" id="chercher" class="btn btn-sm" >Chercher</button>
        </form>
    </div>
    <h1 id="title">Offres d'emploi</h1>
    <?php 
    if(count($offresemploi)==0){
        ?>
        <h1>Il nya pas des offres</h1>
        <?php 
    }
    else {
        ?>
        <div class="container">
        <div class="liste-emplois">
        <?php
    foreach($offresemploi as $offre){
        ?>
        <!-- <a href="<?php // echo "detailsoffre.php?numoffre=".$offre['num_offre'] ?>"> -->
        <div class="offre-emploi description-offre" id=<?php echo $offre['num_offre'] ?>>
        <div class="job-image" src="">
            <?php             
            ?>
               <img src=<?php echo "..".str_replace("\\","/",$offre['logo_en']); ?> class="enterprise-logo"> 
        </div>
        <div class="offre-description">
            <h1><?php echo $offre['titre'] ?></h1>
            <p><i class="fa-solid fa-building"></i> <?php echo $offre['nom_en'] ?></p>
            <p><i class="fa-solid fa-location-dot"></i> <?php echo $offre['adresse']?></p>
            </div>
        </div>
        <!-- </a>-->
        <?php
    }
}
    ?>
     </div>
     <div id="details-offre" class="hidden">
        <p>Titre Offre :<span id="titre-Offre"></span></p>
        <p>Domaine :<span id="domaine-offre"></span></p>
       <p>Enterprise :<span id="enterprise-offre"></span></p>
       <p>Date publie :<span id="date-offre"></span></p>
       <p>Experience :<span id="experiance-offre"></span></p>
       <a href="" id="linkOffre"><button id="appliquer">Appliquer</button></a>
        <h1>Description Offre:</h1>
       <p><span id="description-offre">On chercher un develeppeur web passione</span></p>
     </div>
        </div>
        <?php 
        include('footer.php');
        ?>
</body>
</html>