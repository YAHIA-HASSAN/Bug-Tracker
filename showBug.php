<?php
$conn = mysqli_connect("localhost", "root", "", "bug_tracker");
if (!$conn) {
    echo mysqli_connect_error();
    exit;
}
$bug_id = $_GET['bugid'];
$user_id=$_GET['userid'];
$query = "select * from bugs where bugs.bug_id = $bug_id ";
$result = mysqli_fetch_assoc(mysqli_query($conn, $query));

?>

<HTML>

    <head>
        <title>
            Show Bug
        </title>
        <link rel="stylesheet" href="style.css">

        <div class="headMenue">
        <a href="listBugs.php?userid=<?php echo $user_id; ?>" class="headItem">Show All Bugs</a>
        <a href="addBug.php?userid=<?php echo $user_id; ?>" class="headItem">Add New Bug</a>
        <a href="index.php" class="headItem" style="right: 0;position: fixed;">Log out</a>
    </div>

    </head>

    <body>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th><?php echo $result['bug_id'];?></th>
                </tr>
                <tr>
                    <th>User Added</th>
                    <th><?php
                    $user_name=mysqli_fetch_assoc(mysqli_query($conn, 'select usr_name from usrs where usr_id='.$result['usr_add_id']));
                    echo ($user_name['usr_name']);?></th>
                </tr>
                <tr>
                    <th>Bug Title</th>
                    <th><?php echo $result['bug_title'];?></th>
                </tr>
                <tr>
                    <th>Bug Description</th>
                    <th><?php echo $result['bug_description'];?></th>
                </tr>
                <tr>
                    <th>Priority</th>
                    <th><?php echo $result['Priorty'];?></th>
                </tr>
                <tr>
                    <th>Status</th>
                    <th><?php echo $result['status'];?></th>
                </tr>
            </thead>
            <tfoot>
            <td class="listCol" style="  background-color:  rgb(111, 60, 111);color: #E1D4C5 ;">
                <a href="editBug.php?bugid=<?php echo $bug_id;?>&userid=<?php echo $user_id;?>">Edite Bug</a>
            </td>
        </tfoot>
        </table>
        
        <?php
            mysqli_close($conn);
        ?>
    </body>

</HTML>