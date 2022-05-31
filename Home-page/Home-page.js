var loginButton = document.getElementById("login");
var getStarted = document.getElementById("get-started");
loginButton.onclick = function () {
    location.href = "../Login-Signup/Login.php";
};

getStarted.onclick = function(){
    location.href = "../Forms/select-form.php";
}
