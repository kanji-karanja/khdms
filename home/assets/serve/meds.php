<?php
require 'credentials.php';
$disease = $_GET['dis'];
$sqlmed="SELECT * FROM medication WHERE medication_treats='$disease'";
$resultmed=$conn->query($sqlmed);
if($resultmed->num_rows>0){
	while ($rowmed=$resultmed->fetch_assoc()) {
	echo "<option  value='".$rowmed['medication_id']."'>".$rowmed['medication_name']."</option>";
	$meds .= "<option  value=/'".$rowmed['medication_id']."/'>".$rowmed['medication_name']."</option>";
	}
	}
else{
	echo "<option value='0'>No medication record</option>";
	$meds = "<option value=/'0/'>No medication record</option>";
}
?>