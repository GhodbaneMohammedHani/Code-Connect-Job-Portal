<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
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
#logo{
  display: block;
  max-width:230px;
  max-height:95px;
  width: auto;
  height: auto;
}

.footer{
width: 100%;
background-color: var(--color4);
display: flex;
flex-direction: row;
padding-bottom: 40px;
margin-top: 40px;
}
#about{
    width: 50%;
    padding-left: 40px;
    padding-top: 20px;
    color: var(--color3);
    display: flex;
    flex-direction: column;
    justify-content: space-around;
}
#contact>h1{
    color: var(--color2);
    margin-left: 30px;
    font-size: 30px;
    margin-top: 20px;
}
#contact>ul>li{
    color: var(--color3);
    list-style: none;
}
.footer{
    margin-top: 40px;
    margin-bottom: 0px;
}
</style>
<body>
    <footer class="footer">
        <div id="about">
            <img src="./images/logo-no-background.png" alt="logo" id="logo" >
            <p>Platform specialise en recurtement des talents on Algerie</p>
        </div>
        <div id="contact">
            <h1>Contact</h1>
            <ul>
                <li><i class="fa-solid fa-envelope"></i> ghodbanemohammedhani@gmail.com</li>
                <li><i class="fa-solid fa-phone"></i> 0672212340</li>
            </ul>
        </div>
    </footer>
</body>
</html>