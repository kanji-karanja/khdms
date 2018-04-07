<?php
$active=$_SESSION['active'];
$conn=new mysqli("localhost","root","","khdms");
if($conn->connect_error){
	die("Problem occured trying to access the database");
}
else{
$sql = "SELECT * FROM  patients";
$result = $conn->query($sql);
if($result->num_rows>0 && $result->num_rows<=25){
echo '<center><ul class="pagination pagination-sm">
                <li class="disabled"><a href="#">«</a></li>
                <li class="active"><a href="#" >1</a></li>
                <li><a href="#">»</a></li>
              </ul>
          </center>';
}
else if ($result->num_rows>25) {
$pages = ceil(($result->num_rows)/25);
$counter=1;
$numPages = ($pages-1)*25;
echo '<center><ul class="pagination pagination-sm">
                <li class="disabled"><a href="#">«</a></li>';
		echo '<li class="active"><a onclick="getPatients('.$numPages.','.$counter.')">View More</a></li>';
	$counter++;
echo '<li><a href="#">»</a></li></ul></center>';
}
}
?>