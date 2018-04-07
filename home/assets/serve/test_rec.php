<?php
require 'credentials.php';
$patient = $_GET['patient'];
$action = $_GET['action'];
//SELECT * FROM `test_rec` WHERE `test_recid``test_testid``test_recpatid``test_recpersid``test_recfacility``test_rec_date`
if($action==1){
$sqlrec="SELECT * FROM test_rec WHERE test_recpatid ='$patient' AND test_performed=0";
$resultrec=$conn->query($sqlrec);
if($resultrec->num_rows>0){
	echo "<option  value='0'>Please select one</option>";
	while ($rowrec=$resultrec->fetch_assoc()) {
	$testid=$rowrec['test_testid'];
	$sqltestname = "SELECT * FROM test WHERE test_id = '$testid'";
	$resultestname=$conn->query($sqltestname);
	if($resultestname->num_rows>0){
	while ($rowtestname=$resultestname->fetch_assoc()) {
		$testname=$rowtestname['test_name'];
	}
}
	echo "<option  value='".$rowrec['test_recid']."'>".$testname."</option>";
	}
}
else{
	echo "<option value='0'>No tests have been recommended</option>";
}
}
else if($action==2){
$test = $_GET['test'];
echo '<select class="form-control" name="testRec">';
if($test==1){
$sqltest="SELECT * FROM test WHERE test_for ='cancer'";
}
else if($test==1){
$sqltest="SELECT * FROM test WHERE test_for ='sickle'";
}
$resulttest=$conn->query($sqltest);
if($resulttest->num_rows>0){
	while ($rowtest=$resulttest->fetch_assoc()) {
	echo "<option  value='".$rowtest['test_id']."'>".$rowtest['test_name']."</option>";
	}
	}
else{
	echo "<option value='0'>No tests available</option>";
}
echo "</select>";
}

?>