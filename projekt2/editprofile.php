<?php
        if ($_GET['user'] == $_SESSION['user']) {

            $current = $_GET['user'];
            $conn = create_conn();
            $user = $_SESSION['user'];

            $sql = "SELECT * FROM users WHERE username = ?";  // ? = Placeholder för data

            $stmt = $conn->prepare($sql); // Prepare returnerar mysqli_stmt objekt
            $stmt->bind_param("s",$user); // Nuförst skickar den användarinmatad data till sql
            $stmt->execute(); // execute returnar true eller false


            $result = $stmt->get_result(); // Returnar data i form av ett msqli_result objekt
            $row = $result->fetch_assoc(); // Ta ut data från mysqli_result objekt till en ass array

            // TA EXEMPEL FRÅN ANVÄNDARNAMN
            echo(
            "<ul class='registerlist'>
                <br>

                <li><label>Användarnamn</label><br><h3>".$row['username']. "</h3><input type='text' name='uninput'/></li>


                <li><label>Namn</label><br><h3>".$row['realname']. "</h3></li>
                <li><label>Email</label><br><h3>".$row['email']. "</h3></li>
                <li><label>Postnummer</label><br><h3>".$row['zipcode']. "</h3></li><br>

                <label>Profil BIO</label><br>
                <p>".$row['bio']. "</p></li><br>
                
                <li><label>Årslön</label><h3>".$row['salary']. "</h3></li></li><br>
                <li><label>Preferens</label><br><h3>".$row['realname']. "</h3></li>
            </ul><br><br>"
        );
    } else {
        header('Refresh:0; url=login.php');
    }