<?php

session_start();

//TODO: do not hardcode, get from database
//const login = 'admin';
//const password = 'admin';

if (isset($_POST['login']) && isset($_POST['password'])) //when form submitted
{
  if ($_POST['login'] === login && $_POST['password'] === password)
  {
    $_SESSION['login'] = $_POST['login']; //write login to server storage
    header('Location: /'); //redirect to main
  }
  else
  {
    echo "<script>alert('Wrong login or password');</script>";
    echo "<noscript>Wrong login or password</noscript>";
  }
}

?>

<form action="index.php" method="post">
  Användarnamn <br><input type="text" name="usr"><br>
  Lösenord <br><input type="password" nmame="psw"><br>
  <input type="hidden" name="stage" value="Login">
  <input type="submit" value="Logga in">
</form>

<?php
  if(isset($_REQUEST['stage']) && ($_REQUEST['stage'] == 'signin' || $_REQUEST['stage'] == 'login')) {
    print("loggar in om 2 sek...");

    //temp login solusion
    $_SESSION['user'] = "manlyman";
    header("refresh:10,url=./profile.php"); // Login succes -> profil
  } else {
    print("Användarnamn OCH lösenord tack!");
  }