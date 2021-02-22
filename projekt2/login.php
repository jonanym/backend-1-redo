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

  if (isset($_POST['usr']) && isset($_POST['psw']) && isset($_POST['submit'])) //when form submitted
  {
    if(empty(trim($_POST["usr"]))){
      $usr_error = "Please enter username.";
    } else{
      $name = trim($_POST["usr"]);
      $name = stripslashes($name);
    }
    if(empty(trim($_POST["psw"]))){
      $psw_error = "Please enter password.";
    } else{
      $password = trim($_POST["psw"]);
      $password = stripslashes($name);
    }


  $sql = ("SELECT username, password FROM users WHERE username = '".$name."' AND  password = '".$password."'");
  if(mysql_num_rows($sql) > 0 )
    {
    print("YAY SUCCESS");

    $_SESSION['user'] = $name;

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
    else {
      echo "<script>alert('Give both username and password');</script>";
      echo "<noscript>Give both username and password</noscript>";
    }
  }
  else if (!isset($_POST['usr']) || !isset($_POST['psw']))
  {
    print("Fyll i både användarnamn och lösenord tack!");
    
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