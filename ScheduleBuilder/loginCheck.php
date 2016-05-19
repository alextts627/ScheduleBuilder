<?php
    include("utilityFunctions.php");
    session_start();
    if(($_REQUEST["username"] == "test") and ($_REQUEST["password"] == "password")) {
        $_SESSION["loggedIn"] = True;
        header("Location: home.php");
    } else {
        header("Location: login.php");
    }
?>
