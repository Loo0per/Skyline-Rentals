function checkPwd(){

    const newPwd = document.getElementById("Password").value;
    const confirmPwd = document.getElementById("confirmpwd").value;

    if(newPwd === confirmPwd){

        return true;
    }
    else{
        alert("Your password does not match, please enter again")
        return false;
    }
}


function enableButton(){
	if(document.getElementById("checkbox").checked){
		document.getElementById("submitbtn").disabled=false;
	}
	else{
		document.getElementById("submitbtn").disabled=true;
	}
}