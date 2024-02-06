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
    #logo{
  display: block;
  max-width:230px;
  max-height:95px;
  width: auto;
  height: auto;
  margin-top: 15px;
  margin-left: 20px;
    }
    .nav{
        display: flex;
        justify-content: space-between;
        background-color: #8DBDFF;
        }
    #logoutlink{
        text-decoration: none;
        color: white;
    }
    #logout{
        padding: 8px 16px;
        border: none;
        background-color:var(--color3);
        border-radius: 8px;
        margin-right: 20px;
    }
    .link-list{
        display: flex;
        flex-direction: row;
        padding-top: 10px;
        justify-content: space-around;
    }
    .link{
        margin-right: 40px;
        list-style: none;
    }
    .link>a{
        text-decoration: none;
        font-size: 25px;
        color: var(--color1);
        font-family: 'Roboto',serif;
    }
    .link>a:hover{
        text-decoration: underline;
    }
</style>
<body>
    <nav class="nav">
        <div class="logo-container">
        <img src="./images/logo-no-background.png" alt="logo" id="logo" >
        </div>
        <ul class="link-list">
            <li class="link"><a href="#about">About</a></li>
            <li class="link"><a href="#contact">Contact</a></li>
            <button id="logout"><a id="logoutlink"  href="./logout.php">Logout <i class="fa-solid fa-right-from-bracket"></i></a></button>
        </ul>
    </nav>
</body>
</html>
</nav>
</body>
</html>