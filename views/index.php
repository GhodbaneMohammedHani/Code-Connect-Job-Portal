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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
     :root{
        --color1:#0080FF;
        --color2:#0080FF;
        --color3:#010C80;
        --color4:#8DBDFF;
    }
    body{
        background-color: var(--color4);
    }
    #logo-image{
        width: 531px;
        height: 63px;
    }
    .logo-container{
        text-align: center;
        width: 100%;
        margin: 40px auto 40px auto;
    }
    form{
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 50vh;
        align-items: center;
        align-content: space-between;
        margin: 0 auto 20px auto;
    }
    #email,#password{
        width: 471px;
        height:50px;
        background-color: var(--color2);
        border: none;
        color:white;
        font-style: italic;
    }
    #email::placeholder,#password::placeholder{
        color: #FFFFFF;
    }
    #submit{
        padding: 10px 20px;
        font-size: large;
        background-color: var(--color3);
        border: none;
        color: white;
        border-radius: 8px;
    }
    input:-webkit-autofill {
  -webkit-box-shadow: 0 0 0 30px var(--color2) inset; 
  -webkit-color: white;
}
h2{
    text-align: center;
    margin-top: 10px;
    margin-bottom: 10px;
}
.signups{
    display: flex;
    justify-content: center;
}
.signups>button{
    padding: 14px 40px;
    border: none;
    background-color: var(--color3);
    border-radius: 8px;
    margin-left: 20px;
}
button>a{
    text-decoration: none;
    color: white;
}
h2{
    color: var(--color3);
}
</style>
<body>
    <div class="logo-container">
<img id="logo-image" src="images/logo-no-background.png" alt="logo">
    </div>
    <form action="login.php" method="post">
        <span><?php if($error=="vide") echo "il ya un champs vide"; ?></span>
        <span><?php if($error=="email") echo "Email non valid";?></span>
        <input class="form-control" type="email" id="email" name="email" placeholder="Email">
        <span><?php if($error=="password") echo "Password non valid"?></span>
        <input class="form-control" type="password" id="password" name="password" placeholder="Password">
        <input type="submit" value="Login" id="submit" name="login">
    </form> 
    <h2>Vous n'avez pas un compte? Inscrire avec un compte</h2>
    <div class="signups">
        <button><a href="./inscrire_en.php">Inscrire pour enterprises</a></button>
        <button><a href="./inscrire_ch.php">Inscrire pour chercheurs</a></button>
    </div>
</body>
</html>