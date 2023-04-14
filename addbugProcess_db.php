<?php
$user_id = intval($_GET['userid']);
$error_fields = array();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!(isset($_POST['bugTitle'])) || empty($_POST['bugTitle'])) {
        $error_fields[] = "bugTitle";
    }
    if (!(isset($_POST['bugType'])) || empty($_POST['bugType'])) {
        $error_fields[] = "bugType";
    }
    if (!(isset($_POST['Priority'])) || empty($_POST['Priority'])) {
        $error_fields[] = "Priority";
    }
    if (!(isset($_POST['Status'])) || empty($_POST['Status'])) {
        $error_fields[] = "Status";
    }

    if ($error_fields) {
        header("Location: addBug.php?error_fields=" . implode(",", $error_fields) . "&userid=$user_id");
        exit;
    }

    //connect to DB
    $conn = mysqli_connect("localhost", "root", "", "bug_tracker");
    if (!$conn) {
        echo mysqli_connect_error();
        exit;
    }
    //Escape any special characters to avoid sql injection
    $bugTitle = mysqli_escape_string($conn, $_POST['bugTitle']);
    $bugType = mysqli_escape_string($conn, $_POST['bugType']);
    $Priority = intval($_POST['Priority']);
    $Status = mysqli_escape_string($conn, $_POST['Status']);
    $bugDescription = '';
    if (isset($_POST['bugDescription'])) {
        $bugDescription = $_POST['bugDescription'];
    }

    $query = "insert into bug_tracker.bugs (usr_add_id,bug_title,bug_type,Priorty,bug_description,status) values(" . $user_id . ",'" . $bugTitle . "','" . $bugType . "'," . $Priority . ",'" . $bugDescription . "','" . $Status . "')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        header("Location: listBugs.php?userid=" . $user_id);
    } else {
        $error_fields[] = "bugTitle";
        $error_fields[] = "bugType";
        $error_fields[] = "Priority";
        $error_fields[] = "Status";
        $bugDescription = $_POST['bugDescription'];
        mysqli_close($conn);
        header("Location: addBug.php?error_fields=" . implode(",", $error_fields));
        exit;
    }
    mysqli_close($conn);
}