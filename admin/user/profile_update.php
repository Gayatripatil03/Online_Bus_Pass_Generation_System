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
                      <!-- <h5 class="card-title mb-4">Basic form elements</h5> -->
                      	<form method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2 col-xs-2" style="padding-left: 45px">
                                        <h6>Name :</h6>
                                    </div>
                                    <div class="col-md-5 col-xs-10"> 
                                
                                        <input type="text" class="form-control p-input" id="name" placeholder="Name" name="name" value="<?php echo $fetch['Name']; ?>" required>
                                    
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

                                        <textarea class="form-control p-input" name="address" required><?php echo $fetch['Address']; ?></textarea>
                                        
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
                                
                                        <input type="email" class="form-control p-input" id="email" placeholder="Email" name="email" value="<?php echo $fetch['Email']; ?>" required>
                                    
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
                                    
                                        <input type="text" class="form-control p_input" placeholder="Mobile Number" name="mobile" maxlength="10" pattern="[0-9]{10}" value="<?php echo $fetch['Mobile'] ?>" required >
                                        
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

                                        <input type="text" placeholder="Birthdate" class="form-control p_input" name="dob" id="dob" value="<?php echo $fetch['Dob']; ?>" required>
                                        
                                    </div>
                                </div>
                            </div>

<script>
  $(document).ready(function(){
    var date_input=$('input[name="dob"]'); //our date input has the name "date"
    var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
    date_input.datepicker({
      format: 'yyyy/mm/dd',
      container: container,
      todayHighlight: true,
      autoclose: true,
    })
  })
</script>                            

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2 col-xs-2" style="padding-left: 45px">
                                    <h6>Gender :</h6>
                                    </div>
                                    <div class="col-md-5 col-xs-10"> 

                                        <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="gender" id="gender" value="Male"<?php if($fetch['Gender']=="Male") { echo "checked";}?> style="padding-right: : 50px;" required>Male
                                        </label>

                                        <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="gender" id="gender" value="Female" <?php if($fetch['Gender']=="Female") { echo "checked";}?> required>Female
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

                                    <input type="text" class="form-control p-input" value="<?php echo $fetch['User_type']; ?>" name="user_type" required>

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

                                      <input type="text" class="form-control p-input" value="<?php echo $fetch['Aadhar_card_no']; ?>" name="aadhar_card_no" required>
                                        
                                    </div>
                                </div>
                            </div>

<script type="text/javascript">
    $(document).ready(function(){
        //Image file input change event
        $("#aadhar_card_photo").change(function(){
            readImageData1(this);//Call image read and render function
        });
    });
     
    function readImageData1(imgData){
        if (imgData.files && imgData.files[0]) {
            var readerObj = new FileReader();
            
            readerObj.onload = function (element) {
                $('#preview_img1').attr('src', element.target.result);
            }
            
            readerObj.readAsDataURL(imgData.files[0]);
        }
    }
</script>

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
                                            <img id="preview_img1" src="../images/No-image-full.jpg" height="100" width="100" required/>
                                            <?php }
                                                else
                                                {
                                             ?>
                                                <img id="preview_img1" src="../images/aadhar_card_photo/<?php echo $fetch['Aadhar_card_photo'];?>"  height="100" width="100">

                                                <?php } ?>
                                        
                                          </div>

                                                <input type="file" id="aadhar_card_photo" name="aadhar_card_photo" class="fileinput" />
                                    
                                    </div>
                                </div>
                            </div>

 <script type="text/javascript">
    $(document).ready(function(){
        //Image file input change event
        $("#bonafide").change(function(){
            readImageData2(this);//Call image read and render function
        });
    });
     
    function readImageData2(imgData){
        if (imgData.files && imgData.files[0]) {
            var readerObj = new FileReader();
            
            readerObj.onload = function (element) {
                $('#preview_img2').attr('src', element.target.result);
            }
            
            readerObj.readAsDataURL(imgData.files[0]);
        }
    }
