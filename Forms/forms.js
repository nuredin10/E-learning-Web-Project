var studentBtn = document.getElementById("student");
var teacherBtn = document.getElementById("teacher");

studentBtn.onclick = function(){
    location.href = "./student-form.php";
}
teacherBtn.onclick = function(){
    location.href = "./teacher-form.php";
}