startLectureButton = document.querySelector('.start-lecture-btn');
btnContainer = document.querySelectorAll(".teacher-menu ul li");
messageButton = document.getElementById("messageBtn");
chatContainer = document.querySelector(".inner-chat");
sendBtn = document.getElementById("send-message");
btnContainer.forEach(a => {
    
    a.addEventListener('click',function(e){
        if(e.target.value == "stream"){
            document.querySelectorAll('.teacher-content').forEach(a =>{
                a.style.display = 'none';
            })
            document.querySelector('#stream').style.display = 'flex';
            
        }
        else if(e.target.value == "activitie"){
            document.querySelectorAll('.teacher-content').forEach(a =>{
                a.style.display = 'none';
            })
            document.querySelector('#activite').style.display = 'flex';
           
        }
        else if(e.target.value == "people"){
            document.querySelectorAll('.teacher-content').forEach(a =>{
                a.style.display = 'none';
            })
            document.querySelector('#people').style.display = 'flex';
            
        }
        else if(e.target.value == "grade"){
            document.querySelectorAll('.teacher-content').forEach(a =>{
                a.style.display = 'none';
            })
            document.querySelector('#grade').style.display = 'block';
            
        }
    })
});

$(document).ready(function(){
    loadChat();
})

$("#message").keyup(function(e){
    var message = $(this).val();
    if(e.which == 13){
        $.post("../Teacher/teacherAjax.php?action=SendMessage&message="+message, function(response){
            loadChat();
            // alert(response);
            $("#message").val("")
        })
    }
})

sendBtn.addEventListener("click",function(e){
    e.preventDefault();
    var message = $("#message").val();
    if(message!=""){
        $.post("../Teacher/teacherAjax.php?action=SendMessage&message="+message, function(response){
            loadChat();
            // alert(response);
            $("#message").val("")
        })
    }
})

function loadChat(){
    $.post("../Teacher/teacherAjax.php?action=getChat", function(response){
        // var messa = response.split(' ');
        
        $('.chat-history').html(response);
    })
}


startLectureButton.onclick = ()=>{
    // console.log("asdcasd");
    window.open('https://us04web.zoom.us/meeting#/upcoming')
}