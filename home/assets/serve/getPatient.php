<?php
//Gear host credentials for the gearhost sql server
$conn=new mysqli("den1.mysql1.gear.host","khdms","Hw5Gp!!a0KVQ","khdms");
//Local host credentials for localhost sql server
//$conn=new mysqli("localhost","root","","khdms");
$sql="SELECT * FROM patients WHERE pat_id=\"$patientid\"";
$result=$conn->query($sql);
if($result->num_rows>0){
while($row=$result->fetch_assoc()){
$name =$row['pat_name'];
$nat_id=$row['pat_natid'];
$nhif=$row['pat_nhifid'];
$gender=$row['pat_gender'];
$dob=strtotime($row['pat_dob']);
$age=floor((time()-$dob)/60/60/24/365.25);
$dob = date('d M Y',$dob);
$phone=$row['pat_phoneno'];
$email=$row['pat_email'];
}
}
else{
	echo "Sorry Doesn't exist";
}
?>