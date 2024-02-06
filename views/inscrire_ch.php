<?php 
$error="";
if(isset($_GET['error'])){
    $error=$_GET['error'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        background-color:var(--color4);
        overflow: hidden;
        margin: 30px 0 0 30px;
    }
    form{
        display: flex;
        flex-direction: column;
        height: 100vh;
        align-items: center;
        justify-content: space-around;
        margin: 0 0 20px 40px;
        width: 100%;
    }
    #email,#password,#nom,#prenom,#num-tel{
        background-color: var(--color2);
        border: none;
        color:white;
        font-style: italic;
        width: 75%;
        padding: 10px 0 10px 10px;
    }
    label{
        font-family: 'Roboto',sans-serif;
        font-size: large;
        color: var(--color3);
    }
   input::placeholder{
        color: var(--color3);
    }
    #submit{
        padding: 10px 20px;
        margin-bottom: 40px;
        margin-right: auto;
        margin-left: 100px;
        font-size: large;
        background-color: var(--color3);
        border: none;
        color: white;
        border-radius: 8px;
        cursor: pointer;
    }
input:-webkit-autofill {
  -webkit-box-shadow: 0 0 0 30px var(--color2) inset; 
  -webkit-color: white;
}
#numtelLabel{
    margin-left:5%;
}
    #cv{
        width: 0.1px;
        height: 0.1px;
        opacity: 0;
        overflow: hidden;
        position: absolute;
        z-index: -1;
    }
    #cvlabel{
        background-color: var(--color3);
        color: white;
        padding: 8px 16px;
        margin-left:7.5%;
        margin-bottom: 10px;
        cursor: pointer;
        border-radius: 15px;
    }
    .form-part{
        width: 100%;
    }
    span{
        font-size: 20px;
        color:red;
    }
    </style>
</head>
<body>
    <form action="inscrire.php" method="post" enctype="multipart/form-data">
        <div class="form-part">
        <span><?php if($error=="vide") echo "Il faut inscrit tout la form" ?></span>
        <label for="nom">Nom</label>
        <span><?php if($error=="nom") echo "Nom non valid" ;?></span>
        <input type="text" id="nom" name="nom" placeholder="Donner votre Nom">
    </div>
    <div class="form-part">
        <label for="prenom">Prenom</label>
        <span><?php if($error=="prenom") echo "Prenom non valid"?></span>
        <input type="text" id="prenom" name="prenom" placeholder="Donner votre prenom">
    </div>
    <div class="form-part">
        <label for="email">Email</label>
        <span><?php if($error=="email") echo "Email non valid"?></span>
        <input type="email" id="email" name="email" placeholder="Donner votre Email">
    </div>
    <div class="form-part">
        <label for="password">Password</label>
        <span><?php if($error=="password") echo "Password non valid"?></span>
        <input type="password" name="password" id="password" placeholder="Donner  Password">
    </div>
    <div class="form-part">
        <label for="num-tel">Telephone</label>
        <span><?php if($error=="numtel") echo "Num tel non valid"?></span>
        <input type="number" id="num-tel" name="num-tel" placeholder="Donner votre numero telephone">
    </div>
    <div class="form-part">
        <label for="cv" id="cvlabel">Deposer votre cv <i class="fa-solid fa-upload"></i></label>
        <span><?php if($error=="cv") echo "Cv non valid"?></span>
        <input type="file" name="cv" id="cv" value="Upload">
    </div>
        <input type="submit" name="inscrire-ch" value="Inscrire" id="submit">
    </form>
</body>
</html>