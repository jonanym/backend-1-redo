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
        <nav>
            <!-- Logo och meny finns i nav -->
            <ul>
                <a id="current" href="../home/">Home</a>
                <a href="../projekt1/">Projekt 1</a>
                <a href="../projekt2/">Projekt 2</a>
            </ul>
        </nav>

        <!-- Artiklar placerar sig snyggt efter varann -->
        <article>
            <h1>Uppg 1</h1>
            <p>Xampp server info</p>
            <?php
// uppg 1 - Superglobals
// phpinfo(); sök här för efter uppg 1 info
print($_SERVER['REMOTE_USER']);
$serverPort = $_SERVER['SERVER_PORT'];
// konkatenering med punkt, märk att PHP kod producerar HTML resurser
print("<p>Servern snurrar på port: " . $serverPort . "<p>");
?>
        </article>


        <article>
            <h2>Uppg 2</h2>
            <p>Tid och datum</p>
            <?php
            print( "<p>Det är den " . date("d") . " nde dagen idag</p>" );
            print( "<p>Klockan är ". date("h:i:s") . " just nu</p>");
            print( "<p>Det är den " . date("m") . "nde månaden idag</p>");
            $manader = array("Januari", "Februari", "Mars");
            $manad = date("m");
            // tyvärr  verkar $manad vara en sträng inte en nummer
            // type cast str till int:
            $manadInt = (int)$manad;
            print( "<p>På svenska heter den första månaden: " .$manader[$manadInt] );
            ?>
        </article>

        <article>
        <h2>Uppg 3</h2>
        <form action="index.php" method="get">
            Dag: <input type="text" name="dag"><br>
            Månad: <input type="text" name="manad"><br>
            <input type="submit"><br>
        <?php
        $dag = $_GET["dag"];
        print("Du vill veta hur länge det är till " . $dag );

        ?>

        </article>
    </div>
</body>

<!-- Script kan köras efter att sidan laddats in -->
<script src="script.js"></script>

</html>