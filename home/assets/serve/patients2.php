<?php
$end = $_GET['page'];
$pos = $_GET['pos'];
$conn=new mysqli("localhost","root","","khdms");
if($conn->connect_error){
	die("Problem occured trying to access the database");
}
else{
$sql = "SELECT * FROM  patients LIMIT $end,25";
$result = $conn->query($sql);
if ($result->num_rows>0) {
	while ($row=$result->fetch_assoc()) {
		echo "<tr onclick=\"document.location.href='patientFile.php?patient=".$row['pat_id']."'\">
		     <td>".$row['pat_natid']."</td>
             <td>".$row['pat_name']."</td>
             <td>".$row['pat_gender']."</td>
             <td>".$row['pat_nhifid']."</td>
             </tr>
             ";
	}
}
else{
echo "No results Found";
}
}
?>