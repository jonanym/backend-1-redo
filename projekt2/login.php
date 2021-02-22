<?php
session_start();

?>

<form action="index.php" method="post">
  Användarnamn <br><input type="text" name="usr"><br>
  Lösenord <br><input type="password" name="psw"><br>
  <input type="hidden" name="stage" value="Login">
  <input type="submit" value="Logga in">
</form>

<?php

  if (isset($_POST['usr']) && isset($_POST['psw'])) //when form submitted
  {
  $name = stripslashes($_POST["usr"]); 
  $name = mysql_real_escape_string($_POST["usr"]);
  $password = stripslashes($_POST["psw"]); 
  $password = mysql_real_escape_string($_POST["psw"]); 


  $sql = ("SELECT username, password FROM users WHERE username = '".$name."' AND  password = '".$password."'");
  if(mysql_num_rows($result1) > 0 )
    {
    print("YAY SUCCESS");
      /*  
  $stmt = $conn->prepare($sql); 
  $stmt->bind_param("ss", $username, $password);
  $stmt->execute();
  $result = $stmt->get_result(); // get the mysqli result
  $user = $result->fetch_assoc();


  if ($_POST['login'] === login && $_POST['password'] === password)
  {
    $_SESSION['login'] = $_POST['login']; //write login to server storage
    header('Location: /'); //redirect to main */
    }
  }
  else if (!isset($_POST['usr']) || !isset($_POST['psw']))
  {
    echo "<script>alert('Give both username and password');</script>";
    echo "<noscript>Give both username and password</noscript>";
    //echo "<script>alert('Wrong login or password');</script>";
    //echo "<noscript>Wrong login or password</noscript>";
  }

/*
  if(isset($_REQUEST['stage']) && ($_REQUEST['stage'] == 'signin' || $_REQUEST['stage'] == 'login')) {
    print("loggar in om 2 sek...");

    //temp login solusion
    $_SESSION['user'] = "manlyman";
    header("refresh:10,url=./profile.php"); // Login succes -> profil
  } else {
    print("Användarnamn OCH lösenord tack!");
  } */