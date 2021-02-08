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
    
    if($_SESSION['user'] == "admin" && $_SESSION['passwd'] == "hemlighet")
    {
        print("Du är den mäktigaste adminnen my lord");
        print("<p>Du har rätt att göra vilka ändringar som helst</p>"); 

        $serverName = $_SERVER['SERVER_NAME'];
print("Serverns namn är: " . $serverName . "</p>");
$userName = $_SERVER['REMOTE_USER'];
print("Användarnamnet: " . $userName . "</p>");
$serverPort = $_SERVER['SERVER_PORT'];
$ipAdress = $_SERVER['REMOTE_ADDR'];
// konkatenering med punkt, märk att PHP kod producerar HTML resurser
print("<p>Servern snurrar på port: " . $serverPort . "</p>");
print("<p>Php versionen är: " . phpversion(). "</p>");
print("<p>Apache versionen är: " . apache_get_version(). "</p>");
print "IP adressen är: ".$_SERVER['REMOTE_ADDR'];
print("<br>");
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