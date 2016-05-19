<?php
    session_start();
    if (!$_SESSION['loggedin'])
            $_SESSION['loggedin'] = 1;
    include("user.php");
    $_SESSION['update'];
    if($_SESSION['update'])
        $_SESSION['adminAdd'] = 1;
    $_SESSION['update'] = 0;
    Print("<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"\n");
    Print("\"http://www.w3.org/TR/html4/loose.dtd\">\n\n");
    Print("<html>\n");
    Print("<head>\n");
    Print("<title>Register</title>\n");
    Print("</head>\n");
    Print("<body>\n");
       
    $fN = $_POST["nameF"];
    $lN = $_POST["nameL"];
    $uN = $_POST["nameU"];
    $pass = $_POST["password"];
    $pass2 = $_POST['password2'];
    $admin;
    if($_SESSION['administrator'])
        $admin = $_POST['admin'];
    else
        $admin = false;
    
    if ($fN == "" || $lN == "" || $uN == "" || $pass =="" || $fN == null || $lN == null || $uN == null || $pass == null)
    {
        print ("    <p>");
        print ("      All fields are required. Please <a href = \"regForm.php\">try</a> again!");
        print ("    </p>");
    }
    else if ($pass != $pass2)
    {
        print ("    <p>");
        print ("      ERROR! Passwords DO NOT match.<br />\nPlease <a href = \"regForm.php\">try</a> again!");
        print ("    </p>");
    }
    else
    {
        $pass = md5($pass);
        $user = new User();
        $user->_setFirstName($fN);
        $user->_setLastName($lN);
        $user->_setUserName($uN);
        $user->_setPassword($pass);
        $user->_setAdmin($admin);
        $user->_putUser();
    }
    print("</body>\n");
    print("</html>");
?>
    