
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin Login</title>
  <link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.min.css" />
  <link rel="stylesheet" href="../node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css" />
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="shortcut icon" href="../images/favicon.png" />
  
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
</head>

<body>

<?php

  if(isset($_POST['login']))
  {
    extract($_POST);
    include 'config.php';
    
    
    $log=mysqli_query($connect,"select * from admin where Email='$email' and Password='$password'") or die (mysqli_error($connect));
      
    if(mysqli_num_rows($log)>0)
    {
      $fetch=mysqli_fetch_array($log);
      session_start();
      
      $_SESSION['email']=$fetch['Email'];
      // $_SESSION['name']=$fetch['Name'];
      // $_SESSION['ward']=$fetch['Ward'];
      // $_SESSION['photo']=$fetch['Photo'];
      
      echo "<script>";
            echo "alert('Login successfull');";
            echo 'window.location.href="profile.php";';
            echo "</script>";
        }else
        {
            echo "<script>";
            echo "alert('Access Denied!!!');";
            echo "</script>";
            
        }
    
  }?>

  <div class="container-scroller">
    <div class="container-fluid">
      <div class="row">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center">
          <div class="card col-lg-4 offset-lg-4">
            <div class="card-block">
              <h3 class="card-title text-primary text-left mb-5 mt-4">Admin Login</h3>
              <form method="post" autocomplete="off">
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="email" class="form-control p_input" placeholder="Email" name="email">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password" class="form-control p_input" placeholder="Password" name="password">
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary" name="login">Login</button>
                  <a href="../../web/index.php"><button type="button" class="btn btn-success" name="home">Back</button></a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

 <!--  <script src="../node_modules/jquery/dist/jquery.min.js"></script> -->
  <script src="../node_modules/tether/dist/js/tether.min.js"></script>
  <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="../node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js"></script>
  <script src="../js/misc.js"></script>
</body>

</html>