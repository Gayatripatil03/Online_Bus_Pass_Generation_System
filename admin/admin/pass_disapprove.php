<?php
include 'config.php';

if(isset($_GET['id']))

{
extract ($_POST);
$update=mysqli_query($connect,"update pass_details set Status = 'disapproved' where id='".$_GET['id']."' ") or die(mysqli_error($connect));
$back="javascript:history.back()";

if($update)
          {
            echo '<script type="text/javascript">';
            echo "alert(' Pass details disapproved');";
            echo 'window.location.href = "pass_request_disapprove.php";';
            echo "</script>";

          }
         else
         {
            echo '<script type="text/javascript">';
            echo "alert('Error for pass details disapprovation');";
            echo "</script>";
             
             }
	
}

?>