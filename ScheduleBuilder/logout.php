<?php
    include("utilityFunctions.php");
    session_start();
    verify_user();
    $_SESSION["loggedIn"] = False;
    header("Location: login.php");
?>
