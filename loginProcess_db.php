<?php

$error_fields = array();
if($_SERVER['REQUEST_METHOD']=='POST'){ 
    if (!(isset($_POST['username'])) || empty($_POST['username'])) {
        $error_fields[] = "username";
    }
    if (!(isset($_POST['password'])) || empty($_POST['password'])) {
        $error_fields[] = "password";
    }
   if ($error_fields) {
        header("Location: index.php?error_fields=".implode(",",$error_fields));
        exit;
    }

      //connect to DB
      $conn = mysqli_connect("localhost", "root", "", "bug_tracker");
      if (!$conn) {
          echo mysqli_connect_error();
          exit;
      }
      //Escape any special characters to avoid sql injection
      $username = mysqli_escape_string($conn, $_POST['username']);
      $password = sha1($_POST['password']);

      //check username and pass
     // echo "select usrs.usr_id,usrs.usr_pass from bug_tracker.usrs where usrs.usr_username = " .$_POST['username'];
      $query = "select usrs.usr_id,usrs.usr_pass from bug_tracker.usrs where usrs.usr_username = '" .$_POST['username']."'";
      $result=mysqli_query($conn, $query);
      if ($result) {
        $userdata=(mysqli_fetch_assoc($result));
         header("Location: listBugs.php?userid=".$userdata['usr_id']);
      } else {
     
        mysqli_close($conn);
        $error_fields[] = "username";
        $error_fields[] = "password";
        header("Location: index.php?error_fields=".implode(",",$error_fields));
        exit;
      }
      mysqli_close($conn);
}

?>
