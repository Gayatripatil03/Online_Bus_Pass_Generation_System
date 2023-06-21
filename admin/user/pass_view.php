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
    <title>Pass Details</title>

    <?php include "header.php";?>

 <?php 
 include 'config.php';
  
  $select=mysqli_query($connect,"select * from pass_details where id='".$_GET['id']."' ") or die(mysqli_error($connect));
 $fetch=mysqli_fetch_array($select);

?>
<div class="content-wrapper">
    <h3 class="text-primary mb-4">Pass Details</h3>
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
                                        <h6>Name :</h6>
                                    </div>
                                    <div class="col-md-5 col-xs-10"> 
                                
                                        <input type="text" class="form-control p-input" id="name" placeholder="Name" name="name" value="<?php echo $fetch['Name']; ?>" disabled>
                                    
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2 col-xs-2" style="padding-left: 25px">
                                      <h6>Aadhar Card No :</h6>
                                    </div>
                                    <div class="col-md-5 col-xs-10"> 

                                        <input type="text" class="form-control p-input" id="Aadhar_card_no" placeholder="Aadhar_card_no" name="Aadhar_card_no" value="<?php echo $fetch['Aadhar_card_no']; ?>" disabled>
                                        
                                    </div>
                                </div>
                            </div>


                            

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2 col-xs-2" style="padding-left: 25px">
                                      <h6>From Stop :</h6>
                                    </div>
                                    <div class="col-md-5 col-xs-10"> 

                                        <input type="text" placeholder="From_stop" class="form-control p_input" name="From_stop" id="From_stop" value="<?php echo $fetch['From_stop']; ?>" disabled>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2 col-xs-2" style="padding-left: 25px">
                                      <h6>To Stop :</h6>
                                    </div>
                                    <div class="col-md-5 col-xs-10"> 

                                        <input type="text" placeholder="To_stop" class="form-control p_input" name="To_stop" id="To_stop" value="<?php echo $fetch['To_stop']; ?>" disabled>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2 col-xs-2" style="padding-left: 25px">
                                        <h6>Month :</h6>
                                    </div>
                                    <div class="col-md-5 col-xs-10"> 
                                
                                        <input type="text" class="form-control p-input" id="Month" placeholder="Month" name="Month" value="<?php echo $fetch['Month']; ?>" disabled>
                                    
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2 col-xs-2" style="padding-left: 25px">
                                      <h6>Days :</h6>
                                    </div>
                                    <div class="col-md-5 col-xs-10"> 
                                    
                                        <input type="text" class="form-control p_input" placeholder="Days" name="Days"  value="<?php echo $fetch['Days'] ?>" disabled >
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2 col-xs-2" style="padding-left: 25px">
                                    <h6>Amount :</h6>
                                    </div>
                                    <div class="col-md-5 col-xs-10"> 

                                    <input type="text" class="form-control p-input"  value="<?php echo $fetch['Pass_amount']; ?>" disabled>

                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2 col-xs-2" style="padding-left: 25px">
                                      <h6>From Date :</h6>
                                    </div>
                                    <div class="col-md-5 col-xs-10"> 

                                        <input type="text" placeholder="From_date" class="form-control p_input" name="From_date" id="From_date" value="<?php echo $fetch['From_date']; ?>" disabled>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2 col-xs-2" style="padding-left: 25px">
                                      <h6>To Date :</h6>
                                    </div>
                                    <div class="col-md-5 col-xs-10"> 

                                        <input type="text" placeholder="To_date" class="form-control p_input" name="To_date" id="To_date" value="<?php echo $fetch['To_date']; ?>" disabled>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2 col-xs-2" style="padding-left: 25px">
                                    <h6>User Type :</h6>
                                    </div>
                                    <div class="col-md-5 col-xs-10"> 

                                    <input type="text" class="form-control p-input" value="<?php echo $fetch['User_type']; ?>" disabled>

                                    </div>
                                </div>
                            </div>
                                        

                            <div class="row">
                                    <div class="col-md-4 col-xs-2"></div>
                                    <div class="col-md-5 col-xs-10" >
                                        
                                        <a href="javascript:history.back()"><button type="button" class="btn btn-danger" name="cancel">Cancel</button></a>
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