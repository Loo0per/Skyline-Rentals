
function checkPwd(){

    const newPwd = document.getElementById("newpwd").value;
    const confirmPwd = document.getElementById("confirmpwd").value;

    if(newPwd === confirmPwd){

        return true;
    }
    else{
        alert("Your password does not match, please enter again")
        return false;
    }
}