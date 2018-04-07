<?php
session_start();
$patientid = $_GET['patient'];
require 'assets/serve/getPatient.php';
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kisumu Health</title>
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
  <link rel="stylesheet" href="assets/css/styles.css">
  <link rel="stylesheet" href="assets/css/timeline.css">
</head>

<body>
  <nav class="navbar navbar-default navbar-static-top">
    <div class="container">
      <div class="navbar-header"><a class="navbar-brand navbar-link" href="#">Kisumu Health</a>
        <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
      </div>
      <div class="collapse navbar-collapse" id="navcol-1">
        <ul class="nav navbar-nav">
          <li role="presentation"><a href="index.php">Dashboard </a></li>
          <li role="presentation"><a href="patients.php">Patients </a></li>
          <li role="presentation"><a href="treatments.php">Prescriptions </a></li>
                    <li role="presentation"><a href="tests.php">Tests</a></li>
          <li role="presentation"><a href="personnel.php">Personnel </a></li>
          <li role="presentation"><a href="facilities.php">Facilities</a></li>
          <li class="active" role="presentation"><a href=""><?php echo $name;?></a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#"><i class="glyphicon glyphicon-user"></i> <?php echo $_SESSION['username'];?><span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li role="presentation"><a href="settings.php"><i class="fa fa-gear"></i> Settings</a></li>
              <li role="presentation"><a href="logout.php"><i class="glyphicon glyphicon-off"></i> Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">
    <div class="row">
      <div class="row">
        <div class="col-sm-8 col-md-8">
       <div class="col-sm-4 col-md-4">
        <div class='panel panel-default'><div class='panel-body'>
          <center>
            <img src="assets/users/user.png" class="img-responsive">
          </center>
        </div></div>
        <div class="list-group table-of-contents">
              <a class="list-group-item" href="#waitingBay">Waiting Bay</a>
              <a class="list-group-item" href="#ttRecords">Patient Tests</a>
              <a class="list-group-item" href="#diagRecords">Patient Diagnosis</a>
              <a class="list-group-item" href="#treatmentRecords">Patient Prescription</a>
              <a class="list-group-item" href="#issuedRecords">Patient Issued Meds </a>
            </div>
     </div>
     <div class="col-sm-8 col-lg-8 col-md-8">
      <?php
      echo "<div class='panel panel-default'><div class='panel-body'><h5>".$name."</h5></div></div>";
      echo "<ul class=\"list-group\"><li class=\"list-group-item\"><strong>National id:</strong> ".$nat_id."</li>";
      if($nhif==0){
        echo "<li class=\"list-group-item\"><strong>NHIF Number:</strong> Not Available</li>";
      }
      else{
        echo "<li class=\"list-group-item\"><strong>NHIF Number:</strong> ".$nhif."</li>";
      }
      echo "<li class=\"list-group-item\"><strong>Age:</strong> ".$age."</li>";
      echo "<li class=\"list-group-item\"><strong>Gender:</strong> ".$gender."</li>";
      echo "<li class=\"list-group-item\"><strong>Date of Birth:</strong> ".$dob."</li>";
      echo "<li class=\"list-group-item\"><strong>Phone:</strong> ".$phone."</li>";
      echo "<li class=\"list-group-item\"><strong>Email:</strong> ".$email."</li></ul>";
      ?>
    </div>
    <hr>
    <div class="col-sm-12 col-lg-12 col-md-12" id="ttRecords">
            <h4>Patient Tests Records</h4>
            <div id="testsResults"></div>
          </div>
          <hr>
          <div class="col-sm-12 col-lg-12 col-md-12" id="diagRecords">
            <h4>Patient Diagnosis Records</h4>
            <div id="diagnosisResults"></div>
          </div>
      <hr>
          <div class="col-sm-12 col-lg-12 col-md-12" id="treatmentRecords">
            <h4>Patient prescription Records</h4>
            <div id="treatmentResults"></div>
          </div>
    <div class="col-sm-12 col-lg-12 col-md-12" id="issuedRecords">
            <h4>Patient issued Medication Records</h4>
            <div id="issuedResults"></div>
          </div>
          <hr>
  </div>
    <div class="col-sm-4 col-lg-4 col-md-4">
      <?php require 'assets/serve/patientsFileForm.php';?>
      <div class="panel-group" role="tablist" aria-multiselectable="true" id="accordion-1">
      <div class="panel panel-info">
          <div class="panel-heading" role="tab">
            <h4 class="panel-title" id="test_tada"><a role="button" data-toggle="collapse" data-parent="#accordion-4" aria-expanded="false" href="#accordion-1 .item-4">Add Test Recommendation / Test Results<span class="badge" style="float: right;">+</span> </a></h4></div>
            <div class="panel-collapse collapse  item-4" role="tabpanel">
              <div class="panel-body">
                <span>
                   <div class="radio">
                        <label>
                          <input name="test" id="optionsRadiosRecTest" value="Cancer" type="radio" required="true" onchange="changeTest(1)">
                          Recommend Test
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input name="test" id="optionsRadiosResult" value="Sickle Cell" type="radio" required="true" onchange="changeTest(2)">
                          Test Results
                        </label>
                      </div>
                      <div id="changeTestHere">
                      </div>
                  
                </span></div>
              </div>
            </div>
        <div class="panel panel-danger">
          <div class="panel-heading" role="tab">
            <h4 class="panel-title"><a role="button" data-toggle="collapse" data-parent="#accordion-1" aria-expanded="false" href="#accordion-1 .item-1">Add Diagnosis <span class="badge" style="float: right;">+</span> </a></h4></div>
            <div class="panel-collapse collapse  item-1" role="tabpanel">
              <div class="panel-body">
                <span>
                  <form method="post" action="">
                    <div class="form-group">
                      <label class="control-label">Diagnosis for:</label>
                      <div class="radio">
                        <label>
                          <input name="disease" id="optionsRadios1" value="Cancer" type="radio" required="true">
                          Cancer
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input name="disease" id="optionsRadios2" value="Sickle Cell" type="radio" required="true">
                          Sickle Cell
                        </label>
                      </div>
                    </div>
                    <label class="control-label" for="inputLarge">Description</label>
                    <textarea class="form-control" rows="3" id="textArea" required="true" placeholder="Type diagnosis here..." name="descriptionDiag"></textarea><br>
                    <div class="form-group">
                      <button class="btn btn-danger" type="submit" name="addDiag">Add </button>
                      <button class="btn btn-default" type="reset">RESET </button>
                    </div>
                  </form>    

                </span></div>
              </div>
            </div>
            <div class="panel panel-success">
              <div class="panel-heading" role="tab">
                <h4 class="panel-title"><a role="button" data-toggle="collapse" data-parent="#accordion-1" aria-expanded="false" href="#accordion-1 .item-2">Add Prescription <span class="badge" style="float: right;">+</span> </a></h4></div>
                <div class="panel-collapse collapse item-2" role="tabpanel">
                  <div class="panel-body"><span>
                    <form method="post" action="">
                      <div class="form-group">
                         <label>Treatment for:</label>
                        <select class="form-control" onchange="showMeds(this.value)" id="captureDisease">
                          <option>Select one</option>
                          <option value="cancer">Cancer</option>
                          <option value="sicklecell">Sickle Cell</option>
                        </select>
                        <span class="help-block">Only select one disease at a time for each prescription.</span>
                      </div>
                      <hr>
                      <label class="control-label">Drug 1</label>
                      <div class="row">
                        <div class="col-md-10 col-sm-10 col-lg-10">
                          <select class="form-control" id="select" name="drug1">
                          </select>
                          <div class="form-group">
                            <label class="control-label">Dosage:</label>
                            <input type="input" name="presDirect1" class="form-control" id="direct1">
                          </div>
                        </div>
                        <div class="col-lg-1 col-md-1 col-sm-1"><span class="btn btn-success" onclick="addMoreFields()">+</span></div>
                      </div>
                      <div id="moreFieldsHere">
                      </div>
                      <input type="hidden" name="countPrescriptions" id="countPrescriptions" value="2">
                      <br><div class="form-group">
                        <button class="btn btn-success" type="submit" name="addPres">Add </button>
                        <button class="btn btn-default" type="reset" onclick="resetFields()">RESET </button>
                      </div>
                    </form>
                  </span>
                </div>
              </div>
            </div>
            <div class="panel panel-primary">
              <div class="panel-heading" role="tab">
                <h4 class="panel-title"><a role="button" data-toggle="collapse" data-parent="#accordion-1" aria-expanded="false" href="#accordion-1 .item-3">Add Issued Meds <span class="badge" style="float: right;">+</span> </a></h4></div>
                <div class="panel-collapse collapse item-3" role="tabpanel">
                  <div class="panel-body"><span>Item body.</span></div>
                </div>
              </div>
            </div>
            <div class="panel panel-default visible-sm visible-lg visible-md">
        <div class="panel-heading">
          <i class="fa fa-clock-o fa-fw"></i>Patient Timeline
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
          <ul class="timeline" id="timelineHere">
           </ul>
      </div>
      <!-- /.panel-body -->
    </div>
    <div class="panel panel-default" id="waitingBay">
      <div class="panel-heading">
        Waiting Bay
      </div>
      <div class="panel-body">
        <div id="waiting">
        <p class="lead text-warning">There is no item in the waiting bay</p>
      </div>
      </div>
    </div>
          </div>
        </div>
      </div>
    </div>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript">
          var counter=0;
          var drugcounter = 2;
          function addMoreFields(){
            var diseaseControl = document.getElementById("captureDisease").value;
           document.getElementById("moreFieldsHere").innerHTML +='<label class="control-label">Drug '+drugcounter+'</label><div class="row"><div class="col-md-10 col-sm-10 col-lg-10"><select name="drug'+drugcounter+'"class="form-control" id="addedSelect'+drugcounter+'"></select><div class="form-group"><label class="control-label">Dosage:</label><input type="input" name="presDirect'+drugcounter+'" class="form-control" id="direct'+drugcounter+'"></div></div><div class="col-lg-1 col-md-1 col-sm-1"><span class="btn btn-success" onclick="addMoreFields()">+</span></div></div>';
           showMedsAdded(diseaseControl,drugcounter);
            counter++;
            drugcounter++;
            document.getElementById('countPrescriptions').value=drugcounter;
          }
          function resetFields(){
            document.getElementById("moreFieldsHere").innerHTML ='';
            document.getElementById("select").innerHTML ='';
            counter=0;
            drugcounter=2;
          }
        </script>
        <script type="text/javascript">
          $(document).ready(function(){
          var xmlhttp=new XMLHttpRequest();
          xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState==4 && xmlhttp.status==200) {
              document.getElementById("diagnosisResults").innerHTML=xmlhttp.responseText;
            }
          };
          xmlhttp.open("GET.html","assets/serve/diagnosisNtreatment.php?type=1&patient=<?php echo $patientid;?>",true);
          xmlhttp.send();
          var xmlhttpTreatment=new XMLHttpRequest();
          xmlhttpTreatment.onreadystatechange=function() {
            if (xmlhttpTreatment.readyState==4 && xmlhttpTreatment.status==200) {
              document.getElementById("treatmentResults").innerHTML=xmlhttpTreatment.responseText;
            }
          };
          xmlhttpTreatment.open("GET.html","assets/serve/diagnosisNtreatment.php?type=2&patient=<?php echo $patientid;?>",true);
          xmlhttpTreatment.send();
          var xmlhttpTimeline=new XMLHttpRequest();
          xmlhttpTimeline.onreadystatechange=function() {
            if (xmlhttpTimeline.readyState==4 && xmlhttpTimeline.status==200) {
              document.getElementById("timelineHere").innerHTML=xmlhttpTimeline.responseText;
            }
          };
          xmlhttpTimeline.open("GET.html","assets/serve/timeline.php?patient=<?php echo $patientid;?>",true);
          xmlhttpTimeline.send();

          var xmlhttpTest=new XMLHttpRequest();
          xmlhttpTest.onreadystatechange=function() {
            if (xmlhttpTest.readyState==4 && xmlhttpTest.status==200) {
              document.getElementById("testsResults").innerHTML=xmlhttpTest.responseText;
            }
          };
          xmlhttpTest.open("GET.html","assets/serve/diagnosisNtreatment.php?type=3&patient=<?php echo $patientid;?>",true);
          xmlhttpTest.send();

           var xmlhttpIssued=new XMLHttpRequest();
          xmlhttpIssued.onreadystatechange=function() {
            if (xmlhttpIssued.readyState==4 && xmlhttpIssued.status==200) {
              document.getElementById("issuedResults").innerHTML=xmlhttpIssued.responseText;
            }
          };
          xmlhttpIssued.open("GET.html","assets/serve/diagnosisNtreatment.php?type=4&patient=<?php echo $patientid;?>",true);
          xmlhttpIssued.send();

          var xmlhttpwait=new XMLHttpRequest();
          xmlhttpwait.onreadystatechange=function() {
            if (xmlhttpwait.readyState==4 && xmlhttpwait.status==200) {
              document.getElementById("waiting").innerHTML=xmlhttpwait.responseText;
            }
          };
          xmlhttpwait.open("GET.html","assets/serve/diagnosisNtreatment.php?type=5&patient=<?php echo $patientid;?>",true);
          xmlhttpwait.send();
        });
          function showMeds(dis){
            var xmlhttp=new XMLHttpRequest();
          xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState==4 && xmlhttp.status==200) {
              document.getElementById("select").innerHTML=xmlhttp.responseText;
            }
          };
          xmlhttp.open("GET.html","assets/serve/meds.php?dis="+dis,true);
          xmlhttp.send();
          }
           function showMedsAdded(dis,element){
            var xmlhttp=new XMLHttpRequest();
          xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState==4 && xmlhttp.status==200) {
              document.getElementById("addedSelect"+element).innerHTML=xmlhttp.responseText;
            }
          };
          xmlhttp.open("GET.html","assets/serve/meds.php?dis="+dis,true);
          xmlhttp.send();
          }
          function changeTest(testValue) {
            if(testValue==1){
              document.getElementById('changeTestHere').innerHTML='<hr><form method="post" action=""><div class="form-group"><label class="control-label">Tests for:</label><div class="radio"><label><input name="disease" id="optionsRadios1" value="Cancer" type="radio" onchange="changeTestRec(1)" required="true">Cancer</label></div><div class="radio"><label><input name="disease" id="optionsRadios2" value="Sickle Cell" type="radio" required="true" onchange="changeTestRec(2)">Sickle Cell</label></div></div><div class="form-group" id="testToBeRecommended"></div><br><div class="form-group"><button class="btn btn-info" type="submit" name="recommend">Add </button> <button class="btn btn-default" type="reset">RESET </button></div></form>';
            }
            else if(testValue==2){
              document.getElementById('changeTestHere').innerHTML='<hr><form method="post" action=""><div class="form-group"><label class="control-label">Tests results for:</label><select class="form-control" id="selectTestRec" name="testResult" onchange="placeTest(this.value)"></select></div><div id="resultExpanded"></div><div id="submitOptions"></div></form>';
            var xmlhttp=new XMLHttpRequest();
          xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState==4 && xmlhttp.status==200) {
              document.getElementById("selectTestRec").innerHTML=xmlhttp.responseText;
            }
          };
          xmlhttp.open("GET.html","assets/serve/test_rec.php?action=1&patient=<?php echo $patientid; ?>",true);
          xmlhttp.send();
            }
          }
          function placeTest(selectValue) {
            if(selectValue!=0){
              document.getElementById("resultExpanded").innerHTML='<label class="control-label" for="inputLarge">Test Result:</label><textarea class="form-control" rows="3" id="textArea" required="true" placeholder="Type test results here..." name="descriptionTestResult"></textarea><br>';
              document.getElementById("submitOptions").innerHTML='<div class="form-group"><button class="btn btn-info" type="submit" name="results">Add </button> <button class="btn btn-default" type="reset">RESET </button></div>';
            }
            else{
               document.getElementById("resultExpanded").innerHTML='';
               document.getElementById("submitOptions").innerHTML="";
            }
          }
          function changeTestRec(testType) {
            if(testType==1){
              var xmlTest1=new XMLHttpRequest();
          xmlTest1.onreadystatechange=function() {
            if (xmlTest1.readyState==4 && xmlTest1.status==200) {
              document.getElementById("testToBeRecommended").innerHTML=xmlTest1.responseText;
            }
          };
          xmlTest1.open("GET.html","assets/serve/test_rec.php?action=2&test=1&patient=<?php echo $patientid; ?>",true);
          xmlTest1.send();
            }
            else{
              var xmlTest2=new XMLHttpRequest();
          xmlTest2.onreadystatechange=function() {
            if (xmlTest2.readyState==4 && xmlTest2.status==200) {
              document.getElementById("testToBeRecommended").innerHTML=xmlTest2.responseText;
            }
          };
          xmlTest2.open("GET.html","assets/serve/test_rec.php?action=2&test=2&patient=<?php echo $patientid; ?>",true);
          xmlTest2.send();
            }
          }
        </script>
      </body>

      </html>