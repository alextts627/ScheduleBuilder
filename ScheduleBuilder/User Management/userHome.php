<?php
    session_start();
    $_SESSION['userMod'];
    
    print("<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"\n");
    print("\"http://www.w3.org/TR/html4/loose.dtd\">\n\n");

if ($_SESSION['loggedin'] == 1)
{
    print("<!-- User Home -->\n");
    print("<html>\n");
    print("<head> <title> Home </title> </head>\n");
    print("<body>\n");
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
    print("<table align=\"center\" border=\"10\">\n");
    print("<tr align=\"center\">\n");
    print("<td style=\"padding-left: 5px; padding-right: 5px\"><a style=\"cursor: default;\">Home</a></td>\n");
    if ($_SESSION['administrator'])
    {
        print("<td style=\"padding-left: 5px; padding-right: 5px\"><a href=\"createSchedule.html\">Create Schedule</a></td>\n");
        print("<td style=\"padding-left: 5px; padding-right: 5px\"><a href=\"modifyCatolog.html\">Modify Course Catalog</a></td>\n");
        print("<td style=\"padding-left: 5px; padding-right: 5px\"><a href=\"userMod.php\">Modify Teacher</a></td>\n");
    }
    else
    {
        print("<td style=\"padding-left: 5px; padding-right: 5px\"><a href=\"modifyTeacher.php\">Modify Teacher</a></td>\n");
        $_SESSION['userMod'] = $_SESSION['username'];
    }
    if ($_SESSION['administrator'])
        print("<td style=\"padding-left: 5px; padding-right: 5px\"><a href=\"viewSchedule.html\">View Schedule</a></td>\n");
    print("<td style=\"padding-left: 5px; padding-right: 5px\"><a href=\"logout.php\">Logout</a></td>\n");
    print("</tr>\n");
    print("</table>\n");
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