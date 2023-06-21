
<!DOCTYPE HTML>
<html>
<head>
<title>Online Bus Pass | Home </title>
<?php include "header.php";?>
<!-- banner -->
<div class="banner">
	<div class="container">
		<h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;"></h1>
	</div>
</div>

<div class="about">
	<div class="container">
		<div class="about-top wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">
			<h2>Online Bus Pass</h2>
			<p style="text-align: left" >The Bus Scheduling and Booking System eliminate most of the limitations of the existing software. Bus pass web system to put it simply, means system can provides pass identification using bar-code, Pass renewal, cancellation, updating, Student discount etc.
				Using this website we can check all details related Bus pass and instruction like how to renew pass how to update it, and also provide details of student discount.<br><br>
				This website keeps all information of all Bus pass.<br><br>
				This online bus pass software system will help students and passengers get bus passes online and eliminate the need to stand in ques for passer or collecting a ticket for each journey.<br><br>
				Passengers first need to verify themselves the system using various address and photo proofs. Once verified the system allows them to book passes for any route online.</p>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- /banner -->




<?php
$con=mysqli_connect("localhost","root","","online_bus_pass") or die(mysqli_query($con));
$view=mysqli_query($con,"select count(id) as student from user where Status='approved' and User_type='Student' ");
$fetch=mysqli_fetch_array($view);
?>

<!-- routes -->
<div class="routes">
	<div class="container">
		<div class="col-md-4 routes-left wow fadeInRight animated" data-wow-delay=".5s">
			<div class="rou-left">
				<a href="#"><i class="fa fa-user"></i></a>
			</div>
			<div class="rou-rgt wow fadeInDown animated" data-wow-delay=".5s">
				<h3><?php echo $fetch['student']; ?></h3>
				<p>Student</p>
			</div>
				<div class="clearfix"></div>
		</div>

<?php
$view1=mysqli_query($con,"select count(id) as public from user where Status='approved' and User_type='Public' ");
$fetch1=mysqli_fetch_array($view1);
?>		
		<div class="col-md-4 routes-left">
			<div class="rou-left">
				<a href="#"><i class="fa fa-user"></i></a>
			</div>
			<div class="rou-rgt">
				<h3><?php echo $fetch1['public']; ?></h3>
				<p>Public</p>
			</div>
				<div class="clearfix"></div>
		</div>
<?php
$view2=mysqli_query($con,"select count(id) as pass from pass_details where Status='approved' ");
$fetch2=mysqli_fetch_array($view2);
?>		
		<div class="col-md-4 routes-left wow fadeInRight animated" data-wow-delay=".5s">
			<div class="rou-left">
				<a href="#"><i class="fa fa-ticket"></i></a>
			</div>
			<div class="rou-rgt">
				<h3><?php echo $fetch2['pass']; ?></h3>
				<p>Pass Count</p>
			</div>
				<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- /routes -->

<?php  include "footer.php";?>
