<?php include "init.php" ?>
<?php include "head.php" ?>

<article class="box">
    <h2>Detta är ett test</h2>
    <form action="testfield.php" method="post">
    <input type="submit" name="submit" id="submit" value="submit">
    </form>
    </article>

<?php

if(isset($_POST['submit'])){
    print("stage 1 ");
$name = "abc";

    print($name);
$query = ("SELECT * FROM users WHERE username = '$name'");
  
  $result -> mysqli_query($conn,$query) or die(mysql_error());

  $row = mysqli_num_rows($result);

  $printer = mysqli_fetch_assoc($row);

  print($printer);
} else {
    print("Click the button please");
}

  ?>


<?php include "footer.php" ?>