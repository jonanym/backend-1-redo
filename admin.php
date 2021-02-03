<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

    <?php
    print("<p>Nu är du på Admin sidan</p>");
    //print_r($_SESSION);


    //TODO1: Visa en text endast om $_SESSION['user'] == "jonathan"
    
    if($_SESSION['user'] == "admin")
    {
        print("Du är den mäktigaste adminnen my lord");
        print("<p>Du har rätt att göra vilka ändringar som helst</p>"); 
    }


    else{
        print("Försöker du bryta dig in på Admin sidan???");
        print("<p>Gå bort! Försök int!</p>");
    }

    print("<a href = 'index.php'> Tillbaka</a>");




    //TODO2: Annars, styr användaren till loginsidan (index.php)
    
    ?>

</body>
</html>