</script> 

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
                                            <img  id="preview_img2" src="../images/No-image-full.jpg" height="100" width="100" required/>
                                            <?php }
                                                else
                                                {
                                             ?>
                                                <img id="preview_img2" src="../images/bonafide/<?php echo $fetch['Bonafide'];?>" height="100" width="100">

                                                <?php } ?>
                                          </div>

                                                <input type="file" id="bonafide" name="bonafide" class="fileinput" />
                                        
                                    
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

                                    <input type="text" class="form-control p-input"  value="<?php echo $fetch['Username']; ?>" name="username" readonly required>

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
                                            <img id="preview_img"  src="../images/No-image-full.jpg" height="100" width="100" required/>
                                            <?php }
                                                else
                                                {
                                             ?>
                                                <img id="preview_img"  src="../images/user/<?php echo $fetch['Photo']?>" height="100" width="100" required/>

                                                <?php } ?>

                                          </div>

                                                <input type="file" id="image" name="photo" class="fileinput" />
                                        
                                        
                                    
                                    </div>
                                </div>
                            </div>
                                        

                            <div class="row">
                                    <div class="col-md-4 col-xs-2"></div>
                                    <div class="col-md-5 col-xs-10" >
                                        <button type="submit" class="btn btn-primary" name="update">Update</button>
                                        <a href="javascript:history.back()"><button type="button" class="btn btn-danger" name="cancel">Cancel</button></a>
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
 

 
  $name3=$_FILES['photo']['name'];
  $type=$_FILES['photo']['type'];
  $size=$_FILES['photo']['size'];
  $temp3=$_FILES['photo']['tmp_name'];
  if($name3){
 $upload= "../images/user/";
            $imgExt=strtolower(pathinfo($name3, PATHINFO_EXTENSION));
            $valid_ext= array('jpg','png','jpeg' );
            $photo= rand(1000,1000000).".".$imgExt;
            unlink($upload.$fetch['Photo']);
            move_uploaded_file($temp3,$upload.$photo);
  }
  else
  {
      $photo=$fetch['Photo'];
      }

  $name2=$_FILES['aadhar_card_photo']['name'];
  $type=$_FILES['aadhar_card_photo']['type'];
  $size=$_FILES['aadhar_card_photo']['size'];
  $temp2=$_FILES['aadhar_card_photo']['tmp_name'];
  if($name2){
 $upload= "../images/aadhar_card_photo/";
            $imgExt2=strtolower(pathinfo($name2, PATHINFO_EXTENSION));
            $valid_ext2= array('jpg','png','jpeg' );
            $aadhar_card_photo= rand(1000,1000000).".".$imgExt2;
            unlink($upload.$fetch['Aadhar_card_photo']);
            move_uploaded_file($temp2,$upload.$aadhar_card_photo);
  }
  else
  {
      $aadhar_card_photo=$fetch['Aadhar_card_photo'];
      }

  $name1=$_FILES['bonafide']['name'];
  $type=$_FILES['bonafide']['type'];
  $size=$_FILES['bonafide']['size'];
  $temp1=$_FILES['bonafide']['tmp_name'];
  if($name1){
 $upload= "../images/bonafide/";
            $imgExt1=strtolower(pathinfo($name1, PATHINFO_EXTENSION));
            $valid_ext1= array('jpg','png','jpeg' );
            $bonafide= rand(1000,1000000).".".$imgExt1;
            unlink($upload.$fetch['Bonafide']);
            move_uploaded_file($temp1,$upload.$bonafide);
  }
  else
  {
      $bonafide=$fetch['Bonafide'];
      }   
       
 $update=mysqli_query($connect,"update user set
            Name='".$_POST['name']."',
            Address='".$_POST['address']."',
            Email='".$_POST['email']."',
            Mobile='".$_POST['mobile']."',
            Gender='".$_POST['gender']."',
            Dob='".$_POST['dob']."',
            User_type='".$_POST['user_type']."',
            Aadhar_card_no='".$_POST['aadhar_card_no']."',
            Aadhar_card_photo='".$aadhar_card_photo."',
            Bonafide='".$bonafide."',
            Photo='".$photo."'
            where Username='".$_SESSION['username']."' ") or die(mysqli_error($connect));

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

            