<?php
function errorHandler($errno, $errstr) {
}
//set_error_handler("errorHandler");


$username = $_REQUEST["username"];
$password = $_REQUEST["password"];
//Gear host credentials for the gearhost sql server
$conn=new mysqli("den1.mysql1.gear.host","khdms","Hw5Gp!!a0KVQ","khdms");
//Local host credentials for localhost sql server
//$conn=new mysqli("localhost","root","","khdms");
if($conn->connect_error){
die("<div class=\"alert alert-danger\"><strong>Error!</strong> An error occured!</div>");
}
else{
$sql = "SELECT * FROM personnel WHERE personnel_username='$username' AND personnel_password='$password';";
$result = $conn->query($sql);
if($result->num_rows>0 && $result->num_rows<2){
	while($row = $result->fetch_assoc()){
session_start();
$_SESSION['username']=$username;
$_SESSION['active']=1;
$_SESSION['personnel_facilityid']= $row['personnel_facilityid'];
$_SESSION['personnel_id']= $row['personnel_id'];
echo 1;
}
}
else if($result->num_rows>1){
echo 2;
}
else{
echo 3;
}
}
	?>
