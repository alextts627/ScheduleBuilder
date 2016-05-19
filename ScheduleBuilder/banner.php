<table>
    <tr>
        <td><a href="home.php"><img src="img/Banner.jpg" /></a></td>
        <td valign="bottom">

        <?php
            if (logged_in()){
                ?><a href="logout.php">(Log out)</a><?php
            }
            else {
                ?><a href="login.php">(Log in)</a><?php
            }
        ?>
        </td>
    </tr>
</table>
    
