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
	<script language="javascript">
function printdiv(printpage)
{
var headstr = "<html><head><title></title></head><body>";
var footstr = "</body>";
var newstr = document.all.item(printpage).innerHTML;
var oldstr = document.body.innerHTML;
document.body.innerHTML = headstr+newstr+footstr;
window.print();
document.body.innerHTML = oldstr;
return false;
}
</script>

<script>
class myExtension fpdi {
    public function addContent($pdffile) {
        $this->setSourceFile($pdffile);
        $page = $this->ImportPage(1);
        $this->AddPage();
        $this->useTemplate($page);
        $this->$this->Image('someimage.png', 150, 5, 40, 20, 'PNG');
        $this->createTextField($string, 25, 50, 40);
    }
    public function createTextField($string, $x, $y, $width, $height = 2) {
        $this->SetXY($x,$y);
        $this->Setfont("Arial","",10);
        $this->Cell($width, $height, $string, 0, 0, "");
    }
}
$pdf = new myExtension();
$pdf->addContent('print_pass.php');
$pdf->Output('ready.pdf', 'I');

</script>
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
		$e=$row['Aadhar_card_no'];

		$tempDir = 'temp/'; 
		//$email = $_POST['mail'];
		//$subject =  $_POST['subject'];
		$filename = getUsernameFromEmail($id);
		//$body =  $_POST['msg'];
		//$codeContents = 'Password='.urlencode($pa).'&body='.urlencode($pa); 
		$codeContents = 'Aadhar Card No : '.urlencode($e).'From Stop : '.urlencode($a).' To Stop : '.urlencode($b).' From Date : '.urlencode($c).'To Date : '.urlencode($d).'';
		//QRcode::png($codeContents, $tempDir.''.$filename.'.png', QR_ECLEVEL_L, 5);
		QRcode::png($codeContents, $tempDir.''.$filename.'.png', QR_ECLEVEL_L, 5);
?>  


<div class="container">
	<center>

		<div id="div_print">
			<div style="margin-top: 50px;">
				<div class="row">
					<div class="col-md-4 col-xs-3"></div>
				
					<div class="col-md-4 col-xs-6" style="border:1px solid black;">
						<div class="row" style="margin-top: 20px;">

<?php
$select1=mysqli_query($connect,"select * from user where Username='".$_SESSION['username']."' ") or die(mysqli_error($connect));
        $fetch=mysqli_fetch_array($select1);
?>        
							
							<div class="col-md-6 col-xs-6">
								<img src="../images/user/<?php echo $fetch['Photo'];?>" height="150" width="150" />
							</div>
							<div class="col-md-6 col-xs-6">
								<div class="qrframe" style="border:1px solid black; width:150px; height:150px;">
								<?php echo '<img src="temp/'.@$filename.'.png" style="width:140px; height:140px;"><br>'; ?>
								</div>
							</div>

						</div>
						<br><br>
						<div class="row">
							<div class="col-md-1 col-xs-1"></div>
							<div class="col-md-6 col-xs-6"><h4>Aadhar Card No:</h4></div>
							<div class="col-md-4 col-xs-4"><h5><?php echo $fetch['Aadhar_card_no']; ?></h5></div>
						</div>

						<div class="row">
							<div class="col-md-1 col-xs-1"></div>
							<div class="col-md-6 col-xs-6"><h4>Name:</h4></div>
							<div class="col-md-4 col-xs-4"><h5><?php echo $fetch['Name']; ?></h5></div>
							
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</center>
	<br><br>
	<form method="post">
		<center>
			<button type="button" class="btn btn-info" name="print" onClick="printdiv('div_print');">Print</button>
			<a href="javascript:history.back()"><button type="button" class="btn btn-danger" name="cancel">Cancel</button></a>
		</center>
	</form>
</div>

</body>
</html>
   