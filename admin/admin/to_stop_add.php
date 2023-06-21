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
    <title>Add To Stop</title>

    <?php include "header.php";?>

 <?php 
 include 'config.php';
 if(isset($_POST['submit']))
{
 extract($_POST);
 
  
  
 $add=mysqli_query($connect,"insert into to_stop(To_stop) values('$to_stop')") or die(mysqli_error($connect));
 if($add)
        {
            echo "<script>";
            echo "alert('Add to stop successfull');";
            echo 'window.location.href="to_stop_add.php";';
            echo "</script>";
        }else
        {
            echo "<script>";
            echo "alert('Error for add to stop');";
            echo "</script>";
            
        }
}
?>
<div class="content-wrapper">
                    <h3 class="text-primary mb-4">Add To Stop</h3>
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
	                                    				<h6>Add To Stop :</h6>
	                                    			</div>
	                                    			<div class="col-md-5 col-xs-9"> 
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="fa fa-hand-paper-o"></i></span>
		                                                                                           
		                                                    <input type="text" class="form-control p-input" id="to_stop" placeholder="Add To Stop" name="to_stop" required>
                                                        </div>
		                                            
		                                         	</div>
	                                         	</div>
                                        	</div>

                                           <br>
                                        	<div class="row">
	                                    			<div class="col-md-4 col-xs-2"></div>
	                                    			<div class="col-md-5 col-xs-10" >
	                                    				<button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                                        <button type="reset" class="btn btn-danger" name="reset">Reset</button>
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