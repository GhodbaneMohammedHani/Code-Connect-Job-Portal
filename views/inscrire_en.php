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
    <title>Inscrire Enterprise</title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
         :root{
        --color1:#0080FF;
        --color2:#0080FF;
        --color3:#010C80;
        --color4:#8DBDFF;
    }
    body{
        background-color: var(--color4);
        margin: 30px 0 0 30px;
    }
    form{
        display: flex;
        flex-direction: column;
        margin-left: 10%;
    }
    label{
        font-size: 20px;
        font-family: 'Roboto';
        margin-bottom:5px;
        color: var(--color3);
    }
    input{
        width: 50%;
        padding: 10px 0 10px 10px;
        margin-bottom:10px;
        background-color: var(--color1);
        border: none;
    }
    input::placeholder{
        color: var(--color4);
        font-style: italic;
    }
    input[type="submit"]{
        margin-top: 10px;
        background-color: var(--color3);
        color: white;
        width: 10%;
        text-align: center;
        cursor: pointer;
        border-radius: 12px;
        padding: 15px 10px;
        font-size: 20px;
    }
    span{
        font-size: 20px;
        color:red;
    }
    #logo{
        width: 0.1px;
        height: 0.1px;
        opacity: 0;
        overflow: hidden;
        position: absolute;
        z-index: -1;
    }
    #logo-en{
        background-color: var(--color3);
        color: white;
        width: 10%;
        margin-bottom: 10px;
        padding-top: 10px;
        padding-bottom: 10px;
        border-radius: 15px;
        text-align: center;
        cursor: pointer;
    }
    </style>
</head>
<body>
        <form action="inscrire.php" method="post" enctype="multipart/form-data" autocomplete="off">
            <span><?php if($error=="vide") echo "Il faut inscrit tout la form" ?></span>
        <label for="nom-en">Nom Enterprise</label>
        <span><?php if($error=="nom") echo "Nom non valid" ;?></span>
        <input type="text" name="nom-en" id="nom-en" placeholder="Nom enterprise">
        <label for="email-en">Email enteprise</label>
        <span><?php if($error=="email") echo "Email non valid"?></span>
        <input type="email" name="email-en" id="email-en" autocomplete="off"  placeholder="Email enterprise">
        <label for="numero-tel">Numero Telephone</label>
        <span><?php if($error=="numtel") echo "Num tel non valid";?></span>
        <input type="number" name="num-tel" id="numero-tel" placeholder="Numero de 8 chiffre"  >
        <label for="adresse">Adresse enterpise</label>
        <input type="text" name="adresse" id="adresse" placeholder="Adresse">
        <label for="logo" id="logo-en">Deposer Logo <i class="fa-solid fa-upload"></i></label>
        <input type="file" id="logo" name="logo" accept="image/png,img/jpeg">
        <label for="password">Password Enterprise</label>
        <input type="password" id="password" name="password" placeholder="Password">
        <input type="submit" value="Inscrire" id="inscrire" name="inscrire-en">
    </form>
</body>
</html>