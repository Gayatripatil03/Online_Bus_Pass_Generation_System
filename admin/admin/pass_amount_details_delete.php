<!DOCTYPE html>
<html>
<head>
    <title>delete</title>
</head>
<body>

<?php
if (isset($_GET['id']))
    include 'config.php';

    $delete='Delete from pass_amount_details where id="'.$_GET['id'].'"';
    $result = mysqli_query($connect,$delete);
    $back="javascript:history.back()";

  if($result)

          {
            echo '<script type="text/javascript">';
            echo "alert('Stop detail deleted');";
            echo 'window.location.href = "'.$back.'"';
            echo "</script>";

          }
         else
         {
            echo '<script type="text/javascript">';
            echo "alert('Error for stop detail delete');";
            echo "</script>";
             
             }

?>
</body>
</html>n