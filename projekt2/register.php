<div class="container">
    <h2>Registrerings uppgifter</h2>
    
    <form class="reqform">
        <ul class="registerlist">
            <br>
                <li><label>Användarnamn</label><br><input type="text" name="uninput"/></li>
                <li><label>Namn</label><br><input type="text" name="rninput"/></li><br>
                <li><label>Lösenord</label><br><input type="text" name="pwinput"/></li>
                <li><label>Repetera lösenordet</label><br><input type="text" name="pwrepeat"/></li><br>
                <li><label>Email</label><br><input type="text" name="eminput"/></li>
                <li><label>Postnummer</label><br><input type="text" name="pninput"/></li><br>
                <label>Berätta lite om dig själv</label><br>
                <textarea name="comment" rows="5" cols="40" name=bioinput></textarea><br>
                <li><label>Årslön</label> <input type="text" name="ysinput"/></li><br>
                <li><label>Preferens</label><br>
                <input type="radio" name="maleinput" value="male" id="male"/><label for="male" class="butlabel">Man</label><br>
                <input type="radio" name="femaleinput" value="female" id="female"/><label for="female" class="butlabel">Kvinna</label><br>
                <input type="radio" name="otherinput" value="other" id="other"/><label for="other" class="butlabel">Annan</label><br>
                <input type="radio" name="bothinput" value="bothof" id="bothof"/><label for="bothof" class="butlabel">Båda</label><br>
                <input type="radio" name="allinput" value="allof" id="allof"/><label for="allof" class="butlabel">Alla</label></li><br><br>
                <input type="submit" name="submit" value="Slutför registreringen" id="registerbutton"><br>
            </ul>
    </form>

<?php
// Kolla att man klickat submit!
if (isset($_POST['submit'])){
$prefArr = ['Manlig', 'Kvinnliga', 'Annan', 'Båda', 'Alla'];

if (isset($_REQUEST['usr']) && isset($_REQUEST['psw'])  ) {
    //KOM IHÅG XSS PROTECTION
    $username = test_input($_REQUEST['usr']);
    $password = test_input($_REQUEST['psw']);
    $password = hash("sha256", $password);
    //superhemlis => asd123 - en envägsalgoritm
    $realname = test_input($_POST['rninput']); 
    $email = test_input($_POST['eminput']); 
    $zip = test_input($_POST['pninput']); 
    $bio = test_input($_POST['bioinput']); 
    $salary = test_input($_POST['ysinput']);
    $preference = test_input($_POST['prefinput']);

    // Prepared statements går snabbare att köra och skyddar mot SQL Injection!
    $statement = $conn->prepare("INSERT INTO users (username, realname, password, email, zipcode, bio, salary, preference) VALUES (?,?,?,?,?,?,?,?)");
    $statement->bind_param("ssssisii",$username, $realname, $password, $email, $zip, $bio, $salary, $preference);
    // De flesta metoderna returnerar ett objekt (sant) om de lyckas & false ifall de misslyckas.
    if ($statement->execute()) {
        print("Du har registrerats!");
    }
    else{
        print("error");
    }
      
    // Kom ihåg att error handling
}

}