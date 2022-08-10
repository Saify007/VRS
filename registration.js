var check = function () {
	if (
		document.getElementById("password").value ==
		document.getElementById("c_password").value
		){
		document.getElementById("pass").style.color = "red";
		document.getElementById("pass").innerHTML = "***Matching***";
		}else{
			document.getElementById("pass").style.color = "red";
			document.getElementById("pass").innerHTML = "***Not matching***";
		}
};