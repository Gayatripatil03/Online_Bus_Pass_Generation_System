 <link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="shortcut icon" href="../images/favicon.png" />
    
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
   <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>


    <style>
        .form_box{width:500px; margin:0 auto; margin-top:10px; margin-bottom: 40px; text-align: left;}
        .fileinput{margin-left:0px;}
        .preview_box{clear: both; padding: 5px; margin-top: 10px; text-align:left;}
        .preview_box img{max-width: 150px; max-height: 150px;}
    </style>
</head>

<body>


    
    <div class=" container-scroller">
        <?php
    
    
        include 'config.php';
        
        $select=mysqli_query($connect,"select * from admin where Email='".$_SESSION['email']."' ") or die(mysqli_error($connect));
        $fetch=mysqli_fetch_array($select);
    
?> 

 <nav class="navbar bg-primary-gradient col-lg-12 col-12 p-0 fixed-top navbar-inverse d-flex flex-row">
            <div class="bg-white text-center navbar-brand-wrapper">
                <a class="navbar-brand brand-logo" href="profile.php"><span style="font-size: 20px;">Online Bus Pass</span></a>
                <a class="navbar-brand brand-logo-mini" href="profile.php"><span style="font-size: 20px;">OBP</span></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center">
                <button class="navbar-toggler navbar-toggler hidden-md-down align-self-center mr-3" type="button" data-toggle="minimize">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <!-- <form class="form-inline mt-2 mt-md-0 hidden-md-down">
                    <input class="form-control mr-sm-2 search" type="text" placeholder="Search">
                </form> -->
                <ul class="navbar-nav ml-lg-auto d-flex align-items-center flex-row">
                    <li class="nav-item">
                        <a class="nav-link profile-pic" href="profile.php"><img class="rounded-circle" src="../images/admin/<?php echo $fetch['Photo']?>" alt=""></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php"><?php echo $fetch['Name'];?></a>
                    </li>
                    
                     <li class="nav-item">
                        <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i></a>
                    </li>
                     
                </ul>
                <button class="navbar-toggler navbar-toggler-right hidden-lg-up align-self-center" type="button" data-toggle="offcanvas">
                  <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>

         <div class="container-fluid">
            <div class="row row-offcanvas row-offcanvas-right">
                 <?php
    
    
        include 'config.php';
        
        $select=mysqli_query($connect,"select * from admin where Email='".$_SESSION['email']."' ") or die(mysqli_error($connect));
        $fetch=mysqli_fetch_array($select);
    
?> 

<nav class="bg-white sidebar sidebar-fixed sidebar-offcanvas" id="sidebar">
                <div class="user-info">
                    <?php
                    if($fetch['Photo']=="")
                    {
                    ?>
                        <img src="../images/default.png" alt="">
                    <?php
                    }
                    else
                    {
                    ?>

                        <img src="../images/admin/<?php echo $fetch['Photo']?>" alt="">
                    <?php 
                    }
                    ?>
                    <p class="name"><?php echo $fetch['Name'];?></p>
                    <p class="designation"><?php echo $fetch['Email'];?></p>
                    <p class="designation">Admin</p>
                    <span class="online"></span>
                </div>
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="profile.php">
                                
                                <img src="../images/icons/pro.png" alt="">
                                <span class="menu-title">Profile</span>
                            </a>
                        </li>
                       

<?php
 include "config.php";
$count=0;
$result=mysqli_query($connect,"select * from user where Status ='Not_approved' and Status_id=0 and User_type='Student' ") or die(mysqli_error($connect));

$count=mysqli_num_rows($result);

?>                            
    
    
    <script type="text/javascript">

    function myFunction() {
        $.ajax({
            url: "user_notification.php",
            type: "POST",
            processData:false,
            success: function(data){
                $("#notification-count").remove();                  
                $("#notification-latest").show();$("#notification-latest").html(data);
            },
            error: function(){}           
        });
     }
     
     $(document).ready(function() {
        $('body').click(function(e){
            if ( e.target.id != 'notification-icon'){
                $("#notification-latest").hide();
            }
        });
    });
         
    </script>
                            
                        
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#student" aria-expanded="false" aria-controls="student">
                                
                                <img src="../images/icons/26.png" alt="">
                                <span class="menu-title">Student Details<i class="fa fa-sort-down"></i>
                                  <span id="notification-icon" onClick="myFunction()" ><span id="notification-count" style="color:red;  font-size:14px"><?php if($count>0) { echo "new" ;}?></span></span>  

                                 <span>
                                
                            </a>
                            <div class="collapse" id="student">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item">
                                        <a class="nav-link" href="student_registered.php">
                                      
                                      <span id="notification-icon" onClick="myFunction()" >Registered Student<span id="notification-count" style="color:red;padding-left: 10px;  font-size:14px"><?php if($count>0) { echo "+". $count; } ?></span></span>
                                    </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="student_approved.php">
                                      Approved Student
                                    </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="student_disapproved.php">
                                      Disapproved Student
                                    </a>
                                    </li>
                                  
                                </ul>
                            </div>
                        </li>

<?php
 include "config.php";
$count1=0;
$result1=mysqli_query($connect,"select * from user where Status ='Not_approved' and Status_id=0 and User_type='Public' ") or die(mysqli_error($connect));

$count1=mysqli_num_rows($result1);

