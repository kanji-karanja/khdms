var xmlhttp=new XMLHttpRequest();
xmlhttp.onreadystatechange=function() {
if (xmlhttp.readyState==4 && xmlhttp.status==200) {
    document.getElementById("tableResults").innerHTML=xmlhttp.responseText;
     }
    };
xmlhttp.open("GET.html","assets/serve/patients.php",true);
xmlhttp.send();

function getPatients(page,pos){
var xmlhttp=new XMLHttpRequest();
xmlhttp.onreadystatechange=function() {
if (xmlhttp.readyState==4 && xmlhttp.status==200) {
    document.getElementById("tableResults").innerHTML=xmlhttp.responseText;
     }
    };
xmlhttp.open("GET.html","assets/serve/patients2.php?page="+page+"&pos="+pos,true);
xmlhttp.send();
}