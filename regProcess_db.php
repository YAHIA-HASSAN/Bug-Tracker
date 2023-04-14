<?php

$error_fields = array();
if($_SERVER['REQUEST_METHOD']=='POST'){
    if (!(isset($_POST['name'])) || empty($_POST['name'])) {
        $error_fields[] = "name";
    }
    if (!(isset($_POST['jobTitle'])) || empty($_POST['jobTitle'])) {
        $error_fields[] = "jobTitle";
    }
    if (!(isset($_POST['username'])) || empty($_POST['username'])) {
        $error_fields[] = "username";
    }
    if (!(isset($_POST['password'])) || empty($_POST['password'])) {
        $error_fields[] = "password";
    }
   if ($error_fields) {
        header("Location: register.php?error_fields=".implode(",",$error_fields));
        exit;
    }

      //connect to DB
      $conn = mysqli_connect("localhost", "root", "", "bug_tracker");
      if (!$conn) {
          echo mysqli_connect_error();
          exit;
      }
      //Escape any special characters to avoid sql injection
      $name = mysqli_escape_string($conn, $_POST['name']);
      $jobtitl = mysqli_escape_string($conn, $_POST['jobTitle']);
      $username = mysqli_escape_string($conn, $_POST['username']);
      $password = sha1($_POST['password']);
      //Insert the data
      $query = "insert into bug_tracker.usrs (usr_name, job_title, usr_username, usr_pass) values('" . $name . "', '" . $jobtitl . "', '" . $username . "','" . $password . "');";
      if (mysqli_query($conn, $query)) {
          mysqli_close($conn);
          header("Location: index.php");
          exit;
      } else {
          echo mysqli_error($conn);
      }
      mysqli_close($conn);
}

?>
