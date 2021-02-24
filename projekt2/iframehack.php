<?php
echo("<h3>STAGE 1</h3>");
include "init.php";
$query = "SELECT password FROM users WHERE username = ?";
$conn = create_conn();
$stmt = $conn->prepare($query);
$stmt->bind_param("s",$sesskey);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if (isset($_POST['delpw'])) {

    $passkey = $_POST['deletepw'];
    $sesskey = $_POST['accdeletion'];
    echo("<h3>STAGE 2</h3>");
    
        if($passkey == $row['password']){
            echo("<h3>STAGE 3</h3>");
            
            $query = "DELETE FROM users WHERE username = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s",$sesskey);
            $stmt->execute();
            session_destroy();
        } else {
            print("<p>:)</p>");
        }
    } else {
        print("<p>:D</p>");
    }

?>