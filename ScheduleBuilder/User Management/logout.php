<?php
    session_start();
    if ($_SESSION['loggedin'])
    {
        session_destroy();
        Print("<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"\n");
        Print("\"http://www.w3.org/TR/html4/loose.dtd\">\n\n");
        Print("<html>\n");
        Print("<head>\n");
        Print("<title>Logout</title>\n");
        Print("</head>\n");
        Print("<body>\n");
        Print("You have been successfully logged out.<br><br>\n");
        Print("<a href=\"login.html\"><input type=\"button\" value=\"OK\"\></a>\n");
        Print("</body>");
        Print("</html>");
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
