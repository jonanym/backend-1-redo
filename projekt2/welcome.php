<p>Logga in dig för att unleasha the full power of KISS KISS BANG BANG!</p>
    <a href="index.php?stage=signin"><input type="button" value="logga in"></a>
    <a href="index.php?stage=signup"><input type="button" value="registrera dig" id="registbut"></a><br><br><br>
    
    <?php 
    // Register click INCLUDE register formulär i php
    if (isset($_REQUEST['stage']) && ($_REQUEST['stage'] == 'signup')) {
        include "register.php";
    }
    // Login click INCLUDE register formulär i php
    else if (isset($_REQUEST['stage']) && ($_REQUEST['stage'] == 'signin')) {
        header('Location: ./login.php');
    }
