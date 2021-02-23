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
    $query = "SELECT bio FROM users WHERE username = 'abc'";
  
    $conn = create_conn();
    $result = mysqli_query($conn,$query);

    $row = mysqli_num_rows($result);
    print($row['bio']);
} else {
    print("Click the button please");
}

  ?>


<?php include "footer.php" ?>