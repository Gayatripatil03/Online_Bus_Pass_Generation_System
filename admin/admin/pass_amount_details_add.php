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
    <title>Add Pass Amount Details</title>

    <?php include "header.php";?>

 <?php 
 include 'config.php';
 if(isset($_POST['submit']))
{
 extract($_POST);
 
  
  
 $add=mysqli_query($connect,"insert into pass_amount_details(From_stop, To_stop, Month, Days, Amount) values('$from_stop','$to_stop', '$month', '$days','$amount')") or die(mysqli_error($connect));
 if($add)
        {
            echo "<script>";
            echo "alert('Add pass amount details successfull');";
            echo 'window.location.href="pass_amount_details_add.php";';
            echo "</script>";
        }else
        {
            echo "<script>";
            echo "alert('Error for add pass amount details');";
            echo "</script>";
            
        }
}
?>
<div class="content-wrapper">
    <h3 class="text-primary mb-4">Add Pass Amount Details</h3>
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
                                        <h6>From Stop :</h6>
                                    </div>
                                    <div class="col-md-5 col-xs-10">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-hand-paper-o"></i></span> 
                                
                                            <select name="from_stop" class="form-control" id="from_stop" required="">
                                                <option value="">Select From Stop</option>
                                                <?php
                                                    require 'config.php';
                                                    $query1=mysqli_query($connect,"select From_stop from from_stop");
                                                    while($row=mysqli_fetch_assoc($query1)){
                                                      extract($row);
                                                  ?>
                                                <option value="<?php echo $row['From_stop'];?>"><?php echo $row['From_stop'];?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2 col-xs-2" style="padding-left: 60px">
                                        <h6>To Stop :</h6>
                                    </div>
                                    <div class="col-md-5 col-xs-10">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-hand-paper-o"></i></span> 
                                
                                            <select name="to_stop" class="form-control" id="to_stop" required="">
                                                <option value="">Select To Stop</option>
                                                <?php
                                                    require 'config.php';
                                                    $query1=mysqli_query($connect,"select To_stop from to_stop");
                                                    while($row=mysqli_fetch_assoc($query1)){
                                                      extract($row);
                                                  ?>
                                                <option value="<?php echo $row['To_stop'];?>"><?php echo $row['To_stop'];?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    
                                    </div>
                                </div>
                            </div>



                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2 col-xs-2" style="padding-left: 60px">
                                        <h6>Month :</h6>
                                    </div>
                                    <div class="col-md-5 col-xs-10">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 
                                
                                            <select name="month" class="form-control" id="month" required="">
                                                <option value="">Select To Month</option>
                                                <?php
                                                    require 'config.php';
                                                    $query1=mysqli_query($connect,"select Month from days_detail");
                                                    while($row=mysqli_fetch_assoc($query1)){
                                                      extract($row);
                                                  ?>
                                                <option value="<?php echo $row['Month'];?>"><?php echo $row['Month'];?></option>
                                                <?php } ?>
                                               
                                            </select>
                                        </div>
                                    
                                    </div>
                                </div>
                            </div>

<script type="text/javascript">
    $(document).ready(function(){
      $("select#month").change(function(){
            var s = $("#month option:selected").val();
        
            $.ajax({
                type: "POST",
                url: "days.php", 
                data: { month : s  } 
            }).done(function(data){
                $("#days").html(data);
            });
        });
    });
  </script>                            

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2 col-xs-2" style="padding-left: 60px">
                                        <h6>Days :</h6>
                                    </div>
                                    <div class="col-md-5 col-xs-10">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 
                                
                                            <select name="days" class="form-control" id="days" required="">
                                                <option value="">Select Days</option>
                                                
                                               
                                            </select>
                                        </div>
                                    
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2 col-xs-2" style="padding-left: 60px">
                                        <h6>Amount :</h6>
                                    </div>
                                    <div class="col-md-5 col-xs-10"> 
                                        <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-inr"></i></span>
                                                <input type="text" class="form-control " id="amount" placeholder="Amount" name="amount">
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