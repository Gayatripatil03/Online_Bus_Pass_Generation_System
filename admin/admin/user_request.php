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
    <title>User Request</title>
    <link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="shortcut icon" href="../images/favicon.png" />
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
</head>

<body>
    <div class=" container-scroller">
          <!--Start Navbar -->
            <?php include "navbar.php";?>
        <!--End navbar-->
        
        <div class="container-fluid">
            <div class="row row-offcanvas row-offcanvas-right">
                 <!-- START SIDEBAR  -->
                    <?php include "sidebar.php";?>
                <!-- ENDS SIDEBAR  -->


                <div class="content-wrapper">
                    <h3 class="text-primary mb-4">User Request</h3>
 <?php
        include "config.php";
        $disp=mysqli_query($connect,"select * from user_request ") or die(mysqli_error($connect));

?>                    

                    <div class="row mb-2">
                        <div class="col-md-12 col-xs-12">
                            <div class="card">
                                <div class="card-block">
                                    <!-- <h5 class="card-title mb-4">Advanced Table</h5> -->
                                    <div class="table-responsive">
                                        <table id="example" class="table table-hover" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Sr NO</th>
                                                    <th>User Request</th>
                                                    <th>User ID</th>
                                                    <th>User Name</th>
                                                    <th>Country</th>
                                                    <th>File Type</th>
                                                    <th>Amount</th>
                                                    <th>Status</th>

                                                </tr>
                                            </thead>

                                            <tbody>

                                                <?php
                                                    $count=0;
                                                    while ($fetch=mysqli_fetch_array($disp))
                                                     {
                                                            extract($fetch);


                                                ?> 
                                                    <tr>
                                                        <td><?php echo ++$count;?></td>
                                                        <td><?php echo $fetch['id'];?></td>
                                                        <td><?php echo $fetch['User_id'];?></td>
                                                        <td><?php echo $fetch['User_name'];?></td>
                                                        <td><?php echo $fetch['Country'];?></td>
                                                        <td><?php echo $fetch['File_type'];?></td>
                                                        <td><?php echo $fetch['File_amount'];?></td>
                                                    <?php if($fetch['Status']=="Request Available"){?>
                                                        
                                                        <td><span class="text-info"> <?php echo $fetch['Status'];?></span></td>

                                                    <?php } else { ?>
                                                        
                                                        <td><span class="text-success"> <?php echo $fetch['Status'];?></span></td>

                                                    <?php } ?>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                

               <!-- start footer -->
                    <?php include "footer.php";?>
                <!-- end footer -->
            </div>
        </div>

    </div>

    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/tether/dist/js/tether.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../node_modules/chart.js/dist/Chart.min.js"></script>
    <script src="../node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js"></script>
    <script src="../js/off-canvas.js"></script>
    <script src="../js/hoverable-collapse.js"></script>
    <script src="../js/misc.js"></script>

<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function(){
    $('#example').dataTable();
});
</script>
</body>

</html>