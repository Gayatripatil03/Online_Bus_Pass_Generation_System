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
     <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
</head>

<body>


    
    <div class=" container-scroller">
        <?php
    
    
        include 'config.php';
        
        $select=mysqli_query($connect,"select * from user where Username='".$_SESSION['username']."' ") or die(mysqli_error($connect));
        $fetch=mysqli_fetch_array($select);
    
?> 

 <nav class="navbar bg-primary-gradient col-lg-12 col-12 p-0 fixed-top navbar-inverse d-flex flex-row">
            <div class="bg-white text-center navbar-brand-wrapper">
                <a class="navbar-brand brand-logo" href="profile.php"><span style="font-size: 20px;">Online Bus Pass</span></a>
                <a class="navbar-brand brand-logo-mini" href="profile.php"><span style="font-size: 20px;">OBS</span></a>
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
                        <a class="nav-link profile-pic" href="profile.php"><img class="rounded-circle" src="../images/user/<?php echo $fetch['Photo']?>" alt=""></a>
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

                        <img src="../images/user/<?php echo $fetch['Photo']?>" alt="">
                    <?php 
                    }
                    ?>
                    <p class="name"><?php echo $fetch['Name'];?></p>
                    <p class="designation"><?php echo $fetch['Email'];?></p>

                    <p class="designation"><?php echo $fetch['User_type'];?></p>
                    <span class="online"></span>
                </div>
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="profile.php">
                                
                                <img src="../images/icons/pro.png" alt="">
                                <span class="menu-title">Profile</span>
                            </a>
                        </li>
                       

                        <li class="nav-item">
                            <a class="nav-link" href="pass_details_add.php">
                                <img src="../images/icons/edit.png" alt="">
                                <span class="menu-title">Create Pass</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="pass_details_view.php">
                                <img src="../images/icons/13.png" alt="">
                                <span class="menu-title">View Pass</span>
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
                        <li class="nav-item ">
                            
                                <a class="nav-link " href="logout.php">
                                    <img  src="../images/icons/11.png" alt="">
                                    <span class="menu-title ">Logout</span>
                                </a>
                            
                        </li>
                        
                       
                    </ul>
                </nav>
