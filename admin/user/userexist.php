<?php
error_reporting(0);
include ("config.php");
// $db_handle = new DBController();


if(!empty($_POST["username"])) {
  $result = mysqli_query($connect,"SELECT count(*) FROM user WHERE Username='" . $_POST["username"] . "'") or die (mysqli_error($connect));
  $row = mysqli_fetch_row($result);
  $user_count = $row[0];
  if($user_count>0) {
      echo "<span class='status-not-available'> Username already use..</span>";
  }else{
      echo "<span class='status-available'> Username available.</span>";
  }
}
?>