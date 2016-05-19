<?php
    session_start();
    $_SESSION['update'];
    
    Print("<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"\n");
    Print("\"http://www.w3.org/TR/html4/loose.dtd\">\n\n");

    if ($_SESSION['loggedin'] == 1)
    {
        include("user.php");
        print("<!-- Update User -->\n");
        print("<html>\n");
        print("<head> <title> Update User </title> </head>\n");
        print("<body>\n");
        
        $fN = $_POST["nameF"];
        $lN = $_POST["nameL"];
        $pass = $_POST["password"];
        $pass2 = $_POST['password2'];
        $admin = null;
        if ($_SESSION['administrator'])
            $admin = $_POST['admin'];

        if ($fN == "" || $lN == "" || $fN == null || $lN == null)
        {
            print ("    <p>");
            print ("      ERROR! First and last name fields must not be blank.<br>\nPlease <a href = \"modifyTeacher.php\">try</a> again!");
            print ("    </p>");
        }
        else if ($pass != $pass2)
        {
            print ("    <p>");
            print ("      ERROR! Passwords DO NOT match.<br>\nPlease <a href = \"modifyTeacher.php\">try</a> again!");
            print ("    </p>");
        }
        else
        {
            $user = new User();
            $user->_setFirstName($fN);
            $user->_setLastName($lN);
            if ($pass == "" || $pass == null)
                $pass = "";
            else
                $pass = md5($pass);
            $user->_setPassword($pass);
            $_SESSION['update'] = 1;

            $user->_setUserName($_SESSION['userMod']);
            $user->_setAdmin($admin);
            $user->_putUser();
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