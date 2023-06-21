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
        include "config.php";
        $disp=mysqli_query($connect,"select * from pass_details where Aadhar_card_no ='".$_SESSION['aadhar_card_no']."'  ") or die(mysqli_error($connect));

?> 

   


                <div class="content-wrapper">
                    <h3 class="text-primary mb-4">Pass Details</h3>
                    

                    <div class="row mb-2">
                        <div class="col-md-12 col-xs-12">
                            <div class="card">
                                <div class="card-block">
                                    <!-- <h5 class="card-title mb-4">Advanced Table</h5> -->
                                    <div class="table-responsive">
                                        <table id="example" class="table table-hover" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Sr.No</th>                  
                                                    <th>Name</th>
                                                    <th>Aadhar Card</th>
                                                    <th>Month</th>
                                                    <th>Date</th>
                                                    <th>Route</th>
                                                    <th>Amount</th>
                                                    <th>Status</th>
                                                    <th>Action</th>

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
                                                        
                                                        <td><?php echo $fetch['Name'];?></td>
                                                        <td><?php echo $fetch['Aadhar_card_no'];?></td>
                                                        <td><?php echo $fetch['Month'];?></td>
                                                        <td><?php echo $fetch['From_date'];?> - <?php echo $fetch['To_date'];?></td>
                                                        <td><?php echo $fetch['From_stop'];?> - <?php echo $fetch['To_stop'];?></td>
                                                        
                                                        
                                                        <td><?php echo $fetch['Pass_amount'];?></td>
                                                        <td><?php echo $fetch['Status'];?></td>
                                                        
                                            
                                                        <td><a href="pass_view.php?id=<?=$id ?>" class="fa fa-eye fa-2x text-info" type="submit" name="view"  data-placement="bottom" title="view" data-toggle="tooltip" ></a>

                                                    <?php 
                                                        if($Status=='approved')
                                                        {
                                                    ?>
                                                            <a href="print_pass.php?id=<?=$id ?>" class="fa fa-print fa-2x text-warning" type="button" name="print_pass"  data-placement="bottom" title="print" data-toggle="tooltip" style="padding-left:5px">
                                                    <?php 
                                                        }
                                                        else
                                                        {
                                                    ?>
                                                                                                            
                                                        <a href="pass_delete.php?id=<?=$id ?>"  onclick="return confirm('Are you sure you want to delete this item?');"  class="fa fa-trash-o fa-2x text-danger" type="submit" name="delete" style="padding-left:10px" data-placement="bottom" title="delete" data-toggle="tooltip"></a>
                                                    <?php
                                                        }
                                                    ?>

                                                    </td>
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
            