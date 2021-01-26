<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

    <?php
    print("<p>Här är inneh´ållet av din session:</p>");
    print_r($_SESSION);
    ?>


</body>
</html>