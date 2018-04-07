<?php
$searchitem=$_REQUEST["si"];
//Gear host credentials for the gearhost sql server
$conn=new mysqli("den1.mysql1.gear.host","khdms","Hw5Gp!!a0KVQ","khdms");
//Local host credentials for localhost sql server
//$conn=new mysqli("localhost","root","","khdms");

if($conn->connect_error){
	die("A problem occured");
}
else{
	$sql = "SELECT * FROM patients WHERE pat_name like '%$searchitem%' OR pat_natid like '%$searchitem%' OR pat_nhifid like '%$searchitem%' OR pat_phoneno like '%$searchitem%' OR pat_email like '%$searchitem%'";
	$result = $conn->query($sql);
	if($result->num_rows>0){
	while($row = $result->fetch_assoc()){
	echo "<a class=\"list-group-item\" href=\"patientFile.php?patient=".$row['pat_id']."\">".$row['pat_name']." | ID: ".$row['pat_natid']."</a>" ;
	}
	}
	else{
	echo '<div class="alert alert-dismissible alert-danger">
                <strong>No result found!</strong> 
              </div>';
	}
}
?>