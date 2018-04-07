<?php
$conn=new mysqli("localhost","root","","khdms");
if(isset($_POST['addPat'])){
	$natid=$_POST['pat_id'];
	$patname=$_POST['pat_name'];
	$dob=$_POST['pat_dob'];
	$gender=$_POST['gender'];
	$nhif=$_POST['pat_nhif'];
	$phone=$_POST['pat_phone'];
	$email=$_POST['pat_email'];
$sql="INSERT INTO patients(pat_name, pat_natid, pat_nhifid, pat_gender, pat_dob, pat_phoneno, pat_email, pat_username, pat_password) VALUES ('$patname','$natid','$nhif','$gender','$dob','$phone','$email','$phone','$natid')";
$result=$conn->query($sql);
if($result===true){
	echo "<div class=\"alert alert-success\"><strong>Success!</strong> Patient added successfully!</div>";
}
else{
	echo "<div class=\"alert alert-danger\"><strong>Error!</strong> Unable to add patient!</div>";
}
}
?>