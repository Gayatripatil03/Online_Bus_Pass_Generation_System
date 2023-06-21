
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Registration</title>
  <link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.min.css" />
  <link rel="stylesheet" href="../node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css" />
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="shortcut icon" href="../images/favicon.png" />
  <script src="../node_modules/jquery/dist/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">

  <style>

#frmCheckUsername {border-top:#F0F0F0 2px solid;background:#FAF8F8;padding:10px;}
.demoInputBox{padding:7px; border:#F0F0F0 1px solid; border-radius:4px;}
.status-available{color:#2FC332;}
.status-not-available{color:#D60202;}
</style>


  
</head>

<body>

  <?php
include 'config.php';
if(isset($_POST['submit']))
{
 extract($_POST);

 $name2=$_FILES['aadhar_card_photo']['name'];
  $type=$_FILES['aadhar_card_photo']['type'];
  $size=$_FILES['aadhar_card_photo']['size'];
  $temp=$_FILES['aadhar_card_photo']['tmp_name'];
  if($name){
 $upload= "../images/aadhar_card_photo/";
            $imgExt=strtolower(pathinfo($name2, PATHINFO_EXTENSION));
            $valid_ext= array('jpg','png','jpeg' );
            $aadhar_card_photo= rand(1000,1000000).".".$imgExt;
            // unlink($upload.$fetch['Aadhar_card_photo']);
            move_uploaded_file($temp,$upload.$aadhar_card_photo);
  }
  // else
  // {
  //     $aadhar_card_photo=$fetch['Aadhar_card_photo'];
  //     }

  $name1=$_FILES['bonafide']['name'];
  $type=$_FILES['bonafide']['type'];
  $size=$_FILES['bonafide']['size'];
  $temp1=$_FILES['bonafide']['tmp_name'];
  if($name){
 $upload= "../images/bonafide/";
            $imgExt=strtolower(pathinfo($name1, PATHINFO_EXTENSION));
            $valid_ext= array('jpg','png','jpeg' );
            $bonafide= rand(1000,1000000).".".$imgExt;
            //unlink($upload.$fetch['Bonafide']);
            move_uploaded_file($temp1,$upload.$bonafide);
  }
  // else
  // {
  //     $bonafide=$fetch['Bonafide'];
  //     }
 
 
  $add=mysqli_query($connect,"insert into user( Name, Address, Email, Mobile, Dob, Gender, User_type, Aadhar_card_no, Aadhar_card_photo, Bonafide, Username, Password) 
    values('$name','$address','$email','$mobile','$dob','$gender','$user_type','$aadhar_card_no', '$aadhar_card_photo', '$bonafide','$username','$password')") or die(mysqli_error($connect));
  
 
  if($add)
 

          { echo "<script>";
                echo "alert('Registration successfull');";
                echo 'window.location.href="index.php";';
                echo "</script>";
          }
          else
          {
                echo "<script>";
                echo "alert('Error in registration');";
                echo "window.location.href='register.php';";
                echo "</script>";
          }
}

?>

  <div class="container-scroller">
    <div class="container-fluid">
      <div class="row">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center">
          <div class="card col-lg-4 offset-lg-4">
            <div class="card-block">
              <h3 class="card-title text-primary text-left mb-5 mt-4">Register</h3>
              <form method="POST" enctype="multipart/form-data" autocomplete="off">

                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" class="form-control " placeholder="Name" name="name" required="">
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                      <textarea name="address" class="form-control" id="address" placeholder="Address" required=""></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope-open"></i></span>
                    <input type="email" class="form-control " placeholder="Email" name="email" required="">
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                    <input type="text" class="form-control " placeholder="Mobile Number" name="mobile" maxlength="10" pattern="[0-9]{10}" required="" >
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    <input type="text" placeholder="Birthdate" class="form-control " name="dob" id="dob" required="">
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="gender" id="gender" value="Male" style="padding-right: : 50px;" required="">
                        Male
                      </label>

                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="gender" id="gender" value="Female" >
                        Female
                      </label>
                    
                  </div>
                </div>


                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-list-ul"></i></span>
                      <select name="user_type" class="form-control" id="user_type" required="">
                        <option value="">Select Type</option>
                        <option value="Student">Student</option>
                        <option value="Public">Public</option>
                        <option value="Public">Employee</option>
                      </select>
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-info"></i></span>
                    <input type="text" class="form-control " placeholder="Aadhar card Number" name="aadhar_card_no" id="aadhar_card_no" maxlength="12" pattern="[0-9]{12}" required="" onkeyup="checkAvailability1()">
                    
                    <p id="user-availability-status1"></p>
                    <p  id="loaderIcon1" style="display:none" ></p>
                  </div>
                </div>

<script type="text/javascript">
    function checkAvailability1() {
$("#loaderIcon1").show();
jQuery.ajax({
url: "aadharnoexist.php",
data:'aadhar_card_no='+$("#aadhar_card_no").val(),
type: "POST",
success:function(data){
$("#user-availability-status1").html(data);
$("#loaderIcon1").hide();
},
error:function (){}
});
}

  </script>                

                <div class="form-group">
                  <div class="input-group">
                    <span><label>AadharCardFile:  </label></span>
                    <input type="file" id="aadhar_card_photo" name="aadhar_card_photo" class="fileinput" required="" style="padding-left: 20px;" accept=".pdf, .png, .jpg, .jpeg" />
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group">
                    <span><label>Bonafide/EmployeeID  </label></span>
                    <input type="file" id="bonafide" name="bonafide" class="fileinput" required="" style="padding-left: 20px;" accept=".pdf, .png, .jpg, .jpeg" />
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" placeholder="Your Username" class="form-control " name="username" id="username" onkeyup="checkAvailability()" required><br><br><br><span id="user-availability-status"></span><br>
                        <p  id="loaderIcon" style="display:none" ></p>
                  </div>
                </div>

<script type="text/javascript">
    function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "userexist.php",
data:'username='+$("#username").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}

  </script>                

                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                    <input type="password" class="form-control " placeholder="Password" name="password"  required >
                  </div>
                </div>
                
                <div class="text-center">
                  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                  <a href="index.php"><button type="button" class="btn btn-danger" name="login">Login</button></a>
                  <a href="../../web/index.php"><button type="button" class="btn btn-success" name="home">Back</button></a>

                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  

  <script src="../node_modules/tether/dist/js/tether.min.js"></script>
  <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="../node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js"></script>
  <script src="../js/misc.js"></script>
  <!-- <script src="assets/js/bootstrap.js"></script>
  
  <script src="assets/js/bootstrap-fileupload.js"></script>
  
  <script src="assets/js/jquery.metisMenu.js"></script>
  
  <script src="assets/js/custom.js"></script> -->

   
  

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
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


      
</body>

</html>