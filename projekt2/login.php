<form action="index.php" method="get">
        Användarnamn <br><input type="text" name="usr"><br>
        Lösenord <br><input type="password" nmame="psw"><br>
        <input type="hidden" name="stage" value="login">
        <input type="submit" value="Logga in">
    </form>

    <?php
    if (isset($_REQUEST['stage']) && ($_REQUEST['stage'] == 'login')){
        print("loggar in om 2 sekunder");
        $_SESSION['user'] = "skurk";
        header("refresh:2;url=./profile.php"); // redirect user after login
    }