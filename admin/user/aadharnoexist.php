<?php
error_reporting(0);
include ("config.php");
// $db_handle = new DBController();


if(!empty($_POST["aadhar_card_no"])) {
  $result = mysqli_query($connect,"SELECT count(*) FROM user WHERE Aadhar_card_no='" . $_POST["aadhar_card_no"] . "'") or die (mysqli_error($connect));
  $row = mysqli_fetch_row($result);
  $user_count = $row[0];
  if($user_count>0) {
      echo "<span class='status-not-available'> Aadhar card number already use..</span>";
  }else{
      echo "<span class='status-available'> Aadhar card number available.</span>";
  }
}
?>