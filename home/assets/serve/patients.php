<?php
//Gear host credentials for the gearhost sql server
$conn=new mysqli("den1.mysql1.gear.host","khdms","Hw5Gp!!a0KVQ","khdms");
//Local host credentials for localhost sql server
//$conn=new mysqli("localhost","root","","khdms");
if($conn->connect_error){
	die("Problem occured trying to access the database");
}
else{
$sql = "SELECT * FROM  patients LIMIT 25";
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