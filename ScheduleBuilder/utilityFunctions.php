<?php

//Returns true if the user is logged in, false if they aren't.
function logged_in(){

    if(isset($_SESSION["loggedIn"]) and ($_SESSION["loggedIn"] == True)) {
        return True;
    } else {
        return False;
    }
}

//Verifies user,  redirects them if they aren't logged in.
function verify_user() {
    if(!logged_in()) {
        header('Location: login.php');
    }
}

?>

