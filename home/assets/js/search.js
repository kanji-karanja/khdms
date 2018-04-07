function searchData(searchValue) {
if (searchValue.length==0) { 
    document.getElementById("txtResult").innerHTML="";
    return;
} else {
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("txtResult").innerHTML=xmlhttp.responseText;
        }
    };
    xmlhttp.open("GET.html","assets/serve/search.php?si="+searchValue,true);
    xmlhttp.send();
}    
}