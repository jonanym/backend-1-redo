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
    $sqlquery = ("SELECT * FROM users WHERE username = '$name'");
  
    $result = $conn -> query($sqlquery);

    $row = $result -> fetch_assoc();

    //$printer = mysqli_fetch_assoc($row);
    print("Hej");
    print($row['username']);
} else {
    print("Click the button please");
}

  ?>


<?php include "footer.php" ?>