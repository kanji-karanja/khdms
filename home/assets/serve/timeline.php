<?php
require 'credentials.php';
$patientid = $_GET['patient'];
$sql="SELECT * FROM timeline WHERE timeline_patid='$patientid' ORDER BY timeline_date DESC";
$result=$conn->query($sql);
if($result->num_rows>0){
	while ($row=$result->fetch_assoc()) {
	if($row['timeline_for']=="pres"){
		$color="success";
		$badge='<span class="label label-success">Prescription</span>';
	}
	else if($row['timeline_for']=="diag"){
		$color="danger";
		$badge='<span class="label label-danger">Diagnosis</span>';
	}
  else if($row['timeline_for']=="issue"){
    $color="primary";
    $badge='<span class="label label-primary">Issued Medication</span>';
  }
	else{

	}
	$d=strtotime($row['timeline_date']);
	if($row['timeline_id']%2==0){
                echo '<li class="timeline">';
              }
     else{
                echo '<li class="timeline-inverted">';
              }
	echo '<div class="timeline-panel">
              <div class="timeline-heading">
              <h6 class="timeline-title"><span class="text-'.$color.'" >'.$row['timeline_descr'].'</span></h6>
              <p><small class="text-muted"><i class="fa fa-clock-o"></i> '.date("d M Y", $d).'</small>
              </p>
              '.$badge.'
              </div>
              </div>
              </li>';

	}
}
else{
	echo '<li class="timeline">';
	echo '<div class="timeline-panel">
              <div class="timeline-heading">
              <h6 class="timeline-title"><span class="text-primary">No activity yet</span></h6>
              <p><small class="text-muted"><i class="fa fa-clock-o"></i> '.date("d M Y").'</small>
              </p>
              </div>
              </div>
              </li>';
   }
   ?>
