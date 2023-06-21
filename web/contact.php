
<!DOCTYPE HTML>
<html>
<head>
<title>Online Bus Pass | Contact </title>
<?php include "header.php";?>
<!--- banner-1 ---->
<div class="banner-1">
	<div class="container">
		<h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;"></h1>
	</div>
</div>
<!--- /banner-1 ---->
<!-- contact -->
<div class="contact">
	<div class="container">
	<h3>Contact Us</h3>
	<div class="row">
		<div class="col-md-3 ">
			<div class="con-top animated wow fadeInUp animated" data-wow-duration="1200ms" data-wow-delay="500ms" style="visibility: visible; animation-duration: 1200ms; animation-delay: 500ms; animation-name: fadeInUp;">
				<h4>Member</h4>
					
					<p>Mayuri Shirke<br> Priti Nawle<br> Vasanta Sanga<br>Dhanashri Patil</p> 
					
			</div>
		</div>
		<div class="col-md-3 ">
			<div class="con-top animated wow fadeInUp animated" data-wow-duration="1200ms" data-wow-delay="500ms" style="visibility: visible; animation-duration: 1200ms; animation-delay: 500ms; animation-name: fadeInUp;">
				<h4>Address</h4>
					<p>Ramchandra College Road<br>JSPM ICOER<br> Wagholi,Pune</p>
			</div>
		</div>
		<div class="col-md-3 ">
			<div class="con-top animated wow fadeInUp animated" data-wow-duration="1200ms" data-wow-delay="500ms" style="visibility: visible; animation-duration: 1200ms; animation-delay: 500ms; animation-name: fadeInUp;">
				<h4>Email</h4>
					<p>admin@gmail.com<br>busonline@gmail.com</p>				
			</div>
		</div>
		<div class="col-md-3 ">
			<div class="con-top animated wow fadeInUp animated" data-wow-duration="1200ms" data-wow-delay="500ms" style="visibility: visible; animation-duration: 1200ms; animation-delay: 500ms; animation-name: fadeInUp;">
				<h4>Contact</h4>
					<p>01234567</p>
			</div>
		</div>
	</div>

	<br><br>
	<div class="row">
		<div class="col-md-6 ">
			<div class="con-top animated wow fadeInUp animated" data-wow-duration="1200ms" data-wow-delay="500ms" style="visibility: visible; animation-duration: 1200ms; animation-delay: 500ms; animation-name: fadeInUp;">
				<form method="post" class="form-horizontal" enctype="multipart/form-data">
					<br>
					<div class="form-group">
                        <label style="color:#1f8dd6;" class="col-md-2 control-label">Name:</label>
                        <div class="col-md-10">
                        <input name="name" type="text" class="form-control " style="border:solid 1px rgba(0,0,0,.15)" placeholder="Your Full Name" required/></div>
                    </div>
                    <br>  

                    <div class="form-group ">
                        <label style="color:#1f8dd6;" class="col-md-2 control-label">Email:</label>
                        <div class="col-md-10">
                        <input name="email" type="text" class="form-control" style="border:solid 1px rgba(0,0,0,.15)" placeholder="Your Email Address" required/>
                    	</div>
                    </div>
                      <br>

                    <div class="form-group">
                        <label style="color:#1f8dd6;" class="col-md-2 control-label">Phone:</label>
                        <div class="col-md-10">
                        <input name="phone" type="text" class="form-control" style="border:solid 1px rgba(0,0,0,.15)" placeholder="Your Mobile no." maxlength="10" pattern="[0-9]{10}" required/>
                        </div> 
                    </div>
                    <br>

                    <div class="form-group">
                        <label style="color:#1f8dd6;" class="col-md-2 control-label">Message:</label>
                        <div class="col-md-10">
                        <textarea name="msg" class="form-control" style="border:solid 1px rgba(0,0,0,.15)" placeholder="Wite Your Message" required></textarea>
                        </div>
                    </div>
                    <br>
                    <center>
                    <div class="form-group">
                   
                    <center><button class="btn" type="submit" name="submit" value="WEB DESIGNER" style="background-color:#1f8dd6;color:#FFF;" >Submit</button></center></div></center>
                </form>
				
					
			</div>
		</div>
		<div class="col-md-6 ">
			<div class="con-top animated wow fadeInUp animated" data-wow-duration="1200ms" data-wow-delay="500ms" style="visibility: visible; animation-duration: 1200ms; animation-delay: 500ms; animation-name: fadeInUp;">
				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d8482.75566744037!2d75.5477779760317!3d21.014089609277146!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xa936a554c882fc21!2sK.C.E.Society%27s%20Swami%20Vivekanand%20Junior%20College!5e0!3m2!1sen!2sin!4v1579169511753!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
		</div>
		
	</div>
		
			<div class="clearfix"></div>
	</div>
</div>

<?php
		$con=mysqli_connect("localhost","root","","online_bus_pass") or die(mysqli_query($con));
		if(isset($_POST['submit']))
		{
			extract($_POST);
			$query=mysqli_query($con,"insert into contact (Name,Email,Phone,Message) values('$name','$email','$phone','$msg')")or die (mysqli_error($con));
			
			if($query)
		{
			echo '<script type="text/javascript">;';
			echo "alert('Thank you !');";
			echo '</script>';
		}
		else
		{
			echo '<script type="text/javascript">;';
			echo "alert('Something error !');";
			echo '</script>';
		}
		}
		
		?>
<!-- /contact -->
<?php  include "footer.php";?>