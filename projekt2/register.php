<?php
// Kolla att man klickat submit!
if (isset($_REQUEST['usr']) && isset($_REQUEST['psw'])  ) {
    //KOM IHÅG XSS PROTECTION
    $username = test_input($_REQUEST['usr']);
    $password = test_input($_REQUEST['psw']);
    $password = hash("sha256", $password);
    //superhemlis => asd123 - en envägsalgoritm
    $realname = "asd"; 
    $email="asas"; 
    $zip = 0056; 
    $bio="bäst"; 
    $salary = 100;
    $preference = 2;

    // Prepared statements går snabbare att köra och skyddar mot SQL Injection!
    $statement = $conn->prepare("INSERT INTO users (username, realname, password, email, zipcode, bio, salary, preference) VALUES (?,?,?,?,?,?,?,?)");
    $statement->bind_param("ssssisii",$username, $realname, $password, $email, $zip, $bio, $salary, $preference);
    // De flesta metoderna returnerar ett objekt (sant) om de lyckas & false ifall de misslyckas.
    if ($statement->execute()) {
        print("Du har registrerats!");
    }
    else{
        print("error");
    }
    // Kom ihåg att error handling
}