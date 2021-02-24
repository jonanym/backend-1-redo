<!-- <div class="hide">
    <h3>Click text to delete</h3>
    <input type="submit" class="button" name="accdelete" value="Delete">
    </div> -->

<label for="trigger">Delete account</label>
<input id="trigger" type="checkbox">
<div class="box">
    <h3>Skriv ditt lösenord och tryck DELETE</h3>
    <form>
        <input type="text" name="deletepw">
        <input type="submit" name="submit" value="DELETE"><br>
    </form> 
    <h4>VARNING - Din profilsida tas bort</h4>
</div>
<?php
$passkey = $_POST['deletepw'];
$sesskey = $_SESSION['user'];

$query = "SELECT password FROM users WHERE username = ?";
$conn = create_conn();
$stmt = $conn->prepare($query);
$stmt->bind_param("s",$sesskey);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

    if($passkey == $row['password']){
        $query = "DELETE FROM users WHERE username = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s",$sesskey);
        $stmt->execute();
        header('Refresh:2; url=index.php');
    } else {
        print("<p>:)</p>");
    }
    
    //  Button först -> Ge lösenord
    //  IF lösenord match on submit -> Remove ID tabellz
    ?>
    