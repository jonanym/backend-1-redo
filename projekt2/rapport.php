<?php include "init.php" ?>
<?php include "head.php" ?>


<article>
    <img src="../projekt2/images/fighter.jpg" width="450px" height="200px" id="love">
    <h3>Vår webbraport. Niklas den slöa, Jonathan den unga och Jonas the legend!</h1>
    <img src="../projekt2/images/phpmyadmindesign.PNG">
    <h2>SQL struktur</h2>
        <p>Ovanför ser man hur vi har strukturerat våran SQL databas. I users har vi info på alla användare, vi använder id<br>
    som vår primär identifierare, d.v.s det kan bara finnas ett id och när det kommer fler användare får de sin egen unik id.
    <br><br>
    Röda på username och comment så betyder att vi har joinat tabellerna och på det sättet kan man skapa user "identified" kommentarer.<br>
    Annars innehåller tabellerna ganska basic saker och det är en relationel databas. Med relationel databas kan man till exempel ha <br>
    hund - ras - längd och querya med php informationen från databasen. 
    <br><br>
    På det sättet kan man kategorisera massor olika saker och använda det på sin webbsida för att strukturera och hämta<br>
    information. T.ex i webbshopar och större sidor vart man har massor med olika kategorier.</p>
    <br>
    <h2>Infopaket om SQL kommandon</h2>
    <br>
    <li>SELECT används för att välja data från en databas. Data som returneras lagras i en resultattabel.</li>
    <li>INSERT INTO används för att infoga nya poster i en tabell.</li>
    <li>UPDATE används för att modifiera befintliga poster i en tabell.</li>
    <li>DELETE används för att ta bort befintliga poster i en tabell.</li>
    <li>WHERE används för att filtrera poster. WHERE används för att extrahera endast de poster som uppfyller ett angivet villkor.</li>
    <li>LIKE används i en WHERE-sats för att söka efter ett angivet mönster i en kolumn.</li>
    <li>ORDER BY används för att sortera resultatuppsättningen i stigande ordning som standard.
    <li>För att sortera posterna i fallande ordning använder du nyckelordet ORDER BY | DESC.</li></li> 
        
<br><br>
    
<h2>Niklas kommentar sektion</h2>
Php har varit för mig kanske det roligaste kod språket hittills och jag kommer säkerligen att fördjupa mig i det ordentligt efter att kursen är slut.
<br> <br>
Vi hade korona skräck i pojkens skola så jag tappade mycket aktivt deltagande från min del i det här projektet, som jag är ledsen över, men mina arbetskompisar har varit väldigt symppisar så massor tackar åt dem, specielt Jonas. 
<br><br>
Det här var första gången som vi kodade tillsammans med någon annan och det känns nog intimiderande men roligt. Om vi började med det här redan tidigare så kunde jag tänka mig att det skulle gå smidigare. 
<br><br>Jag tyckte speciellt om idén att koda i par vart ena är drivern och andra är navigatorn och det stöder sig ganska långt på det som man lärt sig i psykologin och annanstans. 
<br><br>
<h2>Jonathans kommentar sektion</h2>
Jag tycker att php nog har verkat som ett väldigt roligt och relativt lättanvänt språk, men tyvärr lite som för niklas så råkade jag ha en massa andra saker på g och lite svårt med motivationen med distansstudier så har haft en hel del svårigheter med kursen.
<br><br>
Jonas har verkligen varit till stor hjälp och och varit en extremt duktig/skicklig arbetskamrat, men niklas vet hur man håller humöret uppe och har nog hjälpt så mykke han har kunnat :)
Att koda tillsammans har nog varit roligt och definitivt lättare än att tvingas göra allting själ. Gitt har också sakta men säkert blivit klarare och lättare att använda. Hade också en del problem med gitt att det inte ville pusha mina ändringar men fick npg problemet fixat tror jag
<br><br>
Själv tänker jag nog gå igenom kursen pånytt på egen hand och försöka gå igenom allt med lite bättre tid och försöka fatta php lite bättre än jag gjort hittills
<br><br>
<?php include "jonas.php"?>
<br><br><br>
<marquee direction="left" height="100px" scrollamount="6"><i>
SQL is designed for a specific purpose: to query data contained in a relational database. SQL is a set-based, declarative programming language, not an imperative programming language like C or BASIC.

</i>
</marquee>

</article>


<?php include "footer.php" ?>