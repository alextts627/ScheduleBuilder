<?php
    session_start();
    print("<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"\n");
    print("\"http://www.w3.org/TR/html4/loose.dtd\">\n\n");

    if ($_SESSION['loggedin'] == 1)
    {
        include ("datainterface.php");
        class User
        {
            var $nameF;
            var $nameL;
            var $userName;
            var $password;
            var $admin;

            public function _construct()
            {

            }

            public function _destruct()
            {

            }

            public function _setFirstName($name)
            {
                $this->nameF = $name;
            }

            public function _getFirstName()
            {
                return $this->nameF;
            }

            public function _setLastName($name)
            {
                $this->nameL = $name;
            }

            public function _getLastName()
            {
                return $this->nameL;
            }

            public function _setUserName($name)
            {
                $this->userName = $name;
            }

            public function _getUserName()
            {
                return $this->userName;
            }

            public function _setPassword($pass)
            {
                $this->password = $pass;
            }

            public function _setAdmin($ad)
            {
                $this->admin = $ad;
            }

            public function _getAdmin()
            {
                return $this->admin;
            }

            public function _putUser()
            {
                $db = new dataInt();
                if (!$_SESSION['remove'])
                    $return = $db->addUser($this);
                else
                    $return = $db->removeUser($this);
                if ($return)
                {
                    $this->_success();
                }
                else 
                {
                    $this->_fail();
                }
            }
            public function _success()
            {
               if ($_SESSION['update'])
                   print("<!-- Update Successful -->\n");
               else if ($_SESSION['remove'])
                   print("<!-- Deletion Successful -->\n");
               else
                   print("<!-- Registration Successful -->\n");
               print("<html>\n");
               print("<head> <title> Sucess </title> </head>\n");
               print("<body>\n");
               print("<table>");
               print("<tr align=\"left\">");
               print("<td>");
               if ($_SESSION['update'])
                   print("The user has been updated successfully.");
               else if ($_SESSION['remove'])
                   print("The user has been successfully deleted.");
               else
                   print("The user has been registered successfully.");
               print("</td>");
               print("</tr>");
               print("<tr align=\"left\">");
               print("<td>");
               print("Press Continue to return.<br>");
               print("</td>");
               print("</tr>");
               print("<tr align\"left\">");
               print("<td>");
             
               if ($_SESSION['update'])
               {
                   print("<a href=\"");
                   if($_SESSION['administrator'])
                       print("userMod.php");
                   else
                       print("userHome.php");
                   print("\"><input type=\"button\" name=\"return\" value=\"Continue\"></a>");
               }
               else if ($_SESSION['adminAdd'])
                   print("<a href=\"userMod.php\"><input type=\"button\" name=\"return\" value=\"Continue\"></a>");
               else if (!$_SESSION['remove'])
                   print("<a href=\"login.html\"><input type=\"button\" name=\"return\" value=\"Continue\"></a>");
               print("</p>");
               print("</body>\n");
               print("</html>\n");
               unset($_SESSION['update']);
               unset($_SESSION['remove']);
               unset($_SESSION['verify']);
               unset($_SESSION['userMod']);
               unset($_SESSION['adminAdd']);
            }

            public function _fail()
            {
               if ($_SESSION['update'])
                   print("<!-- Update Failed -->\n");
               else if ($_SESSION['remove'])
                   print("<!-- Deletion Failed -->\n");
               else
                   print("<!-- Registration Failed -->\n");
               print("<html>\n");
               print("<head> <title> Failure </title> </head>\n");
               print("<body>\n");
               print("<table>");
               print("<tr align=\"left\">");
               print("<td>");
               if ($_SESSION['update'])
                   print("Updating the user FAILED.");
               else if ($_SESSION['remove'])
                   print("Deleting the user FAILED.");
               else
                   print("Registering the user FAILED.");
               print("</td>");
               print("</tr>");
               print("<tr align=\"left\">");
               print("<td>");
               print("Press Continue to return.<br>");
               print("</td>");
               print("</tr>");
               print("<tr align\"left\">");
               print("<td>");
             
               if ($_SESSION['update'])
               {
                   print("<a href=\"");
                   if($_SESSION['administrator'])
                       print("userMod.php");
                   else
                       print("userHome.php");
                   print("\"><input type=\"button\" name=\"return\" value=\"Continue\"></a>");
               }
               else if ($_SESSION['adminAdd'])
                   print("<a href=\"userMod.php\"><input type=\"button\" name=\"return\" value=\"Continue\"></a>");
               else if (!$_SESSION['remove'])
                   print("<a href=\"login.html\"><input type=\"button\" name=\"return\" value=\"Continue\"></a>");
               print("</p>");
               print("</body>\n");
               print("</html>\n");
               unset($_SESSION['update']);
               unset($_SESSION['remove']);
               unset($_SESSION['verify']);
               unset($_SESSION['userMod']);
               unset($_SESSION['adminAdd']);
            }
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
    print("</html");
?>

