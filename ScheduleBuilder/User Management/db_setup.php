<?php
    session_start();
    // Database server, username, and password
    if($_SESSION['loggedin'] == 1)
    {
        $db_server = "pluto.cse.msstate.edu:3306/ecn10/";
        $db_username = "ecn10";
        $db_password = "ab1234";
    }
    else
    {
        print("<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"\n");
        print("\"http://www.w3.org/TR/html4/loose.dtd\">\n");
        print("<!-- Login Error -->\n");
        print("<html>\n");
        print("<head> <title> ERROR </title> </head>\n");
        print("<body>\n");
        print("You must be logged in the view this page!<br />");
        print("<a href=\"login.html\">Login</a>\n");
        print("</body>\n");
        print("</html>");
    }
?>
