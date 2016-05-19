<?php
session_start();
    $_SESSION['userMod'];
    $_SESSION['update'] = 1;
    
    print("<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"\n");
    print("\"http://www.w3.org/TR/html4/loose.dtd\">\n\n");

if ($_SESSION['loggedin'] == 1)
{
    print("<!-- View Users -->\n");
    print("<html>\n");
    print("<head> <title> View Users </title> </head>\n");
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
    print("<td style=\"padding-left: 5px; padding-right: 5px\"><a href=\"userHome.php\">Home</a></td>\n");
    print("<td style=\"padding-left: 5px; padding-right: 5px\"><a href=\"createSchedule.html\">Create Schedule</a></td>\n");
    print("<td style=\"padding-left: 5px; padding-right: 5px\"><a href=\"modifyCatolog.html\">Modify Course Catalog</a></td>\n");
    print("<td style=\"padding-left: 5px; padding-right: 5px\"><a style=\"cursor: default\">Modify Teacher</a></td>\n");
    print("<td style=\"padding-left: 5px; padding-right: 5px\"><a href=\"viewSchedule.html\">View Schedule</a></td>\n");
    print("<td style=\"padding-left: 5px; padding-right: 5px\"><a href=\"logout.php\">Logout</a></td>\n");
    print("</tr>\n");
    print("</table><br />\n");
    
    require_once('db_setup.php');
    $con = mysql_connect($db_server, $db_username, $db_password);if (!$con)
    {
        die('Could not connect: ' . mysql_error());
    }
    mysql_select_db($db_username, $con);
    $find = mysql_query("SELECT * FROM User");
    print("<form method = \"post\" action = \"modifyTeacher.php\">\n<table align=\"center\">\n<tr>\n<td align=\"center\">\n");
    print("<a href=\"regForm.php\"><input type=\"button\" name=\"add\" value=\"Add User\"></a></td>");
    print("\n<td align=\"center\">\n");
    print("<select name=\"user\">\n");
    while($row = mysql_fetch_array($find))
    {
        print("<option>");
        print($row['username']);
        print("</option>");
    }
    print("</select>\n</td>\n<td align=\"center\">\n<input type=\"submit\" value=\"Modify\">\n</td>\n</tr>\n</table>\n</form>");
    if ($row['administrator'])
        $_SESSION['modAdmin'] = 1;
    mysql_close($con);    
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