<?php include "init.php" ?>
<?php include "head.php" ?>


<article>
    <img src="../projekt2/images/love.jpg" width="450px" height="200px" id="love">
    <h1>Välkommen till Kiss Kiss Bang Bang!</h1>
    <?php
    if (!isset($_SESSION['user'])){
        echo("<p>Du är för tillfället inte inloggad</p>");
    include "welcome.php";
    } else {
        echo("<a href='./logout.php' id='logout'>Logout</a>");
    }

    ?>
</article>
<article>
<?php include "profile.php" ?>
<?php include "comment.php" ?>

</article>


<?php include "footer.php" ?>