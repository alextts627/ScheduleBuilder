<?php
    session_start();
    $_SESSION['update'] = 1;
    
    print("<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"\n");
    print("\"http://www.w3.org/TR/html4/loose.dtd\">\n\n");

    if ($_SESSION['loggedin'] == 1)
    {
        require_once('db_setup.php');
        $con = mysql_connect($db_server, $db_username, $db_password);if (!$con)
        {
            die('Could not connect: ' . mysql_error());
        }

        mysql_select_db($db_username, $con);

        // Make a safe SQL
        if ($_SESSION['administrator'])
            $_SESSION['userMod'] = $_POST['user'];
    
        $userName = mysql_real_escape_string($_SESSION['userMod']);
        $result = mysql_query("SELECT * FROM User WHERE username=('$userName')");
        $row = mysql_fetch_array($result);

        if (!$row) 
        {
            echo 'User was not found.<br>';
            echo 'Please <a href = "userHome.php">try again</a>...';
        }
        else
        {
            print("<!-- Modify Teacher -->\n");
            print("<html>\n");
            print("<head> <title> Modify Teacher </title>\n");
            print("<script language=\"javascript\" type=\"text/javascript\">\n");
            print("<!--\n");
            print("function popitup(url) {\n");
            print("newwindow=window.open(url,'name','height=200,width=400');\n");
            print("if (window.focus) {newwindow.focus()}\n");
            print("return false;\n");
            print("}\n");
            print("// -->\n");
            print("</script>\n");
            print("</head>\n");
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
            if ($_SESSION['administrator'])
            {
                print("<td style=\"padding-left: 5px; padding-right: 5px\"><a href=\"createSchedule.html\">Create Schedule</a></td>\n");
                print("<td style=\"padding-left: 5px; padding-right: 5px\"><a href=\"modifyCatolog.html\">Modify Course Catalog</a></td>\n");
            }
            print("<td style=\"padding-left: 5px; padding-right: 5px\"><a style: cursor=\"default\">Modify Teacher</a></td>\n");
            if ($_SESSION['administrator'])
                print("<td style=\"padding-left: 5px; padding-right: 5px\"><a href=\"viewSchedule.html\">View Schedule</a></td>\n");
            print("<td style=\"padding-left: 5px; padding-right: 5px\"><a href=\"logout.php\">Logout</a></td>\n");
            print("</tr>\n");
            print("</table>\n");
            print("<form method = \"post\" action = \"updateUser.php\">\n"); 
            print("<h1> Modify User </h1>\n");
            print("<table border=\"10\">\n");
            print("<tr>\n");
            print("<td>First Name:</td><td><input type = \"text\" name = \"nameF\" value=\"");
            print($row['firstname']);
            print("\" size = \"40\" /></td>\n");
            print("</tr>\n");
            print("<tr>\n");
            print("<td>Last Name:</td><td><input type = \"text\" name = \"nameL\" value=\"");
            print($row['lastname']);
            print("\" size = \"40\" maxlength = \"15\" /></td>\n");
            print("</tr>\n");
            print("<tr>\n");
            Print("<td>Password:</td><td><input type = \"password\" name = \"password\" size = \"40\" maxlength = \"15\" /></td>\n");
            Print("</tr>\n");
            print("<tr>\n");
            Print("<td>Password:</td><td><input type = \"password\" name = \"password2\" size = \"40\" maxlength = \"15\" /></td>\n");
            Print("</tr>\n");
            Print("</table>\n");
            Print("<p>\n");
 
            if ($_SESSION['administrator'])
            {
                Print("<input type=\"checkbox\" name=\"admin\"");
            
                if ($row['administrator'])
                    print("checked");
          
                print(">Administrator<br /><br />");
            }
            Print("<input type = \"submit\" value = \"Submit\"/>\n");
            Print("<input type = \"reset\" value = \"Reset\" />\n");
            print("<INPUT TYPE=\"button\" VALUE=\"<< Back\" onClick=\"history.go(-1);return true;\">\n");
            Print("</p>\n");
            Print("</form>\n");
            if ($_SESSION['administrator'])
            {
                print("<a href=\"userHome.php\" onclick=\"return popitup('verifyPass.php')\">");
                Print("<input type=\"button\" value=\"Delete User\"></a>");
            }
        }
 
        mysql_close($con);
        print("</body>\n");
        print("</html>");
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
?>
