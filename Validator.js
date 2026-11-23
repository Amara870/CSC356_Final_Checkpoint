// display error message on php page
function printError(elemId, msg) {
    document.getElementById(elemId).innerHTML = msg;
}

function validateLoginForm() {
    var txtUserName = document.loginForm.txtUserName.value;
    var txtPassword = document.loginForm.txtPassword.value;


    var usernameValid = true;
    var passwordValid = true;


    // clear out any errors before the form is resubmitted
    printError("txtUserNameErr", "");
    printError("txtPasswordErr", "");
    document.getElementById("txtUserName").style.backgroundColor = "";
    document.getElementById("lblUserName").style.color = "";
    document.getElementById("txtPassword").style.backgroundColor = "";
    document.getElementById("lblPassword").style.color = "";

    // check if user entered valid info
    if (txtUserName == "" || txtUserName.length < 6) {
        printError("txtUserNameErr", "Please enter a valid User Name.");
        usernameValid = false;
        document.getElementById("txtUserName").style.backgroundColor = "yellow";
        // changle label text color
        document.getElementById("lblUserName").style.color = "red";
    }

    if (txtPassword == "" || txtPassword.length < 8) {
        printError("txtPasswordErr", "Please enter a valid Password.");
        passwordValid = false;
        // turn the txtbox yellow
        document.getElementById("txtPassword").style.backgroundColor = "yellow";

        document.getElementById("lblPassword").style.color = "red";
    }


    if (!nameValid || !ageValid) {
        return false;
    }
}