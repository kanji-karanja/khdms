function validateForm() {
	document.getElementById("preloader").innerHTML="<img src=\"../res-site/img/preloader.gif\">";
	var username = document.getElementById("username").value;
	var pat = /(\*|@|#|!|\^|&|\(|\)|\||\$|%|\+|~|\=)/i;
	if(username.search(pat)>=0){
	document.getElementById("messageUsername").innerHTML="* The username cannot contain symbols.";
	return false;
	}
	else{
		document.getElementById("preloader").innerHTML="<img src=\"../res-site/img/preloader.gif\">";
		login();
		return false;
	}
}
function login(){
	var username = document.getElementById("username").value;
	var password = document.getElementById("password").value;
	var xhttp;
	if(window.XMLHttpRequest){
		xhttp= new XMLHttpRequest;
	}
	else{
		xhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
	xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                 response(xhttp.responseText);
            }
        };
        xhttp.open("POST", "../res-site/serve/login.php?username="+username+"&password="+password, true);
        xhttp.send();
}
function response(resp) {
	if(resp==1){
		document.getElementById("responseXml").innerHTML ="<div class=\"alert alert-success\"><strong>Success!</strong> Log in successful!</div>";
		document.location.href="../home/index.php";
	}
	else if(resp==2){
		document.getElementById("responseXml").innerHTML ="<div class=\"alert alert-warning\"><strong>Warning!</strong> Your account is being deactivated!</div>";
	}
	else if(resp==3){
		document.getElementById("responseXml").innerHTML ="<div class=\"alert alert-danger\"><strong>Error!</strong> No such details exists! <br><a href=\"#\">Forgot password?</a></div>";
	}
}