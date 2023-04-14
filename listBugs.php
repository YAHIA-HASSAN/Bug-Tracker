<?php
$conn = mysqli_connect("localhost", "root", "", "bug_tracker");
if (!$conn) {
    echo mysqli_connect_error();
    exit;
}
$user_id = $_GET['userid'];
$query = "select bugs.bug_id,bugs.bug_title from bugs where bugs.bug_id = any (SELECT bugs.bug_id from usrs_working_on_bugs WHERE usr_id =$user_id );";
$result = mysqli_query($conn, $query);
?>
<HTML>

<head>
    <title>
        Show All Bugs
    </title>
    <link rel="stylesheet" href="style.css">

    <div class="headMenue">
        <a href="listBugs.php?userid=<?php echo $user_id; ?>" class="headItem">Show All Bugs</a>
        <a href="addBug.php?userid=<?php echo $user_id; ?>" class="headItem">Add New Bug</a>
        <a href="index.php" class="headItem" style="right: 0;position: fixed;">Log out</a>
    </div>

</head>

<body>

    <br>
    <table class="listBugs">
        <thead>
            <tr>
                <th>
                    ID
                </th>
                <th colspan="3">
                    Bug Title
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <td class="listCol">
                        <?= $row['bug_id'] ?>
                    </td>
                    <td colspan="3" class="listCol">
                        <?= $row['bug_title'] ?>
                    </td>
                    <td class="listCol" style="padding: 0; border: 0;">
                        <input type="button" onclick="location.href='showBug.php?userid=<?= $user_id ?>&bugid=<?= $row['bug_id'] ?>'" id="showBug" value="Show Bug">
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>
</HTML>

<?php
    mysqli_free_result($result);
    mysqli_close($conn);
?>
