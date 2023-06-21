<?php
if(isset($_POST["from_stop"])){
   
	 $str = $_POST['from_stop'];
				
     include "config.php"; 
?>
<option value="">Select To Stop</option>
<?php
	   $select1=mysqli_query($connect,"select distinct To_stop from pass_amount_details where  From_stop='".$str."'") or die(mysqli_error($connect));
	 while($sele1=mysqli_fetch_array($select1))
{	

	echo"<option value=\"{$sele1['To_stop']}\">{$sele1['To_stop']}</option>";
	

	}	 
		
}?>