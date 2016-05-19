<?php
    session_start();
    
    $_SESSION['verify'] = 1;
    print("<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"\n");
    print("\"http://www.w3.org/TR/html4/loose.dtd\">\n\n");
    
    if ($_SESSION['username'] != $_SESSION['userMod'])
    {
        if($_SESSION['loggedin'] == 1)
        {
            print("<!-- Verify Password -->\n");
            print("<html>\n");
            print("<head> <title> Verify Password </title>");
            print("</head>\n");
            print("<body>\n");
            print("<form method = \"post\" action = \"login.php\">\n"); 
            print("<h1> Verify Password </h1>\n");
            print("<p>\n");
            print("Password: <input type = \"password\" name = \"password\" size = \"40\" maxlength = \"15\" /><br /><br />\n");
            print("<input type = \"submit\" value = \"OK\" />\n");
            print("</p>\n");
            print("</form>\n"); 
        }
        else
        {
            print("<!-- Login Error -->\n");
            print("<html>\n");
            print("<head> <title> ERROR </title> </head>\n");
            print("<body>\n");
            print("You must be logged in the view this page!<br>");
            print("<a href=\"login.html\">Login</a>\n");
        }
    }
    else
    {
        print("<!-- Delete Error -->\n");
        print("<html>\n");
        print("<head> <title> ERROR </title>\n");
        print("<script language=\"javascript\" type=\"text/javascript\">\n");
        print("<!--\n");
        print("function change(){\n");
        print("window.close();\n");
        print("}\n");
        print("// -->\n");
        print("</script>\n");
        print("</head>\n");
        print("<body>\n");
        print("You cannot delete your OWN account! This must be done by another administrator!<br>");
        print( "<input type=\"button\" value=\"Continue\" onclick=\"return change()\">");
    }
    print("</body>\n");
    print("</html>");
?>

