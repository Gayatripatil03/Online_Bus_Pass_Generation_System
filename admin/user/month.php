<?php
if(isset($_POST["to_stop"])){
    
	 $str = $_POST['to_stop'];
				
     include "config.php"; 


	  ?>
      <option value="">Select To Month</option>
	  <?php	
	
	   $select1=mysqli_query($connect,"select distinct Month from pass_amount_details where  To_stop='".$str."'") or die(mysqli_error($connect));
	 while($sele1=mysqli_fetch_array($select1))
{	

	echo"<option value=\"{$sele1['Month']}\">{$sele1['Month']}</option>";
	 
	}	 
		
}?>