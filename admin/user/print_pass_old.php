<?php
session_start();
if(!isset($_SESSION['username']))
{
    header('location:index.php');   
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Pass</title>
    <link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="shortcut icon" href="../images/favicon.png" />
    
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/tether/dist/js/tether.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../node_modules/bootstrap-select/js/bootstrap-select.js"></script>
    <script src="../js/bootstrap-select.js"></script>
    
    <script src="../node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js"></script>
    <script src="../js/off-canvas.js"></script>
    <script src="../js/hoverable-collapse.js"></script>
    <script src="../js/misc.js"></script>
    <link rel="stylesheet" href="libs/css/bootstrap.min.css">
    <style>
	.input-field{
		border: 3px groove cornflowerblue;
		border-radius: 10px;
		width: 25em;
		padding: .5em 2em 2em 2em;
		margin:5em 5em 5em 3em;
		height:26em;
	}
	.qr-field{
		border: 3px groove cornflowerblue;
		border-radius: 10px;
		width: 24em;
		height:26em;
		padding: .5em 2em 2em 2em;
		margin:-31em 3em 5em;
		float:right;
	}
	.myoutput{
		border: 3px groove green;
		border-radius: 10px;
		margin:1em 5em 0 5em;
		width: 57em;
	}
	h1{
		text-align:center;
	}
	</style>
</head>

<body>

<?php
 $id=$_GET['id'];
	function getUsernameFromEmail($id) {
		$find = '@';
		$pos = strpos($id, $find);
		$username = substr($id, 0, $pos);
		return $username;
	}
	
	include "config.php";
	include('libs/phpqrcode/qrlib.php'); 
        
        $select=mysqli_query($connect,"select * from pass_details where id='".$_GET['id']."' ") or die(mysqli_error($connect));
        $row=mysqli_fetch_array($select);
        $a=$row['From_stop'];
		$b=$row['To_stop'];
		$c=$row['From_date'];
		$d=$row['To_date'];

		$tempDir = 'temp/'; 
		//$email = $_POST['mail'];
		//$subject =  $_POST['subject'];
		$filename = getUsernameFromEmail($id);
		//$body =  $_POST['msg'];
		//$codeContents = 'Password='.urlencode($pa).'&body='.urlencode($pa); 
		$codeContents = 'From Stop : '.urlencode($a).' To Stop : '.urlencode($b).' From Date : '.urlencode($c).'To Date : '.urlencode($d).'';
		//QRcode::png($codeContents, $tempDir.''.$filename.'.png', QR_ECLEVEL_L, 5);
		QRcode::png($codeContents, $tempDir.''.$filename.'.png', QR_ECLEVEL_L, 5);
?>  

<?php
//Sets the value of the given configuration option. 
ini_set( 'error_reporting', E_ALL ^ E_NOTICE );
ini_set( 'display_errors', '0' );
?> 
 
<?php
// $host="localhost"; // Host name
// $username="root"; // MySQL username
// $password=""; // MySQL password
// $db_name="online_bus_pass"; // Database name
// $tbl_name="pass_details"; // Table name
?>
 
 
<?php
// Connect to server and select database.
// mysqli_connect("$host", "$username", "$password");
// mysqli_select_db("$db_name")or die("Can't select database.");
 
 include "config.php";
//Get email from form, set to $email.
$id = mysqli_real_escape_string($_GET['id']);
 
//Collects data from table
//Selects record from table where it equals form input
$query = "SELECT * from pass_details WHERE id = '".$_GET['id']."' ";
$result = mysqli_query($connect,$query) or die (mysqli_error("Could not find qr."));
 
 
//Returns an associative array that corresponds to 
//the fetched row and moves the internal data pointer ahead
while($row = mysqli_fetch_assoc($result)) {
//Sets ticketnum and seatnumber to $datatoencode
//$datatoencode = $row['id'] . "-" . $row['email'];
$datatoencode =$row['email'];
//Sets name in record to $name
$name = $row['name'];
//Sets seatnumber in record to $seatnumber
$seatnumber = $row['password'];
}
?>
 
<?php
//Close connection
//mysqli_close();
?>



<div class="row" style="border: 1px solid black">
	<div class="col-md-1 col-xs-1"></div>
	<div class="col-md-3 col-xs-3">
		<div class="row">
			<div class="col-md-1 col-xs-1"></div>
			<div class="col-md-1 col-xs-1 ">Aadhar Card No :</div>
			<div class="col-md-3 col-xs-3"><?php echo $_SESSION['aadhar_card_no']; ?></div>
		</div>
		<div class="row">
			<div class="col-md-1 col-xs-1"></div>
			<div class="col-md-1 col-xs-1 ">Name :</div>
			<div class="col-md-9 col-xs-9"><?php echo $_SESSION['name']; ?></div>
		</div>
		

	</div>

	<div class="col-md-3 col-xs-3">
		 <img src="../images/user/<?php echo $_SESSION['photo'];?>" height="100" width="100" />
		 <br><br><br>
		 <div class="qrframe" style="border:1px solid black; width:110px; height:110px;">
				<?php echo '<img src="temp/'.@$filename.'.png" style="width:100px; height:100px;"><br>'; ?>
		</div>

	</div>

</div>


</body>
</html>
   