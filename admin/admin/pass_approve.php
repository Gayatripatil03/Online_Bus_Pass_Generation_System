<?php
include 'config.php';

if(isset($_GET['id']))

{
extract ($_POST);
 
$update=mysqli_query($connect,"update pass_details set Status='approved' where id='".$_GET['id']."' ") or die(mysqli_error($connect));



if($update)
          {
            echo '<script type="text/javascript">';
            echo "alert('Pass details approved');";
            echo 'window.location.href = "pass_request_approve.php";';
            echo "</script>";

          }
         else
         {
            echo '<script type="text/javascript">';
            echo "alert('Error for pass details approvation');";
            echo "</script>";
             
             }
	
}

?>