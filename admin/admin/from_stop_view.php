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
    <title>View From Stop</title>
 <?php include "header.php";?>


<?php
        include "config.php";
        $disp=mysqli_query($connect,"select * from from_stop ") or die(mysqli_error($connect));

?> 

   


                <div class="content-wrapper">
                    <h3 class="text-primary mb-4">View From Stop</h3>
                    

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
                                                    <th>From Stop</th>
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
                                                        
                                                        <td><?php echo $fetch['From_stop'];?></td>
                                                        
                                                        
                                                        <td>
                                                            <a href="from_stop_update.php?id=<?=$id ?>" class="fa fa-pencil fa-2x text-success" type="submit" name="action" data-placement="bottom" title="edit" data-toggle="tooltip" ></a>

                                                       <a href="from_stop_delete.php?id=<?=$id ?>"  onclick="return confirm('Are you sure you want to delete this item?');"  class="fa fa-trash-o fa-2x text-danger" type="submit" name="delete" style="padding-left:10px" data-placement="bottom" title="delete" data-toggle="tooltip"></a></td>
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
            