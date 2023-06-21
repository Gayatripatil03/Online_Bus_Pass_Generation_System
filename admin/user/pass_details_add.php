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
    <meta name="viewport" content="
    width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Add Pass Details</title>

    <?php include "header.php";?>

 <?php 
 include 'config.php';
 if(isset($_POST['submit']))
{
 extract($_POST);


 
 $date =$_POST['from_date'];
$dateTime = new DateTime($date);
$formatted_date=date_format ( $dateTime, 'Y-m-d' );

 $days=$_POST['days'];

 $to_date=date("Y-m-d", strtotime($formatted_date) + ($days * 86400));


  
 $add=mysqli_query($connect,"insert into pass_details( Name, Aadhar_card_no, From_stop, To_stop, Month, Days, Pass_amount, From_date, To_date, User_type) values('".$_SESSION['name']."', '".$_SESSION['aadhar_card_no']."', '$from_stop', '$to_stop', '$month', '$days', '$amount', '$formatted_date', '$to_date', '".$_SESSION['user_type']."')") or die(mysqli_error($connect));

 

 if($add)
        {
            echo "<script>";
            echo "alert('Send pass request successfull');";
            echo 'window.location.href="pass_details_add.php";';
            echo "</script>";
        }else
        {
            echo "<script>";
            echo "alert('Error for send pass request');";
            echo "</script>";
            
        }
}
?>
<div class="content-wrapper">
    <h3 class="text-primary mb-4">Add Pass Details</h3>
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="card">
                <div class="card-block">
                    <!-- <h5 class="card-title mb-4">Basic form elements</h5> -->
                        <form method="post" enctype="multipart/form-data">

                            

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2 col-xs-2" style="padding-left: 25px">
                                        <h6>From Stop :</h6>
                                    </div>
                                    <div class="col-md-5 col-xs-10">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-hand-paper-o"></i></span> 
                                
                                            <select name="from_stop" class="form-control" id="from_stop" required="">
                                                <option value="">Select From Stop</option>
                                                <?php
                                                    require 'config.php';
                                                    $query1=mysqli_query($connect,"select distinct From_stop from pass_amount_details");
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

<script type="text/javascript">
    $(document).ready(function(){
      $("select#from_stop").change(function(){
            var s = $("#from_stop option:selected").val();
        
            $.ajax({
                type: "POST",
                url: "to_stop.php", 
                data: { from_stop : s  } 
            }).done(function(data){
                $("#to_stop").html(data);
            });
        });
    });
  </script>                            

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2 col-xs-2" style="padding-left: 25px">
                                        <h6>To Stop :</h6>
                                    </div>
                                    <div class="col-md-5 col-xs-10">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-hand-paper-o"></i></span> 
                                
                                            <select name="to_stop" class="form-control" id="to_stop" required="">
                                                <option value="">Select To Stop</option>
                                                
                                            </select>
                                        </div>
                                    
                                    </div>
                                </div>
                            </div>

<script type="text/javascript">
    $(document).ready(function(){
      $("select#to_stop").change(function(){
            var m = $("#to_stop option:selected").val();
        
            $.ajax({
                type: "POST",
                url: "month.php", 
                data: { to_stop : m  } 
            }).done(function(data){
                $("#month").html(data);
            });
        });
    });
  </script>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2 col-xs-2" style="padding-left: 25px">
                                        <h6>Month :</h6>
                                    </div>
                                    <div class="col-md-5 col-xs-10">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 
                                
                                            <select name="month" class="form-control" id="month" required="">
                                                <option value=""> Select Month</option>
                                                
                                               
                                            </select>
                                        </div>
                                    
                                    </div>
                                </div>
                            </div>

<script type="text/javascript">
    $(document).ready(function(){
      $("select#month").change(function(){
            var d = $("#month option:selected").val();
            
        
            $.ajax({
                type: "POST",
                url: "days.php", 
                data: { month : d} 
            }).done(function(data){
                $("#days").html(data);
            });
        });
    });
  </script>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2 col-xs-2" style="padding-left: 25px">
                                        <h6>Days :</h6>
                                    </div>
                                    <div class="col-md-5 col-xs-10">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 
                                
                                            <select name="days" class="form-control" id="days" required="">
                                                <option value=""> Select Days</option>
                                                
                                               
                                            </select>
                                        </div>
                                    
                                    </div>
                                </div>
                            </div>

<script type="text/javascript">
    $(document).ready(function(){
      $("select#month").change(function(){
            var a = $("#month option:selected").val();
            var e = $("#from_stop option:selected").val();
            var f = $("#to_stop option:selected").val();
        
            $.ajax({
                type: "POST",
                url: "amount.php", 
                data: { month : a , from_stop : e, to_stop : f   } 
            }).done(function(data){
                $("#amount").html(data);
            });
        });
    });
  </script>
  
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2 col-xs-2" style="padding-left: 25px">
                                        <h6>Amount :</h6>
                                    </div>
                                    <div class="col-md-5 col-xs-10"> 
                                        <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-inr"></i></span>
                                                
                                                <select name="amount" class="form-control" id="amount" required="">
                                                <option value="">Select To Amount</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

<link href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="Stylesheet"
        type="text/css" />
    <!-- <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script> -->
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script language="javascript">
        $(document).ready(function () {
            $("#from_date").datepicker({
                minDate: 0
            });
        });
    </script>
<script>
$("#from_date" ).datepicker({  
    minDate: +1,
    beforeShow : function(){
        var dateTime = new Date();
        var hour = dateTime.getHours();
        if(hour  >= 11){
            $(this).datepicker( "option", "minDate", "+1" );
        }
    }
});
</script>


                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2 col-xs-2" style="padding-left: 25px">
                                        <h6>From Date :</h6>
                                    </div>
                                    <div class="col-md-5 col-xs-10">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 
                                
                                            <input type="text" name="from_date" class="form-control" id="from_date" placeholder="From Date" required="">
                                                
                                                
                                            
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