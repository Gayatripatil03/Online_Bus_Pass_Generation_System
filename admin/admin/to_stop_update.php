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
    <meta name="viewport" content="
    width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Update To Stop</title>

    <?php include "header.php";?>

 <?php 
 include 'config.php';
  $view=mysqli_query($connect,"select * from from_stop where id='".$_GET['id']."'") or die(mysqli_error($connect));
 $fetch=mysqli_fetch_array($view);
 ?>

<div class="content-wrapper">
                    <h3 class="text-primary mb-4">Update To Stop</h3>
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <div class="card">
                                <div class="card-block">
                                    <!-- <h5 class="card-title mb-4">Basic form elements</h5> -->
                                    	<form method="post" enctype="multipart/form-data">
                                    		<div class="form-group">
                                    			<div class="row">
	                                    			<div class="col-md-2"></div>
	                                    			<div class="col-md-2 col-xs-2" style="padding-left: 60px">
	                                    				<h6>Update To Stop :</h6>
	                                    			</div>
	                                    			<div class="col-md-5 col-xs-9"> 
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="fa fa-hand-paper-o"></i></span>
		                                                                                           
		                                                    <input type="text" class="form-control p-input" id="to_stop" placeholder="Update To Stop" name="to_stop" value="<?php echo $fetch['To_stop'] ?>" required>
                                                        </div>
		                                            
		                                         	</div>
	                                         	</div>
                                        	</div>

                                           <br>
                                        	<div class="row">
	                                    			<div class="col-md-4 col-xs-2"></div>
	                                    			<div class="col-md-5 col-xs-10" >
	                                    				<button type="submit" class="btn btn-primary" name="update">Submit</button>
                                                        <button type="reset" class="btn btn-danger" name="reset">Reset</button>
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
 
 
 $update=mysqli_query($connect,"update to_stop set To_stop='".$_POST['to_stop']."'
            where id='".$_GET['id']."' ") or die(mysqli_error($connect));
 
if($update)
                          {
       echo '<script type="text/javascript">';
       echo " alert('To stop updated');";
       echo 'window.location.href = "to_stop_view.php";';
       echo '</script>';
  
                      }
                     else
                     {
       echo '<script type="text/javascript">';
       echo " alert('To stop not updated');";
       echo '<script>';
                        
  
                     }
}

 ?>

                <!-- start footer -->
                    <?php include "footer.php";?>
                <!-- end footer -->