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

  echo("<p>" . $usr_error . " " . $psw_error) ."</p>";

  if (isset($_POST['usr']) && isset($_POST['psw'])) //when form submitted
  {
    if(empty(trim($_POST["usr"]))){
      $usr_error = "Du kan inte lämna användarnamn tomt.";
      print($usr_error);
    } else{
      $name = trim($_POST["usr"]);
      $name = stripslashes($name);
    }
    if(empty(trim($_POST["psw"]))){
      $psw_error = "Du kan inte lämna lösenord tomt.";

    } else{
      $password = trim($_POST["psw"]);
      $password = stripslashes($name);
    }


  $loginsql = ("SELECT username, password FROM users WHERE username = '".$name."' AND  password = '".$password."'") or die("Failed to query " .mysql_error());
  $row = mysql_fetch_array($loginsql);

  if($row['username'] == $name && $row['password'] == $password)
    {
    print("YAY SUCCESS");

    $_SESSION['user'] = $name;
    header("refresh:3,url=./profile.php");
    }
    else {
      echo "<script>alert('Give both username and password');</script>";
      echo "<noscript>Give both username and password</noscript>";
    }
  }