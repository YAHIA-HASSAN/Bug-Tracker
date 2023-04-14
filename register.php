<?php
    $error_arr=array();
    if(isset($_GET['error_fields'])){
        $error_arr=explode(",",$_GET['error_fields']);
    }
  
?>
<html>
<header>
    <title>Bug Tracker - Registeration</title>
    <link rel="stylesheet" href="style.css">
</header>

<body>
    <form class="center" method="post" action="regProcess_db.php">
        <table>
            <tbody>
                <tr >
                    <th><label name="name" id="name">Name</label></th>
                    <th><input type="text" name="name" id="name">
                    <?php
                    if (in_array("name", $error_arr)) {
                        echo "<th>* Please enter your name</th>";
                    }
                    ?>
                    </th>
                </tr>
                <tr>
                    <th><label name="jobTitle" id="jobTitle">Job title</label></th>
                    <th><input type="text" name="jobTitle" id="jobTitle">
                    <?php
                    if (in_array("jobTitle", $error_arr)) {
                        echo "<th>* Please enter your job title</th>";
                    }
                    ?>
                    </th>
                </tr>
                <tr>
                    <th><label name="username" id="username">Username</label></th>
                    <th><input type="text" name="username" id="username">
                    <?php
                    if (in_array("username", $error_arr)) {
                        echo "<th>* Please enter your username</th>";
                    }
                    ?>
                    </th>
                </tr>
                <tr>
                    <th><label name="password" id="password">Password</label></th>
                    <th><input type="password" name="password" id="password">
                    <?php
                    if (in_array("password", $error_arr)) {
                        echo "<th>* Please enter your password</th>";
                    }
                    ?>
                    </th>
                </tr>

            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2"><input type="submit" name="submit" id="submit" value="submit"></td>
                </tr>
            </tfoot>
        </table>
    </form>

</body>

</html>