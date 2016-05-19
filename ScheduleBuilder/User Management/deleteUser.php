<?php
    session_start();
    print("<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"\n");
    print("\"http://www.w3.org/TR/html4/loose.dtd\">\n\n");

    if($_SESSION['loggedin'] == 1)
    {
        if ($_SESSION['verify'] == 2)
        {
            $_SESSION['remove'] = 1;
            include("user.php");
            $user = new User();
            $user->_setUserName($_SESSION['userMod']);
            $user->_putUser();
            print("<!-- User Deleted -->\n");
            print("<html>\n");
            print("<head> <title> User Deleted </title>\n");
            print("<script language=\"javascript\" type=\"text/javascript\">\n");
            print("<!--\n");
            print("function change(href){\n");
            print("window.opener.location.href='userMod.php';");
            print("window.close();\n");
            print("}\n");
            print("// -->\n");
            print("</script>\n");
            print("<body>\n");
            print( "<input type=\"button\" value=\"Continue\" onclick=\"return change('userHome.php')\">");
        }
    }
    else
    {
        print("<!-- Login Error -->\n");
        print("<html>\n");
        print("<head> <title> ERROR </title> </head>\n");
        print("<body>\n");
        print("You must be logged in the view this page!<br />");
        print("<a href=\"login.html\">Login</a>\n");
    }
    print("</body>\n");
    print("</html>");
?>


