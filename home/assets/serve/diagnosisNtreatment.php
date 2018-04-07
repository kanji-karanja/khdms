<?php
require 'credentials.php';
$patientid = $_GET['patient'];
$type = $_GET['type'];
if($type==1){
$sql="SELECT * FROM diagnosis where diagnosis_Patid = '$patientid'  ORDER BY diagnosis_date DESC";
$result=$conn->query($sql);
if($result->num_rows>0){
	while($row=$result->fetch_assoc()){
		$docid= $row["diagnosis_persid"];
		$diagfac= $row["diagnosis_facilid"];
		$sqldoc="SELECT * FROM personnel where personnel_id = '$docid'";
		$sqlfacility="SELECT * FROM facility where facility_id = '$diagfac'";
		$resultdoc = $conn->query($sqldoc);
		$resultfac = $conn->query($sqlfacility);
		if($resultdoc->num_rows>0){
			while ($rowdoc=$resultdoc->fetch_assoc()) {
				$docName = $rowdoc['personnel_name'];
			}
		}
		if($resultfac->num_rows>0){
			while ($rowfac=$resultfac->fetch_assoc()) {
				$facName = $rowfac['facility_name'];
			}
		}
		else{
			$facName="<span class='text-warning'>Doesn't exist in the records!</span>";
		}
		$diagnosis=$row['diagnosis_des'];
		$ddate=strtotime($row['diagnosis_date']);
		$diagnosisDate = date('h:i:sa d M Y',$ddate);
		$diagnosisDocName=$docName;
		$diagnosisDis = $row['diagnosis_for'];
		echo "<div class=\"list-group\">";
		echo '<a class="list-group-item"><h4 class="list-group-item-heading"><span class="text-danger">'.$diagnosis.'</span></h4><span class="badge">'.$diagnosisDis.'</span><p><strong> '.$diagnosisDate.'</strong></p>
                  <p class="list-group-item-text"><br><strong>Diagnosed by:</strong> '.$diagnosisDocName.'<strong><br>Facility:</strong> '.$facName.'<br></p></a>'; 
        echo "</div>";
	}
}
else{
	echo "<div class=\"list-group\">";
		echo '<a class="list-group-item"><h4 class="list-group-item-heading"><span class="text-warning">There is no diagnosis for this patient</span></h4><span class="badge">No diagnosis</span>
                  <p class="list-group-item-text">The patient has not been diagnosed yet</p></a>'; 
        echo "</div>";
}
}
else if($type==2){
	$sql="SELECT * FROM prescription where pres_patid = '$patientid' ORDER BY pres_date DESC";
$result=$conn->query($sql);
if($result->num_rows>0){
	while($row=$result->fetch_assoc()){
		$docid= $row["pres_persid"];
		$diagfac= $row["pres_facility"];
		$presName=$row['pres_medid'];
		$sqldoc="SELECT * FROM personnel where personnel_id = '$docid'";
		$sqlfacility="SELECT * FROM facility where facility_id = '$diagfac'";
		$sqldrug="SELECT * FROM medication WHERE medication_id='$presName'";
		$resultdoc = $conn->query($sqldoc);
		$resultfac = $conn->query($sqlfacility);
		$resultdosage = $conn->query($sqldrug);
		if($resultdosage->num_rows>0){
			while ($rowdos=$resultdosage->fetch_assoc()) {
				$prescription = $rowdos['medication_name'];
			}
		}
		if($resultdoc->num_rows>0){
			while ($rowdoc=$resultdoc->fetch_assoc()) {
				$docName = $rowdoc['personnel_name'];
			}
		}
		if($resultfac->num_rows>0){
			while ($rowfac=$resultfac->fetch_assoc()) {
				$facName = $rowfac['facility_name'];
			}
		}
		else{
			$facName="<span class='text-warning'>Doesn't exist in the records!</span>";
		}
		$dosage = $row['pres_dosage'];		
		$pdate=strtotime($row['pres_date']);
		$presDate = date('h:i:sa d M Y',$pdate);
		$diagnosisDocName=$docName;
		$diagnosisDis = $row['diagnosis_for'];
		echo "<div class=\"list-group\">";
		echo '<a class="list-group-item"><h4 class="list-group-item-heading"><span class="text-success">'.$prescription.'</span></h4><span class="badge">'.$dosage.'</span><p><strong> '.$presDate.'</strong></p>
                  <p class="list-group-item-text"><br><strong>Prescribed by:</strong> '.$diagnosisDocName.'<strong><br>Facility:</strong> '.$facName.'<br></p></a>'; 
        echo "</div>";
	}
}
else{
	echo "<div class=\"list-group\">";
		echo '<a class="list-group-item"><h4 class="list-group-item-heading"><span class="text-warning">There is no prescription for this patient</span></h4><span class="badge">No prescription</span>
                  <p class="list-group-item-text">The patient has not received any prescription yet</p></a>'; 
        echo "</div>";
}
}
else if($type==3){
	$sql="SELECT * FROM test_result WHERE test_patid='$patientid' ORDER BY test_date DESC";
$result=$conn->query($sql);
if($result->num_rows>0){
	while($row=$result->fetch_assoc()){
		$docid= $row["test_persid"];
		$diagfac= $row["test_facility"];
		$testName=$row['testres_id'];
		$sqldoc="SELECT * FROM personnel where personnel_id = '$docid'";
		$sqlfacility="SELECT * FROM facility where facility_id = '$diagfac'";
		$sqltest="SELECT * FROM test WHERE test_id='$testName'";
		$resultdoc = $conn->query($sqldoc);
		$resultfac = $conn->query($sqlfacility);
		$resulttest = $conn->query($sqltest);
		if($resulttest->num_rows>0){
			while ($rowdos=$resulttest->fetch_assoc()) {
				$test = $rowdos['test_name'];
			}
		}
		if($resultdoc->num_rows>0){
			while ($rowdoc=$resultdoc->fetch_assoc()) {
				$docName = $rowdoc['personnel_name'];
			}
		}
		if($resultfac->num_rows>0){
			while ($rowfac=$resultfac->fetch_assoc()) {
				$facName = $rowfac['facility_name'];
			}
		}
		else{
			$facName="<span class='text-warning'>Doesn't exist in the records!</span>";
		}
		$testResult = $row['test_result'];		
		$pdate=strtotime($row['test_date']);
		$testDate = date('h:i:sa d M Y',$pdate);
		$testDocName=$docName;
		//$diagnosisDis = $row['diagnosis_for'];
		echo "<div class=\"list-group\">";
		echo '<a class="list-group-item"><h4 class="list-group-item-heading"><span class="text-info">'.$testResult.'</span></h4><span class="badge">'.$test.'</span><p><strong> '.$testDate.'</strong></p>
                  <p class="list-group-item-text"><br><strong>Tested by:</strong> '.$testDocName.'<strong><br>Facility:</strong> '.$facName.'<br></p></a>'; 
        echo "</div>";
	}
}
else{
	echo "<div class=\"list-group\">";
		echo '<a class="list-group-item"><h4 class="list-group-item-heading"><span class="text-warning">There is no test result for this patient</span></h4><span class="badge">No test</span>
                  <p class="list-group-item-text">The patient has not been tested yet</p></a>'; 
        echo "</div>";
}
}
else if($type==4){
	// issue_medid issue_persid issue_date issue_id
	$sql="SELECT * FROM issued_meds WHERE issue_patid='$patientid' ORDER BY issue_date DESC";
$result=$conn->query($sql);
if($result->num_rows>0){
	while($row=$result->fetch_assoc()){
		$docid= $row["issue_persid"];
		$issuefac= $row["issue_facility"];
		$medName=$row['issue_medid'];
		$sqldoc="SELECT * FROM personnel where personnel_id = '$docid'";
		$sqlfacility="SELECT * FROM facility where facility_id = '$issuefac'";
		$sqlmed="SELECT * FROM medication WHERE medication_id='$medName'";
		$resultdoc = $conn->query($sqldoc);
		$resultfac = $conn->query($sqlfacility);
		$resultmed = $conn->query($sqlmed);
		if($resultmed->num_rows>0){
			while ($rowmed=$resultmed->fetch_assoc()) {
				$medName = $rowmed['medication_name'];
			}
		}
		if($resultdoc->num_rows>0){
			while ($rowdoc=$resultdoc->fetch_assoc()) {
				$docName = $rowdoc['personnel_name'];
			}
		}
		if($resultfac->num_rows>0){
			while ($rowfac=$resultfac->fetch_assoc()) {
				$facName = $rowfac['facility_name'];
			}
		}
		else{
			$facName="<span class='text-warning'>Doesn't exist in the records!</span>";
		}
		$testResult = $row['test_result'];		
		$pdate=strtotime($row['issue_date']);
		$issueDate = date('h:i:sa d M Y',$pdate);
		$issueDocName=$docName;
		//$diagnosisDis = $row['diagnosis_for'];
		echo "<div class=\"list-group\">";
		echo '<a class="list-group-item"><h4 class="list-group-item-heading"><span class="text-primary">'.$medName.' issued</span></h4><p><strong> '.$issueDate.'</strong></p>
                  <p class="list-group-item-text"><br><strong>Issued by:</strong> '.$issueDocName.'<strong><br>Facility:</strong> '.$facName.'<br></p></a>'; 
        echo "</div>";
	}
}
else{
	echo "<div class=\"list-group\">";
		echo '<a class="list-group-item"><h4 class="list-group-item-heading"><span class="text-warning">There is no issued medication for this patient</span></h4><span class="badge">No issued medication</span>
                  <p class="list-group-item-text">No Prescribed medication has been issued to the patient.</p></a>'; 
        echo "</div>";
}
}
else if($type==5){
	//`test_recid``test_testid``test_recpatid``test_recpersid``test_recfacility``test_rec_date``test_performed`
	$sql="SELECT * FROM test_rec WHERE test_performed=0";
$result=$conn->query($sql);
if($result->num_rows>0){
	while($row=$result->fetch_assoc()){
		$docid= $row["test_recpersid"];
		$issuefac= $row["test_recfacility"];
		$testName=$row['test_testid'];
		$sqldoc="SELECT * FROM personnel where personnel_id = '$docid'";
		$sqlfacility="SELECT * FROM facility where facility_id = '$issuefac'";
		$sqltest="SELECT * FROM test WHERE test_id='$testName'";
		$resultdoc = $conn->query($sqldoc);
		$resultfac = $conn->query($sqlfacility);
		$resulttest = $conn->query($sqltest);
		if($resulttest->num_rows>0){
			while ($rowtest=$resulttest->fetch_assoc()) {
				$testName = $rowtest['test_name'];
			}
		}
		if($resultdoc->num_rows>0){
			while ($rowdoc=$resultdoc->fetch_assoc()) {
				$docName = $rowdoc['personnel_name'];
			}
		}
		if($resultfac->num_rows>0){
			while ($rowfac=$resultfac->fetch_assoc()) {
				$facName = $rowfac['facility_name'];
			}
		}
		else{
			$facName="<span class='text-warning'>Doesn't exist in the records!</span>";
		}
		$testResult = $row['test_result'];		
		$pdate=strtotime($row['test_rec_date']);
		$issueDate = date('h:i:sa d M Y',$pdate);
		$issueDocName=$docName;
		//$diagnosisDis = $row['diagnosis_for'];
		echo "<div class=\"list-group\">";
		echo '<a class="list-group-item"><h4 class="list-group-item-heading"><span class="text-warning">'.$testName.'</span></h4><p><strong> '.$issueDate.'</strong></p>
                  <p class="list-group-item-text"><br><strong>Recommended by:</strong> '.$issueDocName.'<strong><br>Facility:</strong> '.$facName.'<br></p><br><span class=" label label-warning">Awaiting Test</span></a>'; 
        echo "</div>";
	}
}

$sql="SELECT * FROM prescription where pres_patid = '$patientid' AND pres_issued_state = 0 ORDER BY pres_date DESC";
$result=$conn->query($sql);
if($result->num_rows>0){
	while($row=$result->fetch_assoc()){
		$docid= $row["pres_persid"];
		$diagfac= $row["pres_facility"];
		$presName=$row['pres_medid'];
		$sqldoc="SELECT * FROM personnel where personnel_id = '$docid'";
		$sqlfacility="SELECT * FROM facility where facility_id = '$diagfac'";
		$sqldrug="SELECT * FROM medication WHERE medication_id='$presName'";
		$resultdoc = $conn->query($sqldoc);
		$resultfac = $conn->query($sqlfacility);
		$resultdosage = $conn->query($sqldrug);
		if($resultdosage->num_rows>0){
			while ($rowdos=$resultdosage->fetch_assoc()) {
				$prescription = $rowdos['medication_name'];
			}
		}
		if($resultdoc->num_rows>0){
			while ($rowdoc=$resultdoc->fetch_assoc()) {
				$docName = $rowdoc['personnel_name'];
			}
		}
		if($resultfac->num_rows>0){
			while ($rowfac=$resultfac->fetch_assoc()) {
				$facName = $rowfac['facility_name'];
			}
		}
		else{
			$facName="<span class='text-warning'>Doesn't exist in the records!</span>";
		}
		$dosage = $row['pres_dosage'];		
		$pdate=strtotime($row['pres_date']);
		$presDate = date('h:i:sa d M Y',$pdate);
		$diagnosisDocName=$docName;
		$diagnosisDis = $row['diagnosis_for'];
		echo "<div class=\"list-group\">";
		echo '<a class="list-group-item"><h4 class="list-group-item-heading"><span class="text-success">'.$prescription.'</span></h4><span class="badge">'.$dosage.'</span><p><strong> '.$presDate.'</strong></p>
                  <p class="list-group-item-text"><br><strong>Prescribed by:</strong> '.$diagnosisDocName.'<strong><br>Facility:</strong> '.$facName.'<br></p><br><span class=" label label-success">Awaiting to be issued</span></a></a>'; 
        echo "</div>";
	}
}
}
?>