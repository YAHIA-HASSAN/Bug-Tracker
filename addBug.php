<?php
    $error_arr=array();
    if(isset($_GET['error_fields'])){
        $error_arr=explode(",",$_GET['error_fields']);
    }
    $user_id = $_GET['userid'];
?>
<HTML>

<head>
    <title>
        Add Bug
    </title>
    <link rel="stylesheet" href="style.css">

    <div class="headMenue">
        <a href="listBugs.php?userid=<?php echo $user_id; ?>" class="headItem">Show All Bugs</a>
        <a href="addBug.php?userid=<?php echo $user_id; ?>" class="headItem">Add New Bug</a>
        <a href="index.php" class="headItem" style="right: 0;position: fixed;">Log out</a>
    </div>
</head>

<body>
    <form class="center" method="post" action="addbugProcess_db.php?userid=<?php echo $user_id; ?>">
        <table>
            <tbody>
                <tr>
                    <th>Bug Title</th>
                    <th><input type="text" name="bugTitle" id="bugtitle" ></th>
                    <?php
                    if (in_array("bugTitle", $error_arr)) {
                        echo "<th>*Invalid data</th>";
                    }
                    ?>
                </tr>
                <tr>
                    <th>Bug Type</th>
                    <th><input type="text" name="bugType" id="bugType" ></th>
                    <?php
                    if (in_array("bugType", $error_arr)) {
                        echo "<th>*Invalid data</th>";
                    }
                    ?>
                </tr>
                <tr>
                    <th>Bug Description</th>
                    <th><input type="text" name="bugDescription" id="bugDescription"></th>
                    <?php
                    if (in_array("bugDescription", $error_arr)) {
                        echo "<th>*Invalid data</th>";
                    }
                    ?>
                </tr>
                <tr>
                    <th>Priority</th>
                    <th><input list="Priority" name="Priority" >
                        <datalist id="Priority">
                            <option value="1">
                            <option value="2">
                            <option value="3">
                            <option value="4">
                            <option value="5">
                        </datalist>
                    </th>
                    <?php
                    if (in_array("Priority", $error_arr)) {
                        echo "<th>*Invalid data</th>";
                    }
                    ?>
                </tr>
                <tr>
                    <th>Status</th>
                    <th><input type="text" name="Status" id="Status" value="<?= isset($bugdata['status'])?$bugdata['status']:'' ?>"></th>
                    <?php
                    if (in_array("Status", $error_arr)) {
                        echo "<th>*Invalid data</th>";
                    }
                    ?>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2"><input type="submit" name="submit" id="submit" value="submit"></td>
                </tr>
            </tfoot>
        </table>
    </form>
    <?php
    mysqli_close($conn);
    ?>

</body>

</HTML>