<!-- <div class="hide">
    <h3>Click text to delete</h3>
    <input type="submit" class="button" name="accdelete" value="Delete">
    </div> -->
    <?php
    $passtoiframe = $_GET['user'];
    ?>
<label for="trigger">Delete account</label>
<input id="trigger" type="checkbox">
<div class="box">
    <h3>Skriv ditt lösenord och tryck DELETE</h3>
        <?php echo "
        <iframe name='foo' style='display:none;'></iframe>
            <form action='iframehack.php' method='post' target='foo'>
            <input type='text' name='delpw'>
            <input type='submit' value='Delete'>
            <input type='hidden' name='accdeletion' value=" .$passtoiframe .">            
        </form>"
    ?>

    <!-- <form method="post" action="< ?php echo $_SERVER['PHP_SELF'];?>">
        <input type="hidden" name="< ?php echo $current; ?>">
        <input type="text" name="deletepw">
        <input type="submit" name="submit" value="DELETE"><br>
    </form>  -->
    <h4>VARNING - Din profilsida tas bort</h4>
</div>


    
   <!-- // Button först -> Ge lösenord
    //  IF lösenord match on submit -> Remove ID tabellz -->
    
    