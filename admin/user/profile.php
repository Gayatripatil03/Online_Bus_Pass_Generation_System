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
    <title>Profile</title>
    <?php include "header.php";?>
   
         
        
       
 <?php
    
    
        include 'config.php';
        
        $select=mysqli_query($connect,"select * from user where Username='".$_SESSION['username']."' ") or die(mysqli_error($connect));
        $fetch=mysqli_fetch_array($select);
    
?>                
  <div class="content-wrapper">
      <h3 class="text-primary mb-4">User Profile</h3>
      <div class="row">
          <div class="col-md-12 col-xs-12">
              <div class="card">
                  <div class="card-block">


                      <!-- <h5 class="card-title mb-4">Basic form elements</h6> -->
                      	<form method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2 col-xs-2" style="padding-left: 45px">
                                        <h6>Name :</h6>
                                    </div>
                                    <div class="col-md-5 col-xs-10"> 
                                
                                        <h6><?php echo $fetch['Name']; ?></h6>
                                    
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2 col-xs-2" style="padding-left: 45px">
                                      <h6>Address :</h6>
                                    </div>
                                    <div class="col-md-5 col-xs-10"> 

                                        <h6><?php echo $fetch['Address']; ?></h6>
                                        
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2 col-xs-2" style="padding-left: 45px">
                                        <h6>Email :</h6>
                                    </div>
                                    <div class="col-md-5 col-xs-10"> 
                                
                                        <h6><?php echo $fetch['Email']; ?></h6>
                                    
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2 col-xs-2" style="padding-left: 45px">
                                      <h6>Mobile No :</h6>
                                    </div>
                                    <div class="col-md-5 col-xs-10"> 
                                    
                                       <h6><?php echo $fetch['Mobile'] ?></h6>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2 col-xs-2" style="padding-left: 45px">
                                      <h6>Birth Date :</h6>
                                    </div>
                                    <div class="col-md-5 col-xs-10"> 

                                        <h6><?php echo $fetch['Dob']; ?></h6>
                                        
                                    </div>
                                </div>
                            </div>

                           

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2 col-xs-2" style="padding-left: 45px">
                                    <h6>Gender :</h6>
                                    </div>
                                    <div class="col-md-5 col-xs-10"> 
                                        <h6><?php echo $fetch['Gender']; ?></h6>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2 col-xs-2" style="padding-left: 45px">
                                    <h6>User Type :</h6>
                                    </div>
                                    <div class="col-md-5 col-xs-10"> 

                                    <h6><?php echo $fetch['User_type']; ?></h6>

                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2 col-xs-2" style="padding-left: 45px">
                                      <h6>Aadhar Card No :</h6>
                                    </div>
                                    <div class="col-md-5 col-xs-10"> 

                                      <h6><?php echo $fetch['Aadhar_card_no']; ?></h6>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2 col-xs-2" style="padding-left: 45px">
                                        <h6>Aadhar Card :</h6>
                                    </div>
                                    <div class="col-md-5 col-xs-10"> 
                                
                                        <div class="preview_box">
                                            <?php 
                                                if($fetch['Aadhar_card_photo']=="")
                                                {
                                            ?>
                                            <img id="preview_img1" src="../images/No-image-full.jpg" height="100" width="100" disabled/>
                                            <?php }
                                                else
                                                {
                                             ?>
                                                <img id="preview_img1" src="../images/aadhar_card_photo/<?php echo $fetch['Aadhar_card_photo'];?>"  height="100" width="100">

                                                <?php } ?>
                                        
                                          </div>

                                                
                                    
                                    </div>
                                </div>
                            </div>

  

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2 col-xs-2" style="padding-left: 45px">
                                        <h6>Bonafide :</h6>
                                    </div>
                                    <div class="col-md-5 col-xs-10"> 
                                
                                        <div class="preview_box">
                                            <?php 
                                                if($fetch['Bonafide']=="")
                                                {
                                            ?>
                                            <img  id="preview_img2" src="../images/No-image-full.jpg" height="100" width="100" disabled/>
                                            <?php }
                                                else
                                                {
                                             ?>
                                                <img id="preview_img2" src="../images/bonafide/<?php echo $fetch['Bonafide'];?>" height="100" width="100">

                                                <?php } ?>
                                          </div>

                                                
                                        
                                    
                                    </div>
                                </div>
                            </div>

                           

                            
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2 col-xs-2" style="padding-left: 45px">
                                        <h6>Photo :</h6>
                                    </div>
                                    <div class="col-md-5 col-xs-10"> 
                                
                                          <div class="preview_box">
                                            <?php 
                                                if($fetch['Photo']=="")
                                                {
                                            ?>
                                            <img id="preview_img"  src="../images/No-image-full.jpg" height="100" width="100" disabled/>
                                            <?php }
                                                else
                                                {
                                             ?>
                                                <img id="preview_img"  src="../images/user/<?php echo $fetch['Photo']?>" height="100" width="100" disabled/>

                                                <?php } ?>

                                          </div>

                                              
                                        
                                        
                                    
                                    </div>
                                </div>
                            </div>
                                        

                            <div class="row">
                                    <div class="col-md-4 col-xs-2"></div>
                                    <div class="col-md-5 col-xs-10" >
                                        <a href="profile_update.php"><button type="button" class="btn btn-primary" name="update">Edit</button>
                                       <!--  <a href="javascript:history.back()"><button type="button" class="btn btn-danger" name="cancel">Cancel</button></a> -->
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

            