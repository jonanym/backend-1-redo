<!DOCTYPE html>
<html lang="en">
<?php 

session_start();
include "functions.php"

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jonathans JS Demo</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Containern har max bredd 800px -->
    <div id="container">

        <?php include "navbar.php" ?>

        <!-- Artiklar placerar sig snyggt efter varann -->
        <article>
            <h1>Uppg 1</h1>
            <p>Xampp server info</p>
            <?php
// uppg 1 - Superglobals
// phpinfo(); sök här för efter uppg 1 info
//phpinfo();
$serverName = $_SERVER['SERVER_NAME'];
print("Serverns namn är: " . $serverName . "<p>");
$userName = $_SERVER['REMOTE_USER'];
print("Användarnamnet: " . $userName . "<p>");
$serverPort = $_SERVER['SERVER_PORT'];
// konkatenering med punkt, märk att PHP kod producerar HTML resurser
print("<p>Servern snurrar på port: " . $serverPort . "<p>");

?>
        </article>


        <article>
            <h2>Uppg 2</h2>
            <p>Tid och datum</p>
            <?php
print("<p>Klockan är " . date("H:i:s") . " just nu</p>");
print("<p>Datumet i dag: " . date("d") . "/" . date("m") . "/20" . date("y") . "</p>");
$manader = array("Januari", "Februari", "Mars", "April", "Maj", "Juni", "July", "Augusti", "september", "Oktober", "November");
$manad = date("m");
// tyvärr  verkar $manad vara en sträng inte en nummer
// type cast str till int:
$manadInt = (int) $manad - 1;
print("<p>På svenska heter den första månaden: " . $manader[$manadInt]);
$veckodag = date("w");
$veckodagInt = (int) $veckodag;
$veckoDag = array("Söndag", "Måndag", "Tisdag", "Onsdag", "Torsdag", "Fredag", "Lördag");
print("<p>I dag är det " . $veckoDag[$veckodagInt]);

//print("<p> I dag är det " ..)
?>
        </article>

        <article>
            <h2>Uppg 3</h2>
            <form action="index.php" method="get">
                Dag: <input type="text" name="dag"><br>
                Månad: <input type="text" name="manad"><br>
                <input type="submit"><br>

                <?php

        // Kolla om man tryckt submit
        if (isset($_REQUEST["dag"]) && isset($_REQUEST["manad"])){
           $dag = $_GET["dag"];
           $manad = $_GET["manad"];
           $datum = date("d.m.Y", mktime(0,0,0,$manad,$dag,2020));
           
           print("<p>Till den: " . date("d.m.Y", mktime(0,0,0,$manad,$dag,2021)) ." är det: "); 
        }
        ?>

        </article>

        <article>
            <h2>Uppg 4</h2>
            <form action="index.php" method="get">
                Användarnamn: <input type="text" name="username"><br>
                E-mail: <input type="text" name="email"><br>
                <input type="submit" value="Registrera dig">
            </form>
            <?php
        if ( isset($_REQUEST['username']) && isset($_REQUEST['email'])) {
            //uppg 4 - skapa confirmation email
            $username = test_input($_GET['username'] ) ;
            print($username);
        }
        ?>
        </article>

        <article>
            <h2>Uppg 5</h2>
            <?php
// uppg 5 - ge användaren en cookie
$cookie_name = "username";
$cookie_value = "nymajona";
setcookie($cookie_name, $cookie_value, time() + (86400 * 2), "/");

//Kolla ifall användaren har en cookie
if(isset($_COOKIE["username"])){
    print("<p>Välkommen " . $cookie_value . "!</p>");
}




?>

        </article>


        <article>
            <h2>Uppg 6 </h2>
            <?php
        // uppg 6 - spara användardata på servern
            $_SESSION['user'] = "jonathan";
            print("<p>Endast Dennis har tillgång till Dark Web</>");
            print("<a href = 'darkweb.php'> DARK WEB</a>");

        ?>
        </article>
    </div>
</body>

<!-- Script kan köras efter att sidan laddats in -->
<script src="script.js"></script>

</html>