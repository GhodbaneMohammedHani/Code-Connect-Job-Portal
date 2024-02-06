<?php
session_start();
include("../model/database.php");
include("../model/OffreEmploi.php");
$num_offre=$_GET['numoffre'];
$offreEmploi=new OffreEmploi();
$applications=$offreEmploi->getApplications($num_offre);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
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
    width: 1200px;
    margin: 40px auto;
    text-align: center;
}
tr>td,tr>th{
    border:solid 1px var(--color2);
}
tr>th{
    background-color: var(--color3);
    color: white;
    padding: 10px 20px;
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
}
.danger{
    background-color: red;
    border-radius: 25px;
}
.accepted{
    background-color: green;
    border-radius: 25px;
}
h1{
    font-family:'Roboto Slab',serif;
    margin-left: 11%;
    margin-top:40px!important;
    margin-bottom: 10px!important;
}
.return{
    background-color: var(--color3);
    margin-left: 10%;
    margin-top: 40px;
    border-radius: 15px;
}
.candidats{
    color: var(--color3);
}
</style>
<body>
    <?php 
    include("nav.php");
    if(count($applications)==0){

        ?>
        <style>
            .footer{
position: fixed;
left: 0;
bottom: 0;
}
        </style>
        <h1 class="candidats">Il n'ya pas des candidats maintenent pour cette offre</h1>
        <?php
    }
    else{
    ?>
    <table>
        <tr>
            <th>nom candidat</th>
            <th>prenom candidat</th>
            <th>date d'application</th>
            <th>cv candidat</th>
            <th>Lettre de motivations</th>
        </tr>
        <?php
        foreach($applications as $application){
            ?>
            <tr>
                <td><?php echo $application['nom']?></td>
                <td><?php echo $application['prenom']?></td>
                <td><?php echo $application['date_application']?></td>
                <td><a href=<?php  echo "../".str_replace("\\","/",$application['cv']); ?>>Cliquer ici pour voir</a></td>
                <td><?php echo $application['lettre_motivation']?></td>
                <td><button class="accepted" ><a href="accepterCandidat.php?numoffre=<?php echo $application['num_offre'] ?>& numch=<?php echo $application['num_chercheur']?>">Accepter Candidat </a></button></td>
                <td><button class="danger"><a href="refuserCandidat.php?numoffre=<?php echo $application['num_offre']?>& numch=<?php echo $application['num_chercheur']?>">Refuser Candidat</a></button></td>
            </tr>
            <?php 
        }
        ?>
</table>
<?php } ?>
<div >
    <button class="return"><a href="./enterprise.php"><i class="fa-solid fa-arrow-left-long"></i> Retourner</a></button>
</div>
<?php 
include('footer.php');
?>
</body>
</html>