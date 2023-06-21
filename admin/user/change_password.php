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
    <title>Change Password</title>
    <?php include "header.php";?>

    <?php
    if(isset($_POST['change']))
    {
        extract($_POST);
        include 'config.php';
        
        $chpass=mysqli_query($connect,"select * from user where Username='".$_SESSION['username']."' and Password='".$_POST['oldpass']."'") or die(mysqli_error($connect));
        if(mysqli_num_rows($chpass)==1)
        {
            if(strlen($_POST['newpass'])>=3)
            {
                if($_POST['newpass']==$_POST['repass'])
                {
                    $update=mysqli_query($connect,"update user set Password='".$_POST['newpass']."' , 
                            Password='".$_POST['repass']."' where Username='".$_SESSION['username']."' " )or die(mysqli_error($connect));
                    if($update)
                    {
                        echo "<script>";
                        echo "alert('Password change..');";
                        echo 'window.location.href="index.php";';
                        echo "</script>";  
                        
                    }else
                    {
                        echo "<script>";
                        echo "alert('Password not change..');";
                        echo "</script>";
                        
                    }
                    
                    
                }else
                {
                    echo "<script>";
                    echo "alert('New Password and Re-type password not match');";
                    echo "</script>";
                    
                }           
                
            }else
            {
                echo "<script>";
                echo "alert('Password length not match');";
                echo "</script>";
            }           
            
        }else
        {
            echo "<script>";
            echo "alert('Old Password not match');";
            echo "</script>";
                    
        }
    }

?> 
    

                
                <div class="content-wrapper">
                    <h3 class="text-primary mb-4">Change Password</h3>
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <div class="card">
                                <div class="card-block">
                                    <!-- <h5 class="card-title mb-4">Basic form elements</h5> -->
                                    	<form method="post">
                                    		<div class="form-group">
                                    			<div class="row">
	                                    			<div class="col-md-2"></div>
	                                    			<div class="col-md-2 col-xs-2" >
	                                    				<h6>Old Password :</h6>
	                                    			</div>
	                                    			<div class="col-md-5 col-xs-10"> 
		                                        
		                                                <input type="password" class="form-control" name="oldpass" data-placement="bottom" title="old password" data-toggle="tooltip" placeholder="old password" required="">
                                                    
		                                            
		                                         	</div>
	                                         	</div>
                                        	</div>

			                                <div class="form-group">
                                    			<div class="row">
	                                    			<div class="col-md-2"></div>
	                                    			<div class="col-md-2 col-xs-2" >
	                                    				<h6>New Password :</h6>
	                                    			</div>
	                                    			<div class="col-md-5 col-xs-10"> 
		                                        
                                                        <input type="password" class="form-control" name="newpass" data-placement="bottom" title="new password" data-toggle="tooltip" placeholder="new password" required>
		                                         	</div>
	                                         	</div>
                                        	</div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-2"></div>
                                                    <div class="col-md-2 col-xs-2" >
                                                        <h6>Re-enter Password :</h6>
                                                    </div>
                                                    <div class="col-md-5 col-xs-10"> 
                                                
                                                        <input type="password" class="form-control" name="repass" data-placement="bottom" title="re-enter password" data-toggle="tooltip" placeholder="re-enter password"  required>
                                                    
                                                    </div>
                                                </div>
                                            </div>

                                        	<div class="row">
	                                    			<div class="col-md-4 col-xs-2"></div>
	                                    			<div class="col-md-5 col-xs-10" >
	                                    				<button type="submit" class="btn btn-primary" name="change">Change</button>
	                                    			</div>
                                			</div>

		                                         
                                    	</form>
                                    
                                </div><!-- end card-block -->
                            </div><!-- end card -->
                        </div><!-- end cloumn -->
                    </div><!-- end row -->
                </div><!-- end content-wrapper -->

                <!-- start footer -->
                    <?php include "footer.php";?>
                <!-- end footer -->

            