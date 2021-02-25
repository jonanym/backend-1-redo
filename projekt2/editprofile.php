<?php include "init.php"; ?>
<?php include "head.php"; ?>


<div class="editprofile">
    <h2>Editera din profil</h2>
<?php


        //if ($_GET['user'] == $_SESSION['user']) {
            
            //$current = $_GET['user'];
            $conn = create_conn();
            $user = $_SESSION['user'];

            $sql = "SELECT * FROM users WHERE username = ?";  // ? = Placeholder för data

            $stmt = $conn->prepare($sql); // Prepare returnerar mysqli_stmt objekt
            $stmt->bind_param("s",$user); // Nuförst skickar den användarinmatad data till sql
            $stmt->execute(); // execute returnar true eller false


            $result = $stmt->get_result(); // Returnar data i form av ett msqli_result objekt
            $row = $result->fetch_assoc(); // Ta ut data från mysqli_result objekt till en ass array

            // TA EXEMPEL FRÅN ANVÄNDARNAMN
            $username = $row['username'];
            $realname = $row['realname'];
            $email = $row['email'];
            $zipcode = $row['zipcode'];
            $arslan = $row['salary'];
            $bio = $row['bio'];
            $password = $row['password'];
            $bio = $row['bio'];
        
            echo(
            "
            <form action='./change.php' method='post'>
            <ul class='registerlist'>
                <br>

                <li><label>Hejsan </label><h3>".$row['username']. "</h3><br>Byt användarnamn: <br><input type='text' name='anvandare' value='$username'/></li>


                <li>Byt ditt namn:<br> <input type='text' name='namnet' value='$realname'/></li>
                <li>Byt ditt email:<br> <input type='text' name='email' value='$email'/></li>
                <li>Byt zipcode:<br> <input type='text' name='zipcode' value='$zipcode'/></li>
                <li>Byt årslön:<br> <input type='text' name='arslan' value='$arslan'/></li>
                <li>Byt password:<br> <input type='text' name='password'/></li>
                <li><br>Byt Preferense:<br></li>
                <input type='radio' name='preference' value='male' id='male'/><label for='male' class='butlabel'>Man</label><br>
                <input type='radio' name='preference' value='female' id='female'/><label for='female' class='butlabel'>Kvinna</label><br>
                <input type='radio' name='preference' value='other' id='other'/><label for='other' class='butlabel'>Annan</label><br>
                <input type='radio' name='preference' value='bothof' id='bothof'/><label for='bothof' class='butlabel'>Båda</label><br>
                <input type='radio' name='preference' value='allof' id='allof'/><label for='allof' class='butlabel'>Alla</label></li>
                <br>
                <label>Updatera bio</label><br>
                <textarea name='comment' rows='5' cols='40' name=bioinput>$bio</textarea><br>
                <input type='submit' name='submit' value='Updatera' id='registerbutton'><br>
                </form>
                
                
            </ul><br><br>"
        );

        
    //} else { header('Refresh:0; url=login.php'); }
?>
</div>
    <?php include "footer.php"; ?>