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
	                                    			<div class="col-md-2 col-xs-2" style="padding-left: 100px">
	                                    				<h6>Name :</h6>
	                                    			</div>
	                                    			<div class="col-md-5 col-xs-10"> 
		                                        
		                                                <input type="text" class="form-control p-input" id="name" placeholder="Name" name="name" value="<?php echo $fetch['Name']; ?>">
		                                            
		                                         	</div>
	                                         	</div>
                                        	</div>

			                                <div class="form-group">
                                    			<div class="row">
	                                    			<div class="col-md-2"></div>
	                                    			<div class="col-md-2 col-xs-2" style="padding-left: 100px">
	                                    				<h6>Email :</h6>
	                                    			</div>
	                                    			<div class="col-md-5 col-xs-10"> 
		                                        
		                                                <input type="email" class="form-control p-input" id="email" placeholder="Email" name="email" value="<?php echo $fetch['Email']; ?>" readonly>
		                                            
		                                         	</div>
	                                         	</div>
                                        	</div>

                                            

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-2"></div>
                                                    <div class="col-md-2 col-xs-2" style="padding-left: 100px">
                                                        <h6>Photo :</h6>
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
                                                        <input type="file" id="image" name="photo" class="fileinput" />
                                                    
                                                    </div>
                                                </div>
                                            </div>

<script type="text/javascript">
            $(document).ready(function(){
                //Image file input change event
                $("#image").change(function(){
                    readImageData(this);//Call image read and render function
                });
            });
             
            function readImageData(imgData){
                if (imgData.files && imgData.files[0]) {
                    var readerObj = new FileReader();
                    
                    readerObj.onload = function (element) {
                        $('#preview_img').attr('src', element.target.result);
                    }
                    
                    readerObj.readAsDataURL(imgData.files[0]);
                }
            }
        </script>

                                        	<div class="row">
	                                    			<div class="col-md-4 col-xs-2"></div>
	                                    			<div class="col-md-5 col-xs-10" >
	                                    				<button type="submit" class="btn btn-primary" name="update">Update</button>
                                              <a href="profile.php"><button type="button" class="btn btn-danger" name="update">Cancel</button></a>
                                                        
	                                    			</div>
                                			</div>

		                                         
                                    	</form>
                                    
                                </div><!-- end card-block -->
                            </div><!-- end card -->
                        </div><!-- end cloumn -->
                    </div><!-- end row -->
                </div><!-- end content-wrapper -->

<?php 
 include 'config.php';
 if(isset($_POST['update']))
{
 extract($_POST);
 

 
  $name=$_FILES['photo']['name'];
  $type=$_FILES['photo']['type'];
  $size=$_FILES['photo']['size'];
  $temp=$_FILES['photo']['tmp_name'];
  if($name){
 $upload= "../images/admin/";
            $imgExt=strtolower(pathinfo($name, PATHINFO_EXTENSION));
            $valid_ext= array('jpg','png','jpeg' );
            $photo= rand(1000,1000000).".".$imgExt;
            unlink($upload.$fetch['Photo']);
            move_uploaded_file($temp,$upload.$photo);
  }
  else
  {
      $photo=$fetch['Photo'];
      }
 $update=mysqli_query($connect,"update admin set
            Name='".$_POST['name']."',
            Email='".$_POST['email']."',
            Photo='".$photo."'
            where Email='".$_SESSION['email']."' ") or die(mysqli_error($connect));
 
if($update)
                          {
       echo '<script type="text/javascript">';
       echo " alert('Profile updated');";
       echo 'window.location.href = "profile.php";';
       echo '</script>';
  
                      }
                     else
                     {
       echo '<script type="text/javascript">';
       echo " alert('Profile not updated');";
       echo '<script>';
                        
  
                     }
}

 ?>   

                <!-- start footer -->
                    <?php include "footer.php";?>
                <!-- end footer -->

            