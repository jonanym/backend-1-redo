<?php include "init.php" ?>
<?php include "head.php" ?>

<article class="box">
    <h2>Logga in!</h2>
<form action="login.php" method="post">
  Användarnamn <br><input type="text" name="usr" id="usr"><br>
  Lösenord <br><input type="password" name="psw" id="usr"><br>
  <input type="hidden" name="stage" value="Login">
  <input type="submit" value="Logga in">
</form><br>

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
    // removed från query temporärt: ("SELECT username, password FROM users WHERE username AND  password = '".md5($password)."');
  $query = "SELECT username FROM users WHERE username = ?";
  $conn = create_conn();
  $stmt = $conn->prepare($query);
  $stmt->bind_param("s",$name);
  $stmt->execute();
  $result = $stmt->get_result();
  $row = mysqli_num_rows($result);

  if($row==1){
    print("Success");
    $_SESSION['user'] = $name;
    header('Location: ./profile.php');
  } else {
    echo "<div class='form'>
   <h3>Username/password is incorrect.</h3></div>";
    }
  }else{


  ?><div class="box">
  <p>Fyll i fältet ovanför och submit för att denna låda skall försvinna</p>
  </div>
  <?php } ?>

  <?php include "footer.php" ?>