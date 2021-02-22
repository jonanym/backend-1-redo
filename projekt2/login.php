<form action="index.php" method="post">
  Användarnamn <br><input type="text" name="usr" id="usr"><br>
  Lösenord <br><input type="password" name="psw" id="usr"><br>
  <input type="hidden" name="stage" value="Login">
  <input type="submit" value="Logga in">
</form>

<?php
  
  if(isset($_POST['submit'])){
    print($_POST['usr']);
  } else {
    print("No button clicked yet");
  }
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
      print($psw_error);

    } else{
      $password = trim($_POST["psw"]);
      $password = stripslashes($name);
      
    }

  $conn = create_conn();
  $query = ("SELECT username, password FROM users WHERE username = '$name' AND  password = '".md5($password)."'");
  
  $result -> mysqli_query($conn,$query) or die(mysql_error());
  $row = mysqli_num_rows($result);
  if($row==1){
    echo "<script>WTF IT WORKED;</script>";
    print("IT WORKED");
    $_SESSION['user'] = $name;
  } else{
    echo "<div class='form'>
   <h3>Username/password is incorrect.</h3>
   <br/>Click here to <a href='login.php'>Login</a></div>";
    }
       }else{


  ?><div class="box">
  <p>Coolt sätt att skriva php else</p>
  </div>
  <?php } ?>