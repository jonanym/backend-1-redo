<?php include "init.php" ?>
<?php include "head.php" ?>

<article class="box">
    <h2>Logga in!</h2>
<form action="login.php" method="post">
  Användarnamn <br><input type="text" name="usr" id="usr"><br>
  Lösenord <br><input type="password" name="psw" id="usr"><br>
  <input type="hidden" name="stage" value="Login">
  <input type="submit" value="Logga in">
</form>

<?php
  /*
  if(!isset($_POST['submit'])){
    $ejadum = $_POST['usr'];
    print($ejadum);
  } else {
    print("No button clicked yet");
  } */
  if (isset($_POST['usr']) && isset($_POST['psw'])) //when form submitted
  {
    print("Steg 1 lyckat!" );
    if(empty(trim($_POST["usr"]))){
      $usr_error = "Du kan inte lämna användarnamn tomt.";
      print($usr_error);
    } else{
      $name = trim($_POST["usr"]);
      $name = stripslashes($name);
      print("User rensat" );
    }
    if(empty(trim($_POST["psw"]))){
      $psw_error = "Du kan inte lämna lösenord tomt.";
      print($psw_error);

    } else{
      $password = trim($_POST["psw"]);
      $password = stripslashes($name);
      print("Password rensat ");
    }
    print("Steg 2 lyckad");
    print($name);
    print($password);
    // removed från query temporärt: ("SELECT username, password FROM users WHERE username AND  password = '".md5($password)."');
  $query = "SELECT username FROM users WHERE username = '$name'";
  
  $conn = create_conn();
  $result = mysqli_query($conn,$query);

  $row = mysqli_num_rows($result);
  if($row==1){
    echo "<script>WTF IT WORKED;</script>";
    print("IT WORKED");
    $_SESSION['user'] = $name;
  } else {
    print("härdå?");
    echo "<div class='form'>
   <h3>Username/password is incorrect.</h3>
   <br/>Click here to <a href='login.php'>Login</a></div>";
    }
  }else{


  ?><div class="box">
  <p>Fyll i fältet ovanför och submit för att denna låda skall försvinna</p>
  </div>
  <?php } ?>

  <?php include "footer.php" ?>