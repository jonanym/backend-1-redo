<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

    <?php
    print("<p>Här är innehållet av din session:</p>");
    //print_r($_SESSION);


    //TODO1: Visa en text endast om $_SESSION['user'] == "jonathan"
    
    if($_SESSION['user'] == "jonathan" && $_SESSION['passwd'] == "superhemlis")
    {
        print("Hej på dig Jonathan");
        print("<p>Mitt lösenord är Superhemlis</p>"); 
    }

    else if($_SESSION['user'] == "nymajona")
    {
        print("<p>Aha du försökte med min arcada mailadress, bra försök men du är nog ändå en skurk...</p>");

    }

    else{
        print("du är inte jonathan");
        print("<p>Gå bort! Försök int!</p>");
    }



    print("<a href = 'index.php'> Tillbaka</a>");




    //TODO2: Annars, styr användaren till loginsidan (index.php)
    
    ?>

</body>
</html>