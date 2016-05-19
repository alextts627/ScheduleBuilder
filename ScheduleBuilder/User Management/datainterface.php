<?php
    session_start();
    if ($_SESSION['loggedin'] == 1)
    {
        class dataInt
        {
            var $db_handle;

            function genRandomString() 
            {
                $length = 32;
                $characters = "0123456789abcdefghijklmnopqrstuvwxyz";

                for ($p = 0; $p < $length; $p++) 
                {
                        $string .= $characters[mt_rand(0, strlen($characters))];
                }

                return $string;
            }

            function myConnect()
            {
                $user_name = "ecn10";
                $password = "ab1234";
                $database = "ecn10";
                $server = "pluto.cse.msstate.edu:3306/ecn10/";
                $db_handle = mysql_connect($server, $user_name, $password)
                or die("Error Connecting to the Database");
                $db_found = mysql_select_db($database, $db_handle)
                or die("Database Not Found");

                //echo("Connected<br/>");

                //mysql_close($db_handle);

            }

            function addSong($user)
            {
                myConnect();
                $return = FALSE;
                $path = mysql_real_escape_string($song->filePath);
                $ID = mysql_real_escape_string($song->id);
                $title = mysql_real_escape_string($song->title);
                $uploader = mysql_real_escape_string($song->uploader);
                $date = mysql_real_escape_string($song->dateflagged);
                $query = "INSERT INTO Song (filepath, uploader, title, flagged) VALUES ('$path', '$uploader', '$title', '$date');";
                $result = mysql_query($query);
                $return = TRUE;		
                mysql_close($db_handle);
                return $return;
            }

            function getSong($id){}

            function getUserUpList($username){}

            function addComment($comment, $song, $username){}

            function setSongFlag($id){}

            function setCommentFlag($comment){}

            function uncomment($id){}

            function addUser($newUser)
            {
                $this->myConnect();
                $return = FALSE;
                $nameSearch = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM User WHERE username = '$newUser->userName'"));
                //echo($nameSearch[0]);
                if($nameSearch[0] != 0 && !$_SESSION['update'])
                {
                    echo("Username Taken");
                }
                else
                {
                    $firstName = mysql_real_escape_string($newUser->nameF);
                    $lastName = mysql_real_escape_string($newUser->nameL);
                    $username = mysql_real_escape_string($newUser->userName);
                    $password = ($newUser->password);
                    if ($newUser->admin)
                        $administrator = 1;
                    else
                        $administrator = 0;
                    
                    if (!$_SESSION['update'] || $_SESSION['adminAdd'])
                    {   
                        $query = "INSERT INTO User (username, password, firstname, lastname, administrator) VALUES ('$username','$password','$firstName','$lastName','$administrator')";
                        $result = mysql_query($query);
                        if (!$_SESSION['adminAdd'])
                            session_destroy();
                    }
                    else
                    {
                        $result = true;
                        $query ="SELECT * FROM User WHERE username = '$newUser->userName'";
                        $find = mysql_query($query) or die(mysql_error()); 
                        // Print out the contents of each row separated by commas 
                        $row = mysql_fetch_array($find);
                        if ($row['firstname'] != $firstName)
                        {
                            $result = false;
                            $query = "UPDATE User SET firstname = '$firstName' WHERE username = '$username'";
                            $result = mysql_query($query);
                            if (!$result)
                                return $result;
                        }

                        if ($row['lastname'] != $lastName)
                        {
                            $result = false;
                            $query = "UPDATE User SET lastname = '$lastName' WHERE username = '$username'";
                            $result = mysql_query($query);
                            if (!$result)
                                return $result;
                        }

                        if ($password)
                        {
                            $result = false;
                            $query = "UPDATE User SET password = '$password' WHERE username = '$username'";
                            $result = mysql_query($query);
                        }

                        if ($administrator != $row['administrator'])
                        {   
                            $result = false;
                            if ($administrator)
                                $query = "UPDATE User SET administrator = '1' WHERE username = '$username'";
                            else
                                $query = "UPDATE User SET administrator = '0' WHERE username = '$username'";
                            $result = mysql_query($query);
                            if($result && ($_SESSION['username'] == $_SESSION['userMod']))
                            {
                                if ($_SESSION['administrator'] && !$administrator)
                                    $_SESSION['administrator'] = 0;
                            }
                        }
                    }

                }
                mysql_close();
                return $result;
            }
            
            function removeUser($newUser)
            {
                $_SESSION['update'] = 0;
                $this->myConnect();
                $return = FALSE;
                $nameSearch = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM User WHERE username = '$newUser->userName'"));
                //echo($nameSearch[0]);
                if(!$nameSearch[0])
                {
                    echo("User not found");
                }
                else
                {
                    $username = mysql_real_escape_string($newUser->userName);
                    $query = "DELETE FROM User WHERE username = '$username'";
                    $result = mysql_query($query);

                }
                mysql_close();
                return $result;
            }

            function searchSong($params){}

            function removePrivs($username){}



            //Just to have...
            function myMail($email, $mainurl)
            {
                $header = "World of Randomness Registration";
                $content = "Please user the following link to validate your WoR account. http://www.worldofrandomness.com/validate.php?mainurl=$mainurl  ";
                mail($email, $header, $content);	
            }

            function closeConnect()
            {
                mysql_close($this->db_handle);
            }
        }
    }
    else
    {
        print("<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"\n");
        print("\"http://www.w3.org/TR/html4/loose.dtd\">\n");
        print("<!-- Login Error -->\n");
        print("<html>\n");
        print("<head> <title> ERROR </title> </head>\n");
        print("<body>\n");
        print("You must be logged in the view this page!<br />");
        print("<a href=\"login.html\">Login</a>\n");
        print("</body>\n");
        print("</html>");
    }
 ?>
