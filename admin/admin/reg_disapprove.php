<?php
include 'config.php';

if(isset($_GET['id']))

{
extract ($_POST);
$update=mysqli_query($connect,"update user set Status = 'disapproved' where id='".$_GET['id']."' ") or die(mysqli_error($connect));
$back="javascript:history.back()";

if($update)
          {
            echo '<script type="text/javascript">';
            echo "alert('Disapproved');";
            echo 'window.location.href = "'.$back.'"';
            echo "</script>";

          }
         else
         {
            echo '<script type="text/javascript">';
            echo "alert('Error for disapprovation');";
            echo "</script>";
             
             }
	
}

?>