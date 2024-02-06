<?php 
session_start();
$error="";
if(isset($_GET['error'])){
    $error=$_GET['error'];
}
include("../model/database.php");
$id=$_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publie Offre</title>
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
        background-color:var(--color2)!important;
    }
    form{
        display: flex;
        flex-direction: column;
        width: 50%;
        margin-left: 10%;
    }
    form>*{
        margin-top: 10px!important;
    }
    label{
        font-family: 'Roboto',serif;
        font-size:20px;
        color: var(--color3);
        font-weight:600;
    }
    input[type="text"],textarea{
        padding: 5px 0 5px 10px;
        background-color: var(--color4);
        border: none;
    }
    select {
        padding: 10px 0 10px 10px;
        background-color: var(--color4);
        color: var(--color3);
    }
    input[type="submit"]{
        background-color: var(--color3);
        color:white;
        width: 20%;
        border: none;
        padding: 8px 16px;
        border-radius: 8px;
    }
    input::placeholder,textarea::placeholder{
        color: var(--color3);
        opacity: 0.5;
    }
</style>
<body>
    <?php include('nav.php') ?>
    <form action="publieOffre.php" method="post">
        <?php if($error=="vide") echo "Inscrivit tout la forme"?>
        <label for="titre">Titre Offre</label>
        <input type="text" id="titre" name="titre" placeholder="Titre offre">
        <label for="description">Description d'offre</label>
        <textarea placeholder="Description offre"  name="description" id="description" cols="30" rows="5"></textarea>
        <select  name="domaine" id="domaine">
            <?php  $con=mysqli_connect("localhost","root","","codeconnect"); 
            $query="SELECT * FROM domaine ";
            $result=mysqli_query($con,$query);
            ?> 
            <option value="">Choisir un domaine</option>
            <?php 
            while($domaine=mysqli_fetch_assoc($result)){
                ?>
                <option value="<?php echo $domaine['num_domaine']?>">
                <?php echo $domaine['nom']  ?></option>
                <?php 
            }
            ?>
        </select>
        <select name="experiance" id="experiance">
            <option value="">Choisir combien anne d'experience</option>
            <option value="1">1 anne ou plus</option>
            <option value="2">2 annes ou plus</option>
            <option value="3">3 annes ou plus</option>
            <option value="4">4 annes ou plus</option>
            <option value="5">5 annes ou plus</option>
        </select>
        <input type="submit" value="Publie Offre" id="publie" name="publie-offre">
    </form>
    <?php 
    include('footer.php');
?>
</body>
</html>