<?php
    session_start();

    if (!$_SESSION['verify'])
    {
        session_destroy ();
        session_start();
    }
    $_SESSION['username'];
    $_SESSION['password'];
    $_SESSION['loggedin'];
    $_SESSION['administrator'];
    $_SESSION['verify'];

    print("<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"\n");
    print("\"http://www.w3.org/TR/html4/loose.dtd\">\n");

    print("<!-- login.php - Processes the form described in\n");
    print("login.html\n");
    print("-->\n");
    print("<html>\n");
    print("<head>\n");
    print("<title> Login Result </title>\n");
    print("</head>\n");
    print("<body>\n");

        if (!$_SESSION['loggedin'])
            $_SESSION['username'] = $_POST["username"];
        $_SESSION['password'] = ($_POST["password"]);
         
        if ($_SESSION['username'] == "" || $_SESSION['password'] == "" || $_SESSION['username'] == null || $_SESSION['password'] == null)
        {
            if(!$_SESSION['verify'])
                session_destroy();
            print ("    <p>");
            print ("      Please <a href = \"");
            if (!$_SESSION['verify'])
                print("login.html");
            else
                print("verifyPass.php");
            print("\">enter</a> a username and password!");
            print ("    </p>");
        }
        else
        {
            $_SESSION['loggedin'] = 1;
            require_once('db_setup.php');
            if (!$_SESSION['verify'])
                $_SESSION['loggedin'] = 0;
                $con = mysql_connect($db_server, $db_username, $db_password);if (!$con)
                {
                    die('Could not connect: ' . mysql_error());
                }

                mysql_select_db($db_username, $con);
                
                // Make a safe SQL
                $userName = mysql_real_escape_string($_SESSION['username']);
                $passWord = md5($_SESSION['password']);
              
                $result = mysql_query("SELECT * FROM User WHERE username=('$userName') AND password=('$passWord')");
                $row = mysql_fetch_array($result);
                
                if (!$row) 
                {
                    if (!$_SESSION['verify'])
                        session_destroy();
                    echo 'Username and password did not match a registered user.<br />';
                    if (!$_SESSION['verify'])
                        echo 'Please <a href = "login.html">try again</a>...';
                    else
                        echo 'Please <a href = "verifyPass.php">try again</a>...';
                }
                else
                {
                    if ($_SESSION['verify'] == 1)
                        $_SESSION['verify'] = 2;
               
                    $_SESSION['loggedin'] = 1;
                    unset ($_SESSION['password']);
                    echo 'Welcome back ' . $row['firstname'] . '!';
                    if($row['administrator'])
                        $_SESSION['administrator'] = 1;
                    else
                        $_SESSION['administrator'] = 0;
                    if($_SESSION['verify'] == 2)
                        $url = "deleteUser.php";
                    else
                        $url = "userHome.php";
                    header ("Location: $url");
                }

                mysql_close($con);
        }
        print("</body>\n");
        print("</html>");
?>