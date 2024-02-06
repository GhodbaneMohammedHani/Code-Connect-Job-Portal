<?php 
session_start();
$id=$_SESSION['id'];
$con=mysqli_connect("localhost","root","","codeconnect");
$query="SELECT * FROM chercheuremploi where num_chercheur=$id ";
$result=mysqli_query($con,$query);
$chercheurEmploi=mysqli_fetch_all($result,MYSQLI_ASSOC);
//<embed  src=<?php echo "..".str_replace("\\","/",$chercheurEmploi[0]['cv']); ?><!-- type="application/pdf" width="600"  /> -->
<style>
  @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');
  @import url('https://fonts.googleapis.com/css2?family=Roboto+Slab&family=Roboto:wght@400;700&display=swap');
    :root{
        --color1:#0080FF;
        --color2:#0080FF;
        --color3:#010C80;
        --color4:#8DBDFF;
    }
    .box{
        display: flex;
        flex-direction: row;
    }
    .cv{
        width: 50%;
        background-color: var(--color3);
        display: flex;
        flex-direction: column;
        padding: 20px;
    }
    .lettre{
        padding-top: 40px;
        padding-left: 40px;
        height: 87vh;
        background-color: var(--color2);
        width: 50%;
        display: flex;
        flex-direction: column;
        color: var(--color3);
    }
    .lettre>h1{
        font-family: 'Roboto Sable',serif;
        font-weight: bold;
    }
    #appliquer{
        margin-top: 40px;
        background-color: var(--color3);
        border: none;
        font-size: 20px;
        color: white;
        padding: 10px;
        border-radius: 8px;
    }
    textarea{
        background-color: var(--color4);
        padding-left: 10px;
        color: var(--color1);
    }
    textarea::placeholder{
        color: var(--color1);
        font-style: italic;
    }
</style>
<body>
    <?php include('nav.php')  ?>
    <div class="box">
    <div class="cv">
    <embed  src=<?php echo "..".str_replace("\\","/",$chercheurEmploi[0]['cv']); ?> type="application/pdf" height="400" />
    </div>
    <div class="lettre">
    <h1>Lettre de motivation</h1>
    <form action="ajouterApplication.php?numoffre=<?php echo$_GET['numoffre']?>" method="post">
        <textarea name="lettre" id="lettre" cols="50" rows="4" placeholder="Lettre de motivation (optional) "></textarea>
        <div>
        <input type="submit" name="app" value="Confirmer" id="appliquer">
        </div>
    </form>
    </div>
    </div>
    <?php 
include('footer.php');
?>
</body>
</html>