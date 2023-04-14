<?php
    $error_arr=array();
    if(isset($_GET['error_fields'])){
        $error_arr=explode(",",$_GET['error_fields']);
    }
?>
<html>
<header>
    <title>Bug Tracker - Login</title>
    <link rel="stylesheet" href="style.css">
</header>

<body>
    <form  class="center" method="POST" action="loginprocess_db.php">
        <table>
            <tbody>
                <tr>
                    <th><label name="username" id="username">Username</label></th>
                    <th><input type="text" name="username" id="username"></th>
                    <?php
                    if (in_array("username", $error_arr)) {
                        echo "<th>*Invalid username</th>";
                    }
                    ?>
                </tr>
                <tr>
                    <th><label name="password" id="password">Password</label></th>
                    <th><input type="password" name="password" id="password"></th>
                    <?php
                   if (in_array("password", $error_arr)) {
                        echo "<th>*Invalid password</th>";
                    }
                    ?>
                </tr>
               
            </tbody>
            <tfoot>
                <tr>
                <td colspan="2"><input type="submit" name="submit" id="submit" value="Login"></td>
                </tr>
                <tr>
                <td colspan="2">
                    <input type="button" onclick="location.href='register.php'" id="register" value="Register" >
                </td>
                </tr>
            </tfoot>
        </table>
    </form>

</body>

</html>
