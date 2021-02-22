<?php include "init.php" ?>
<?php include "head.php" ?>


<article>
    <h1>Välkommen till DenDär dating sidan!</h1>
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