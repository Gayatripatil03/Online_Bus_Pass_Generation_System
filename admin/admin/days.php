<?php
if(isset($_POST["month"])){
    
	 $str = $_POST['month'];
				
     include "config.php"; 
?>
<!-- <option value="">Select To Days</option> -->
<?php
	   $select1=mysqli_query($connect,"select Days from days_detail where  Month='".$str."'") or die(mysqli_error($connect));
	 while($sele1=mysqli_fetch_array($select1))
{	

	echo"<option value=\"{$sele1['Days']}\">{$sele1['Days']}</option>";
	// echo $sele1['Amount'];

	}	 
		
}?>