?>                            
    
    
    <script type="text/javascript">

    function myFunction1() {
        $.ajax({
            url: "user_notification.php",
            type: "POST",
            processData:false,
            success: function(data){
                $("#notification-count1").remove();                  
                $("#notification-latest1").show();$("#notification-latest1").html(data);
            },
            error: function(){}           
        });
     }
     
     $(document).ready(function() {
        $('body').click(function(e){
            if ( e.target.id != 'notification-icon1'){
                $("#notification-latest1").hide();
            }
        });
    });
         
    </script>
                            
                        
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#public" aria-expanded="false" aria-controls="public">
                                
                                <img src="../images/icons/26.png" alt="">
                                <span class="menu-title">User Details<i class="fa fa-sort-down"></i>
                                  <span id="notification-icon" onClick="myFunction1()" ><span id="notification-count" style="color:red;  font-size:14px"><?php if($count1>0) { echo "new" ;}?></span></span>  

                                 <span>
                                
                            </a>
                            <div class="collapse" id="public">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item">
                                        <a class="nav-link" href="user_registered.php">
                                      
                                      <span id="notification-icon1" onClick="myFunction1()" >Registered User<span id="notification-count1" style="color:red;padding-left: 10px;  font-size:14px"><?php if($count1>0) { echo "+". $count1; } ?></span></span>
                                    </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="user_approved.php">
                                      Approved User
                                    </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="user_disapproved.php">
                                      Disapproved User
                                    </a>
                                    </li>
                                  
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#from_stop" aria-expanded="false" aria-controls="from_stop">
                                <!-- <i class="fa fa-address-book"></i> -->
                                <img src="../images/icons/30.png" alt="">
                                <span class="menu-title">From Stop<i class="fa fa-sort-down"></i></span>
                            </a>
                            <div class="collapse" id="from_stop">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item">
                                        <a class="nav-link" href="from_stop_add.php">
                                      Add From Stop
                                    </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="from_stop_view.php">
                                      View From Stop
                                    </a>
                                    </li>
                                  
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#to_stop" aria-expanded="false" aria-controls="to_stop">
                                <!-- <i class="fa fa-address-book"></i> -->
                                <img src="../images/icons/30.png" alt="">
                                <span class="menu-title">To Stop<i class="fa fa-sort-down"></i></span>
                            </a>
                            <div class="collapse" id="to_stop">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item">
                                        <a class="nav-link" href="to_stop_add.php">
                                      Add To Stop
                                    </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="to_stop_view.php">
                                      View To Stop
                                    </a>
                                    </li>
                                  
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#pass_amount_details" aria-expanded="false" aria-controls="pass_amount_details">
                                <!-- <i class="fa fa-address-book"></i> -->
                                <img src="../images/icons/edit.png" alt="">
                                <span class="menu-title">Pass Amount<i class="fa fa-sort-down"></i></span>
                            </a>
                            <div class="collapse" id="pass_amount_details">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item">
                                        <a class="nav-link" href="pass_amount_details_add.php">
                                      Add Pass Amount 
                                    </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="pass_amount_details_view.php">
                                      View Pass Amount 
                                    </a>
                                    </li>
                                  
                                </ul>
                            </div>
                        </li>

<?php
 include "config.php";
$count2=0;
$result2=mysqli_query($connect,"select * from pass_details where Status ='Requested' and Status_id=0 ") or die(mysqli_error($connect));

$count2=mysqli_num_rows($result2);

?>                            
    
    
    <script type="text/javascript">

    function myFunction2() {
        $.ajax({
            url: "pass_notification.php",
            type: "POST",
            processData:false,
            success: function(data){
                $("#notification-count2").remove();                  
                $("#notification-latest2").show();$("#notification-latest2").html(data);
            },
            error: function(){}           
        });
     }
     
     $(document).ready(function() {
        $('body').click(function(e){
            if ( e.target.id != 'notification-icon2'){
                $("#notification-latest2").hide();
            }
        });
    });
         
    </script>                        

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#pass_details" aria-expanded="false" aria-controls="pass_details">
                                <!-- <i class="fa fa-address-book"></i> -->
                                <img src="../images/icons/14.jpg" alt="">
                                <span class="menu-title">Pass Details<i class="fa fa-sort-down"></i>
                                  <span id="notification-icon2" onClick="myFunction2()" ><span id="notification-count2" style="color:red;  font-size:14px"><?php if($count2>0) { echo "new" ;}?></span></span>  

                                 <span>
                            </a>
                            <div class="collapse" id="pass_details">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item">
                                        <a class="nav-link" href="pass_request_available.php">
                                      
                                            <span id="notification-icon2" onClick="myFunction2()" >Available Request<span id="notification-count2" style="color:red;padding-left: 10px;  font-size:14px"><?php if($count2>0) { echo "+". $count2; } ?></span></span>
                                    </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="pass_request_approve.php">
                                      Approve Request 
                                    </a>
                                    </li>
                                     <li class="nav-item">
                                        <a class="nav-link" href="pass_request_disapprove.php">
                                      Disapprove Request 
                                    </a>
                                    </li>
                                  
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            
                                <a class="nav-link" href="message.php">
                                    <img src="../images/icons/23.png" alt="">
                                    <span class="menu-title">Message</span>
                                </a>
                            
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#setting" aria-expanded="false" aria-controls="setting">
                                <!-- <i class="fa fa-address-book"></i> -->
                                <img src="../images/icons/10.png" alt="">
                                <span class="menu-title">Setting<i class="fa fa-sort-down"></i></span>
                            </a>
                            <div class="collapse" id="setting">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item">
                                        <a class="nav-link" href="change_password.php">
                                      Change Password
                                    </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="profile.php">
                                      Profile
                                    </a>
                                    </li>
                                  
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            
                                <a class="nav-link" href="logout.php">
                                    <img src="../images/icons/11.png" alt="">
                                    <span class="menu-title">Logout</span>
                                </a>
                            
                        </li>
                        
                       
                    </ul>
                </nav>
