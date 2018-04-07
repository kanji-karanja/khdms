<?php
//Change this depending on the environment where it this site is hosted.
function errorHandler($errno,$errstr){
$error_message = "The error experienced is: ".$errstr." and error number is: ".$errstr; 
}
set_error_handler("errorHandler");
$conn=new mysqli("localhost","root","","khdms");
if($conn->connect_error){
	die("<div class='alert alert-danger'><strong>Error!</strong> Unable to connect to the Database!".$error_message."</div>");
}

?>