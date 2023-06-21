<?php
if(isset($_POST["month"]) && isset($_POST["from_stop"]) && isset($_POST["to_stop"]) ){
    
	 $str = $_POST['month'];
	 $str1 = $_POST['from_stop'];
	 $str2 = $_POST['to_stop'];
				
  echo json_encode($str);

     include "config.php"; 


	
	   $select1=mysqli_query($connect,"select distinct Amount from pass_amount_details where From_stop='".$str1."'  and To_stop='".$str2."' and Month='".$str."'") or die(mysqli_error($connect));
	 while($sele1=mysqli_fetch_array($select1))
{	

	echo"<option value=\"{$sele1['Amount']}\">{$sele1['Amount']}</option>";
	 

	}	 
		
}?>