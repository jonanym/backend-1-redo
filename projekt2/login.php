<?php include "init.php" ?>
<?php include "head.php" ?>
<div class="container">
    <h2>Logga in!</h2>
<form action="login.php" method="post">
  Användarnamn <br><input type="text" name="usr" id="usr"><br>
  Lösenord <br><input type="password" name="psw" id="psw"><br>
  <input type="submit" value="Logga in">
</form><br>

<?php

  if (isset($_POST['usr']) && isset($_POST['psw'])) //when form submitted
  {
    if(empty(trim($_POST["usr"]))){
      $usr_error = "Du kan inte lämna användarnamn tomt.";
      print($usr_error);
    } else{
      $name = trim($_POST["usr"]);
      $name = stripslashes($name);
      print("Namn klar ");
    }
    if(empty(trim($_POST["psw"]))){
      $psw_error = "Du kan inte lämna lösenord tomt.";
      print($psw_error);

    } else{
      $password = trim($_POST["psw"]);
      $password = stripslashes($name);
      print("PW klar ");
    }
    // removed från query temporärt: ("SELECT username, password FROM users WHERE username AND  password = '".md5($password)."');
  $conn = create_conn();
  $query = "SELECT username, password FROM users WHERE username AND password = (?, ?)";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("ss", $name, $password);
  $stmt->execute();
  $result = $stmt->get_result();
  $row = fetch_assoc($result);

  print("före hashingen! ");

  $password = hash("sha256", $password);
  
  /*$pwquery = "SELECT password FROM users WHERE password = ?";
  $pwstmt = $conn->prepare($pwquery);
  $pwstmt->bind_param("s",$password);
  $pwstmt->execute();
  $pwresult = $pwstmt->get_result();
  $pwrow = mysqli_num_rows($pwresult); */

  if($name == $row['username'] && $password==$row['password']){
    print("Success");
    $_SESSION['user'] = $name;
    header('Refresh:2; url=index.php');
  } else {
    echo "<div class='form'>
   <h3>Username/password is incorrect.</h3></div>";
    }
  }else{ 
    echo "<h3>Användarnamn eller lösenord fanns ej</h3></div>";


  ?><div class="box">
  <p>Fyll i fältet ovanför och submit för att denna låda skall försvinna</p>
  </div>
  <?php } ?>
  <?php include "footer.php" ?>