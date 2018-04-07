<?php
/*
$sitename = "localhost";
$siteusername = "root";
$sitepassword = "";
$sitedatabase ="khdms";
*/
//Gear host credentials for the gearhost sql server
$conn=new mysqli("den1.mysql1.gear.host","khdms","Hw5Gp!!a0KVQ","khdms");
//Local host credentials for localhost sql server
//$conn=new mysqli("localhost","root","","khdms");
//$conn=new mysqli($sitename,$siteusername,$sitepassword,$sitedatabase);
if($conn->connect_error){
die("<div class=\"alert alert-danger\"><strong>Error!</strong> There was a problem on our end.</div>");
}
else{
$sql_pat="SELECT * FROM patients";
$sql_fac="SELECT * FROM facility";
$sql_per="SELECT * FROM personnel";
$sql_pres="SELECT * FROM prescription";
$respat = $conn->query($sql_pat);
$resfac = $conn->query($sql_fac);
$resper = $conn->query($sql_per);
$respres = $conn->query($sql_pres);
if($respat->num_rows>0){
$pats=$respat->num_rows;
}
else{
$pats=0;
}
if($resfac->num_rows>0){
$facs=$resfac->num_rows;
}
else{
$facs=0;
}
if($respres->num_rows>0){
$press=$respres->num_rows>0;
}
else{
$press=0;
}
if($resper->num_rows>0){
$pers=$resper->num_rows;
}
else{
$pers=0;
}

}
?>