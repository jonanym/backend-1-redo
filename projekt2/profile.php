<?php include "init.php" ?>
<?php include "head.php" ?>


<article>
    <h1>Profilsidan</h1>
    <?php
    // Här hämtar vi användarens data
    print("Användarnamnet är: " . $_SESSION['user'] . "<br>");

    $conn = create_conn(); // mysqli ovjektet skapas
    $user = $_SESSION['user']; // kolla vem som är inloggad
    $sql ="SELECT * FROM users WHERE username = ?"; // ? placeholder för data

    $stmt = $conn->prepare($sql);   // Prepare returnerar mysqli stmt objekt
    $stmt->bind_param("s",$user);   // mata in användarinmatad data i sql
    $stmt->execute();   // returnerar true eller false (lyckades köras op DBn eller ej)

    $result = $stmt->get_result();  // Returnerar datan i form a ett mysqli_result objekt
    $row = $result->fetch_assoc();   // Tar ut datan ur musqli_result objektet till en assArr
    print("Riktiga namnet: <input type='text' value='" . $row['realname'] ."'><br>");
    print("Annonstext: <textarea>" . $row['bio'] ."</textarea>");


    ?>
    <!-- Lite html kod mitt inne i php scriptet :O -->
    <input type="button" value="Modifiera"><br>
    <?php
    // PHP koden fortsätter
    print("Lite till info från databasen: " .$row['preference']);
    ?>
</article>



<?php include "footer.php" ?>