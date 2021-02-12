<?php
// koppla oss till databasen
$conn = create_conn();
// Skapa SQL kommando
$sql = "SELECT * FROM users";
// Kör sql kommando
$result = $conn->query($sql);

if ($result = $conn->query($sql)){
    //skapa en while loop för att hämta varje rad
    while($row = $result->fetch_assoc()) {
        //skriv ut endast ett värde (en kolumn en rad -- en cell)
        print("Användare i databasen: " . $row['realname'] . "<br>");
    }
    
}else{
        print("något gick fel, senaste felet:". $conn->error);
    }
