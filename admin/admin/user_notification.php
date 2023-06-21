<?php
include "config.php";
$sql="UPDATE user SET Status_id=1 WHERE Status_id=0";	
$result=mysqli_query($connect, $sql);

$sql="select * from user ORDER BY id DESC limit 5";
$result=mysqli_query($connect, $sql);

$response='';
while($row=mysqli_fetch_array($result)) {
	$response = $response;
}
if(!empty($response)) {
	print $response;
}


?>