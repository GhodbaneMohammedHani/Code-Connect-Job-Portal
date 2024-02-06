<?php 
session_start();
$error="";
if(isset($_GET['error'])){
    $error=$_GET['error'];
}
include("../model/database.php");
include("../model/OffreEmploi.php");
$offreEmploi=new OffreEmploi();
$id=$_SESSION['id'];
$offresPostulez=$offreEmploi->getOffresEmploiPourEnterprise($id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeConnect page Enterprise</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<style>
  @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');
  @import url('https://fonts.googleapis.com/css2?family=Roboto+Slab&family=Roboto:wght@400;700&display=swap');
:root{
        --color1:#0080FF;
        --color2:#0080FF;
        --color3:#010C80;
        --color4:#8DBDFF;
    }
body{
    background-color: var(--color1)!important;
}
table{
    width: 1000px;
    margin: auto;
    text-align: center;
}
tr>td,tr>th{
    border:solid 1px var(--color2);
}
tr>th{
    background-color: var(--color3);
    color: white;
    padding: 10px 20px;
    font-style: italic;
    font-family: 'Roboto Slab',serif;
}
tr>td{
    background-color: var(--color4);
    padding: 10px 20px;
    font-family: 'Roboto',sans-serif;
}

button>a{
    text-decoration: none;
    color: white;
}
button{
    padding: 8px 16px;
    border-radius:8px;
    border: none;
}
.voir{
    background-color: var(--color3);
    border-radius: 8px;
}
.danger{
    background-color: red;
    border-radius: 8px;
}
h1{
    font-family:'Roboto Slab',serif;
    margin-left: 11%;
    margin-top:40px!important;
    margin-bottom: 10px!important;
}
#ajouterOffre>button{
    background-color: var(--color3);
}
#ajouterOffre{
    margin-left:11%;
    margin-top: 20px;
}
#ajouterOffre>button{
    border-radius: 8px;
}
#offrespublie{
    color: var(--color3);
}
#offresnull{
    color: var(--color3);
}
</style>
</head>
<body>
<?php require("../views/nav.php"); ?>
    <h1 id="offrespublie">Offres Publie</h1>
    <?php 
    if(count($offresPostulez)==0){
        ?>
        <h1 id="offresnull">Il n'ya pas des offres publie</h1>
        <?php 
    }
    else{
        ?>
        <table>
            <tr>
            <th>Titre</th>
            <th>Date publication</th>
            <th>Experiance</th>
            <th>Domaine</th>
        </tr>
        <?php 
        foreach($offresPostulez as $offre){
            ?>
            <tr>
                <td><?php echo $offre['titre']; ?></td>
                <td><?php echo $offre['datepublication'];?></td>
                <td><?php echo $offre['anneexperience'];?> anne ou plus</td>
                <td><?php echo $offre['nom'];?></td>
                <td><button class="voir"><a href="applications.php?numoffre=<?php echo $offre['num_offre'];?>">Voir applications</a></button></td>
                <td><button class="danger"><a href="supprimerOffre.php?numoffre=<?php echo $offre['num_offre'];?>">Supprimer Offre <i class="fa-regular fa-trash-can"></i> </a></button></td>
            </tr>
            <?php 
        }
        ?>
        </table>
        
        <?php 
    }
    ?>
    <div id="ajouterOffre">
        <button><a href="ajouterOffre.php"><i class="fa-solid fa-plus"></i> Ajouter offre</a></button>
    </div>
    <?php 
    include('footer.php');
    ?>
</body>
</html>