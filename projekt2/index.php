<?php include "init.php" ?>
<?php include "head.php" ?>

<article>
    <h1>Hämta data</h1>
    <?php include "fetch.php" ?>
</article>

<article>
    <h1>Registrera dig</h1>
    <p>För att se emailen på annonserna, logga in eller registrera dig</p>
    <a href="index.php?stage=signin"><input type="button" value="logga in"></a>
    <a href="index.php?stage=signup"><input type="button" value="registrera dig"><br></a>
    <?php
    //om man har klickat på register knappen är stage sätt och innehåller stage signup
    if(isset($_REQUEST['stage']) && ($_REQUEST['stage'] == 'signup')){
        include "register.php"; 
     }   

     else if(isset($_REQUEST['stage']) && ($_REQUEST['stage'] == 'signin' || $_REQUEST['stage'] == 'login')){
        include "login.php"; 
     }   



        ?>
    
    
    
</article>




<?php include "footer.php" ?>