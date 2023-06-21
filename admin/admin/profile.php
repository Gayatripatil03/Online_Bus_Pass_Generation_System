<?php
session_start();
if(!isset($_SESSION['email']))
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
    <title>Profile</title>
    <?php include "header.php";?>
   
         
        
       
 <?php
    
    
        include 'config.php';
        
        $select=mysqli_query($connect,"select * from admin where Email='".$_SESSION['email']."' ") or die(mysqli_error($connect));
        $fetch=mysqli_fetch_array($select);
    
?>                
                <div class="content-wrapper">
                    <h3 class="text-primary mb-4">Admin Profile</h3>
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <div class="card">
                                <div class="card-block">
                                    <!-- <h5 class="card-title mb-4">Basic form elements</h5> -->
                                    	<form method="post" enctype="multipart/form-data">
                                    		<div class="form-group">
                                    			<div class="row">
	                                    			<div class="col-md-2"></div>
	                                    			<div class="col-md-2 col-xs-1" style="padding-left: 100px">
	                                    				<h6>Name:</h6>
	                                    			</div>
	                                    			<div class="col-md-5 col-xs-5"> 
		                                        
		                                                <?php echo $fetch['Name']; ?>
		                                            
		                                         	</div>
	                                         	</div>
                                        	</div>

			                                <div class="form-group">
                                    			<div class="row">
	                                    			<div class="col-md-2"></div>
	                                    			<div class="col-md-2 col-xs-2" style="padding-left: 100px">
	                                    				<h6>Email:</h6>
	                                    			</div>
	                                    			<div class="col-md-5 col-xs-10"> 
                                              <?php echo $fetch['Email']; ?>
		                                        
		                                                
		                                            
		                                         	</div>
	                                         	</div>
                                        	</div>

                                            

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-2"></div>
                                                    <div class="col-md-2 col-xs-2" style="padding-left: 100px">
                                                        <h6>Photo:</h6>
                                                    </div>
                                                    <div class="col-md-5 col-xs-10"> 
                                                
                                                        <div class="preview_box">
                                                            <?php 
                                                                if($fetch['Photo']=="")
                                                                {
                                                            ?>
                                                            <img id="preview_img" src="../images/No-image-full.jpg" height="100" width="100"/>
                                                            <?php }
                                                                else
                                                                {
                                                             ?>
                                                                <img id="preview_img" src="../images/admin/<?php echo $fetch['Photo']?>" height="100" width="100" />

                                                                <?php } ?>
                                                        </div>
                                                        
                                                    
                                                    </div>
                                                </div>
                                            </div>



                                        	<div class="row">
	                                    			<div class="col-md-4 col-xs-2"></div>
	                                    			<div class="col-md-5 col-xs-10" >
	                                    				<a href="profile_update.php"><button type="button" class="btn btn-primary" name="update">Edit</button></a>
                                                        
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

            