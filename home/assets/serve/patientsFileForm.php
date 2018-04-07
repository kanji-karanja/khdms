<?php
require 'credentials.php';
if(isset($_POST['addDiag'])){
$sql=$conn->prepare("INSERT INTO diagnosis(diagnosis_Patid, diagnosis_des, diagnosis_persid, diagnosis_facilid, diagnosis_date, diagnosis_for) VALUES (?,?,?,?,?,?)");
$sql->bind_param("isiiss",$patientGid,$diagnosisdes,$personellid,$facilityid,$diagnosisdate,$diagnosisfor);
$patientGid=$patientid;
$diagnosisdes=$_POST['descriptionDiag'];
$personellid=$_SESSION['personnel_id'];
$facilityid=$_SESSION['personnel_facilityid'];
$diagnosisdate=date('Y-m-d h:i:s');
$diagnosisfor=$_POST['disease'];
$sql->execute();
echo "<div class='alert alert-success'><strong>Diagnosis added!</strong> The diagnosis for ".$name." has been added!</div>";
$sql->close();
}
if(isset($_POST['addPres'])){
	$numPres= $_POST['countPrescriptions']-1;
	$datePres=date('Y-m-d h:i:s');
	$counter=0;
	for($i=0;$i<$numPres;$i++){
		$i2=$i+1;
		$drug[$i]=$_POST['drug'.$i2];
		$pres[$i]=$_POST['presDirect'.$i2];
	}
	$stmt = $conn->prepare("INSERT INTO prescription(pres_patid,pres_medid,pres_persid,pres_facility,pres_dosage, pres_date) VALUES (?,?,?,?,?,?)");
	$stmt->bind_param("iiiiss",$pat,$drugAlloc,$per,$fac,$presAlloc,$datePres);
	for($i=0;$i<$numPres;$i++){
		$pat=$patientid;
		$drugAlloc=$drug[$i];
		$per=$_SESSION['personnel_id'];
		$fac=$_SESSION['personnel_facilityid'];
		$presAlloc=$pres[$i];
		$datePres=$datePres;
		$stmt->execute();  
	}
	echo "<div class='alert alert-success'><strong>Prescription added!</strong> The prescription for ".$name." has been added!</div>";
	$stmt->close();
}
if(isset($_POST['recommend'])){
	$stmt = $conn->prepare("INSERT INTO test_rec(test_testid, test_recpatid, test_recpersid, test_recfacility, test_rec_date, test_performed) VALUES (?,?,?,?,?,?)");
	$stmt->bind_param("iiiisi",$testid,$pat,$per,$fac,$dateRec,$performed);
		$testid = $_POST['testRec'];
		$performed=0;
		$dateRec=date('Y-m-d h:i:s');
		$pat=$patientid;
		$per=$_SESSION['personnel_id'];
		$fac=$_SESSION['personnel_facilityid'];
		$stmt->execute();  
	echo "<div class='alert alert-success'><strong>Test has been recommended!</strong> A test for ".$name." has been recommended!</div>";
	$stmt->close();
}
if(isset($_POST['results'])){
	$dateResult=date('Y-m-d h:i:s');
	//INSERT INTO test_result(testres_id, test_patid, test_id, test_persid, test_facility, test_date, test_result) VALUES 
	$stmt = $conn->prepare("INSERT INTO test_result(test_patid, test_id, test_persid, test_facility, test_date, test_result) VALUES (?,?,?,?,?,?)");
	$stmt->bind_param("iiiiss",$pat,$resul,$per,$fac,$dateRes,$descr);
		$resul=$_POST['testResult'];
		$pat=$patientid;
		$per=$_SESSION['personnel_id'];
		$fac=$_SESSION['personnel_facilityid'];
		$dateRes=$dateResult;
		$descr= $_POST['descriptionTestResult'];
		$stmt->execute(); 
	$stmt->close();
	$sql="UPDATE test_rec SET test_performed=1 WHERE test_recid='$resul'";
	if($conn->query($sql)==true){
	echo "<div class='alert alert-success'><strong>Results added!</strong> The test results for ".$name." have been added!</div>"; 
}
}
?>