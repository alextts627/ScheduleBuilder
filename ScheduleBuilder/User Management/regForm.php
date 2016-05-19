<?php
    session_start();
    print("<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"\n");
    print("\"http://www.w3.org/TR/html4/loose.dtd\">\n");

    print("<!-- User Registration -->\n");
    print("<html>\n");
    print("<head> <title> Register </title> </head>\n");
    print("<body>\n");
    print("<form method = \"post\" action = \"register.php\"> \n");
    print("<table width=\"100%\">\n");
    print("<tr>\n");
    print("<td align=\"center\"><a href=\"");
    if ($_SESSION['loggedin'])
        print("userHome.php");
    else 
        print("login.html");
    print("\"><img src=\"img/Banner.jpg\" alt=\"Banner\"></a></td>\n");
    print("</tr>\n");
    print("</table>\n");
    print("<h1> Register New User </h1>\n");
    print("<table>\n");
    print("<tr>\n");
    print("<td>First Name:</td><td><input type = \"text\" name = \"nameF\" size = \"40\" /></td>\n");
    print("</tr>\n");
    print("<tr>\n");
    print("<td>Last Name:</td><td><input type = \"text\" name = \"nameL\" size = \"40\" maxlength = \"15\" /></td>\n");
    print("</tr>\n");
    print("<tr>\n");
    print("<td>Username:</td><td><input type = \"text\" name = \"nameU\" size = \"40\" /></td>\n");
    print("</tr>\n");
    print("<tr>\n");
    print("<td>Password:</td><td><input type = \"password\" name = \"password\" size = \"40\" maxlength = \"15\" /></td>\n");
    print("</tr>\n");
    print("<tr>\n");
    print("<td>Password:</td><td><input type = \"password\" name = \"password2\" size = \"40\" maxlength = \"15\" /></td>\n");
    print("</tr>\n");
    print("</table>\n");
    print("<p>\n");
    if ($_SESSION['administrator'])
    {
        Print("<input type=\"checkbox\" name=\"admin\">Administrator<br><br>");
    }
    else
        session_destroy ();
    print("<button type=\"submit\" value=\"Submit\"><img src=\"img/accept.png\" alt=\"Submit\">Submit</button>\n");
    print("<input type = \"reset\" value = \"Reset\" />\n");
    print("<INPUT TYPE=\"button\" VALUE=\"<< Back\" onClick=\"history.go(-1);return true;\">\n");
    print("</p>\n");
    print("</form>\n");
    print("</body>\n");
    print("</html>\n");

?>
