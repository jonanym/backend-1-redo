<?php 
session_start();
include "functions.php"
?>
<!DOCTYPE html>
<html lang="en">

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
print("Serverns namn är: " . $serverName . "</p>");
$userName = $_SERVER['REMOTE_USER'];
print("Användarnamnet: " . $userName . "</p>");
$serverPort = $_SERVER['SERVER_PORT'];
$ipAdress = $_SERVER['REMOTE_ADDR'];
// konkatenering med punkt, märk att PHP kod producerar HTML resurser
print("<p>Servern snurrar på port: " . $serverPort . "</p>");
print("<p>Php versionen är: " . phpversion(). "</p>");
//print("<p>Apache versionen är: " . apache_get_version(). "</p>");
print "IP adressen är: ".$_SERVER['REMOTE_ADDR'];


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
$veckodag = date("w");
$veckodagInt = (int) $veckodag;
$veckoDag = array("Söndag", "Måndag", "Tisdag", "Onsdag", "Torsdag", "Fredag", "Lördag");
print("<p>I dag är det " . $veckoDag[$veckodagInt]);


$veckoNummer = date('W');
print( '<p>Veckonummer: ' . $veckoNummer."</p>");

//print("<p> I dag är det " ..)
?>

        </article>

        <article>
            <h2>Uppg 3</h2>
            <form action="index.php" method="post">
                Dag: <input type="text" name="dag"><br>
                Månad: <input type="text" name="manad"><br>
                År: <input type="text" name="ar"><br>
                <input type="submit" value="Räkna"><br>

                <?php


        // Kolla om man tryckt submit
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // collect value of input field
            $dag = $_POST['dag'];
            $manad = $_POST['manad'];
            $ar = $_POST['ar'];
            if (empty($dag) && empty($manad)) {
                echo "du måste fylla i dag och månad";
            } 
            elseif (empty($dag))
            {
                print("Du måste fylla i dagen");
            }

            elseif (empty($manad))
            {
                print("Du måste fylla i månaden");
            }
        
            else {

               $datum = date("d.m.Y", mktime(0,0,0,$manad,$dag,$ar));
                   $Veckodag = date("l", mktime(0,0,0,$manad,$dag,$ar));
                   print("<p>Den " . $datum . " är en " . $Veckodag . " och till den dagen är det: </p>");
        
                   $date1 = date('d.m.Y H:i:s', time());
                   $date2 = date('d.m.Y H:i:s', mktime(0,0,0,$manad,$dag,$ar));
                  
                   $diff = abs(strtotime($date2) - strtotime($date1));
                   $years = floor($diff / (365*60*60*24));
                   $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                   $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
                   $hours = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24) / (60*60));
                   $minutes = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24  - $hours*60*60)/ 60); 
                   $seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minutes*60));
                   print("<br>");
                   printf("%d år, %d månader, %d dagar, %d timmar, ". "%d minuter, %d sekunder",$years, $months, $days, $hours, $minutes, $seconds);

                   $dateCustom = mktime(0,0,0,$manad,$dag,$ar);
                   //print("<br>". $dateCustom);
                   $dateBasic = mktime(0, 0, 0, date("m")  , date("d"), date("Y"));
                   //print("<br>". $dateBasic);

                   if($dateCustom > $dateBasic){
                       print("<p>datumet är framtiden</p>");
                   }
                   else{
                       print("<p>datumet är i det förflutna</p>");
                   }
            }
        }

        
        ?>

        </article>


        <article>
            <h2>Uppg 4</h2>
            <form action="index.php" method="post">
                Användarnamn: <input type="text" name="username"><br>
                E-mail: <input type="text" name="email"><br>
                <input type="submit" value="Registrera dig"><br>
            </form>
            <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = test_input($_POST['username']);
            $email = $_POST['email'];
            if (empty($username) && empty($email)) 
            {
              print("Du måste mata in användarnamn och email");
          } 
          elseif(empty($username))
          {
              print("Du måste också mata in användarnamn");
          }
          elseif(empty($email))
          {
              print("Du måste också mata in email");
          }
          
          else {
            $lösenord = Lösenord();
            $to = "$email";
            $subject = "Ditt lösenord";
            $txt = "Hej, Ditt användarnamn är $username och ditt lösenord är $lösenord";
            $headers = "From: lösenord@arcada.com";

            mail($to,$subject,$txt,$headers);
             }
        }
            
        ?>


        </article>


        <article>
            <h2>Uppg 5</h2>
            <?php
                // uppg 5 - ge användaren en cookie
                $cookie_name = "username";
                $cookie_value = "gäst";
                setcookie($cookie_name, $cookie_value, time() + (86400 * 2), "/");

                //Kolla ifall användaren har en cookie
                if(isset($_COOKIE["username"])){
                //print("<p>Välkommen " . $cookie_value . "!</p>");
                //Räkna ut när du senaste besökt
                $senasteCookie = "senastebesok";
                $senasteVal = date("d.m.Y-H:i:s", time());
                setcookie($senasteCookie, $senasteVal, time()+(86400*2), "/");
                //Skriv ut senaste besök
                print("<p>Välkommen tillbaka! Din senaste visitation: ". $senasteVal);
                }
                //Om du var här första gången
                else{
                print("<p>Välkommen, du är här första gången</p>");
                }

                

    ?>

        </article>


        <article>
            <h2>Uppg 6 </h2>
            <form action="index.php" method="post">
                Login: <input type="text" name="login"><br>
                Password: <input type="text" name="password"><br>
                <input type="submit" value="Logga in">
                <?php
        // uppg 6 - spara användardata på servern
            $login = test_input($_REQUEST["login"]);
            $passwd = test_input($_REQUEST["password"]);
            
            if ($login == "jonathan" && $passwd == "superhemlis")
            {
                // "Session abc123 == $_SESSION['user']=jonathan";
                $_SESSION['user'] = "jonathan";
                $_SESSION['passwd'] = "superhemlis";
                print("<br><br><a href = 'darkweb.php'> DARK WEB</a><br>");
                print("<br> Du är inloggad som jonathan");
            //print("<p>Endast Jonathan har tillgång till Dark Web</>");
            }

            else if($login == "nymajona")
            {
                $_SESSION['user'] = "nymajona";
            }
            else if($login == "admin" && $passwd == "hemlighet")
            {
                $_SESSION['user'] = "admin";
                $_SESSION['passwd'] = "hemlighet";
                print("<br><br><a href = 'admin.php'> Admin</a>");

            }
            else 
            {
                $_SESSION['user'] = "skurk";
                //print("<p>Inga hemlisar för skurkar</p>");
                //$_SESSION['user'] = "intejonathan";
            }
           

            //Todo gör s¨att man returneras till huvudsidan om man inte har loggat in med rätta login uppgifter 

        ?>
        </article>

        <article>
            <h2>Uppg 7</h2>
            <?php
            print("<a href = 'upload.php'> Uppg 7</a>");
            ?>

        </article>




        <article>
            <h2>Uppg 8 - besöksräknare</h2>

            <?php
            
            $myfile = fopen("besok.log", "a+") or die("Unable to open file!");
            $txt = "besök: ";
            fwrite($myfile, $txt);
            $ip = $_SERVER['REMOTE_ADDR'];
            fwrite($myfile, $ip);
            $tidpunkt = time();
            fwrite($myfile, $tidpunkt."\n");
            fclose($myfile);

            $myfile = fopen("besok.log", "r") or die("Unable to open file!");
            $line = 0;
            while (!feof($myfile)){
                if(fgets($myfile,1048576)){
                    $lines++;
                }
            }

            fclose($myfile);
            //echo fread($myfile,filesize("besok.log"));
            echo $lines;

     
        ?>
            </article>

            <article>
                <h2>Uppg 9</h2>

                Comment: <br>

                <form action="index.php" method="get">
                <textarea name="comment" rows="5" cols="40"></textarea><br>
                <input type="submit" value="Kommentera" name="submit"><br>

             <?php   

             if ($_SERVER['REQUEST_METHOD'] == "POST"){
                 
                 $comment = $_REQUEST['comment'];
                    if(empty($comment)){
                        print("du måste skriva en kommentar <br>");
                     
                    }

                    else if(!empty($comment)){
                        $minfil = fopen("gästbok.log", "a+") or die("Unable to open file!");
                        $comment = "Din kommentar: ".$comment;
                        $timestamp = " <br>tidpunkten för din kommentar :". date('H:i:s', );
                        fwrite($minfil, $comment);
                        fwrite($minfil, $timestamp."\n");
                        fclose($minfil);
                          header('Location: index.php');
                    }
                    
                   
                }
                

           // $myfile = fopen("gästbok.log", "a+") or die("Unable to open file!");
                if ($minfil = fopen("gästbok.log", "r")) {

                    $file = file("gästbok.log");
                    $file = array_reverse($file);
                    foreach($file as $f){
                        echo $f."<br />";
                    }

                    fclose($minfil);
                   
                    
                }
                

                ?>
                
            </form>

            <?php
            print("<br>");
            print("<br>");
            print("<br>");
            print("<br>");
            ?>
            


        </article>
    </div>
</body>

<!-- Script kan köras efter att sidan laddats in -->
<script src="script.js"></script>


</html>