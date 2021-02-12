<?php include "init.php" ?>
<?php include "head.php" ?>

<article>
    <h1>Hämta data</h1>
    <?php include "fetch.php" ?>
</article>

<article>
    <h1>Registrera dig</h1>
    <p>För att se emailen på annonserna, logga in eller registrera dig</p>
    <input type="button" value="logga in">
    <input type="button" value="registrera dig"><br>
<!-- Loginformulär -->
    <form action="index.php" method="post">
        Användarnamn <br><input type="text" name="usr"><br>
        Lösenord <br><input type="password" nmame="psw"><br>
        <input type="submit" value="Logga in">
    </form>

    <?php include "register.php" ?>
    
</article>




<?php include "footer.php" ?>