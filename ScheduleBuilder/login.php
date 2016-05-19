<?php 
    include("utilityFunctions.php");
    session_start();
    include("banner.php");
?>
<table width="80%" height="80%">
    <tr>
        <td valign="middle" align="center" style="font-size:1.5em">
        <form action="loginCheck.php" method="post">
            <label>Username:</label>
            <input type="text" name="username" />
        <br/>
            <label>Password:</label>
            <input type="password" name="password" />
        <br/>
        <button type="submit" value="Submit">
            <img src="img/accept.png" />Submit
        </button>
        </form>
        </td>
    </tr>
</table>


