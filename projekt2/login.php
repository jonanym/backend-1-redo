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
    if($_POST['usr'] == $_POST['psw']){
      echo("<p>OBS fälten får inte vara tomma eller samma!</p>");
    } else {

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
  
    print($password);
  $hashedpassword = hash("sha256", $password);
  echo("<p>".$password."</p>");
  $conn = create_conn();
  $query = "SELECT * FROM users WHERE username = ?";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("s", $name);
  $stmt->execute();
  if ($stmt->execute()) { 
    print("EXECUTED");
 } else {
    print("Not executed");
 }
  $result = $stmt->get_result();
  print("get result");
  $row = mysqli_fetch_assoc($result);
  print("fetched assoc");
  echo("<br><br>");
  print($hashedpassword);
  echo("<br>");
  print($row['password']);
  if($hashedpassword==$row['password']){
    print("Success");
    $_SESSION['user'] = $name;
    header('Refresh:2; url=index.php');
  } else {
    echo "<div class='form'>
   <h3>Username/password is incorrect.</h3></div>";
  }
  
  /*$pwquery = "SELECT password FROM users WHERE password = ?";
  $pwstmt = $conn->prepare($pwquery);
  $pwstmt->bind_param("s",$password);
  $pwstmt->execute();
  $pwresult = $pwstmt->get_result();
  $pwrow = mysqli_num_rows($pwresult); */
  } 
  
  }else{ 
    echo "<h3>Användarnamn eller lösenord fanns ej</h3></div>";
  

  ?><div class="box">
  <p>Fyll i fältet ovanför och submit för att denna låda skall försvinna</p>
  </div>
  <?php } ?>
  <!-- < ?php include "footer.php" ?> --> 