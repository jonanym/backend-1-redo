<div>
    <input type="submit" class="button" name="accdelete" value="Delete">
</div>

<?php    
    if(isset($_POST['accdelete'])){
        echo "Shit just got real!";
    } else {
        print("<p>Alles gut</p>");
    }
    //  Button först -> Ge lösenord
    //  IF lösenord match on submit -> Remove ID tabellz