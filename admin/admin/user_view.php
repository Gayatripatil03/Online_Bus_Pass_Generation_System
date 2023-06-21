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
    <title>User Profile</title>

    <?php include "header.php";?>

 <?php 
 include 'config.php';
  
  $select=mysqli_query($connect,"select * from user where id='".$_GET['id']."' ") or die(mysqli_error($connect));
 $fetch=mysqli_fetch_array($select);

?>
<div class="content-wrapper">
    <h3 class="text-primary mb-4">User Profile</h3>
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="card">
                <div class="card-block">
                    <!-- <h5 class="card-title mb-4">Basic form elements</h5> -->
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2 col-xs-2" style="padding-left: 45px">
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
                                    <div class="col-md-2 col-xs-2" style="padding-left: 45px">
                                      <h6>Address :</h6>
                                    </div>
                                    <div class="col-md-5 col-xs-10"> 

                                        <textarea class="form-control p-input" disabled><?php echo $fetch['Address']; ?></textarea>
                                        
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
                                
                                        <input type="email" class="form-control p-input" id="email" placeholder="Email" name="email" value="<?php echo $fetch['Email']; ?>" disabled>
                                    
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
                                    
                                        <input type="text" class="form-control p_input" placeholder="Mobile Number" name="mobile" maxlength="10" pattern="[0-9]{10}" value="<?php echo $fetch['Mobile'] ?>" disabled >
                                        
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

                                        <input type="text" placeholder="Birthdate" class="form-control p_input" name="dob" id="dob" value="<?php echo $fetch['Dob']; ?>" disabled>
                                        
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

                                        <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="gender" id="gender" value="Male"<?php if($fetch['Gender']=="Male") { echo "checked";}?> style="padding-right: : 50px;" disabled>Male
                                        </label>

                                        <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="gender" id="gender" value="Female" <?php if($fetch['Gender']=="Female") { echo "checked";}?> disabled>Female
                                        </label>

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

                                    <input type="text" class="form-control p-input" value="<?php echo $fetch['User_type']; ?>" disabled>

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

                                      <input type="text" class="form-control p-input" value="<?php echo $fetch['Aadhar_card_no']; ?>" disabled>
                                        
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
                                
                                        
                                            <?php 
                                                if($fetch['Aadhar_card_photo']=="")
                                                {
                                            ?>
                                            <img  src="../images/No-image-full.jpg" height="100" width="100" disabled/>
                                            <?php }
                                                else
                                                {
                                             ?>
                                                <img  src="../images/aadhar_card_photo/<?php echo $fetch['Aadhar_card_photo'];?>" height="100" width="100">

                                                <?php } ?>
                                        
                                        
                                    
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
                                
                                        
                                            <?php 
                                                if($fetch['Bonafide']=="")
                                                {
                                            ?>
                                            <img  src="../images/No-image-full.jpg" height="100" width="100" disabled/>
                                            <?php }
                                                else
                                                {
                                             ?>
                                                <img  src="../images/bonafide/<?php echo $fetch['Bonafide'];?>" height="100" width="100">

                                                <?php } ?>
                                        
                                        
                                    
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2 col-xs-2" style="padding-left: 45px">
                                    <h6>Username :</h6>
                                    </div>
                                    <div class="col-md-5 col-xs-10"> 

                                    <input type="text" class="form-control p-input"  value="<?php echo $fetch['Username']; ?>" disabled>

                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2 col-xs-2" style="padding-left: 45px">
                                      <h6>Password :</h6>
                                    </div>
                                    <div class="col-md-5 col-xs-10"> 

                                        <input type="text" class="form-control p-input"  value="<?php echo $fetch['Password']; ?>" disabled>
                                    
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
                                
                                        
                                            <?php 
                                                if($fetch['Photo']=="")
                                                {
                                            ?>
                                            <img  src="../images/No-image-full.jpg" height="100" width="100" disabled/>
                                            <?php }
                                                else
                                                {
                                             ?>
                                                <img  src="../images/user/<?php echo $fetch['Photo']?>" height="100" width="100" disabled/>

                                                <?php } ?>
                                        
                                        
                                    
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