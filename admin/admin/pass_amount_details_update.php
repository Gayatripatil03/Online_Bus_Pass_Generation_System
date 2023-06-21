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
    <title>Update Pass Amount Details</title>

    <?php include "header.php";?>

 <?php 
 include 'config.php';
  $view=mysqli_query($connect,"select * from pass_amount_details where id='".$_GET['id']."'") or die(mysqli_error($connect));
 $fetch=mysqli_fetch_array($view);
 ?>
<div class="content-wrapper">
    <h3 class="text-primary mb-4">Update Pass Amount Details</h3>
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
                                                <option value="<?php echo $fetch['From_stop'];?>"><?php echo $fetch['From_stop'];?></option>
                                                <?php
                                                    require 'config.php';
                                                    $query1=mysqli_query($connect,"select * from from_stop");
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
                                                <option value="<?php echo $fetch['To_stop'];?>"><?php echo $fetch['To_stop'];?></option>
                                                <?php
                                                    require 'config.php';
                                                    $query1=mysqli_query($connect,"select * from to_stop");
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
                                                <option value="<?php echo $fetch['Month'];?>"><?php echo $fetch['Month'];?></option>
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
                                                <option value="<?php echo $fetch['Days'];?>"><?php echo $fetch['Days'];?></option>
                                                
                                               
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
                                                <input type="text" class="form-control " id="amount" placeholder="Amount" name="amount" value="<?php echo $fetch['Amount'];?>" >
                                        </div>
                                    </div>
                                </div>
                            </div>

                           <br>
                        	<div class="row">
                        			<div class="col-md-4 col-xs-2"></div>
                        			<div class="col-md-5 col-xs-10" >
                        				<button type="submit" class="btn btn-primary" name="update">Update</button>
                                        <a href="pass_amount_details_view.php"><button type="button" class="btn btn-danger" name="cancel">Cancel</button></a>
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
 
 
 $update=mysqli_query($connect,"update pass_amount_details set
            From_stop='".$_POST['from_stop']."',
            To_stop='".$_POST['to_stop']."',
            Month='".$_POST['month']."',
            Days='".$_POST['days']."',
            Amount='".$_POST['amount']."'
            where id='".$_GET['id']."' ") or die(mysqli_error($connect));
 
if($update)
                          {
       echo '<script type="text/javascript">';
       echo " alert('Pass amount record updated');";
       echo 'window.location.href = "pass_amount_details_view.php";';
       echo '</script>';
  
                      }
                     else
                     {
       echo '<script type="text/javascript">';
       echo " alert('Pass amount record not updated');";
       echo '<script>';
                        
  
                     }
}

 ?>

<!-- start footer -->
    <?php include "footer.php";?>
<!-- end footer -->