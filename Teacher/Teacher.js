var sendBtn = document.getElementById("send-message");
startLectureButton = document.querySelector('.start-lecture-btn');
shareMaterial = document.querySelector('.share-material-button');
openClassroom = document.getElementById('open-classroom');

btnContainer = document.querySelectorAll(".teacher-menu ul li");
messageButton = document.getElementById("messageBtn");
chatContainer = document.querySelector(".inner-chat");
chatBack = document.querySelector(".chat-background");



// btnContainer.forEach(a => {
    
//     a.addEventListener('click',function(e){
        
//         if(e.target.value == "stream"){
//             document.querySelectorAll('.teacher-content').forEach(a =>{
//                 a.style.display = 'none';
//             })
//             document.querySelector('#stream').style.display = 'flex';

//             document.querySelector("#activitiesBtn").style.backgroundColor = "#7caaef";
//             document.querySelector("#peopleBtn").style.backgroundColor = "#7caaef";
//             document.querySelector("#gradeBtn").style.backgroundColor = "#7caaef";
//             // document.querySelector(" #streamBth").style.backgroundColor = "#3b5680";
//             // background-color: ;
            
//         }
//         else if(e.target.value == "activitie"){
//             document.querySelectorAll('.teacher-content').forEach(a =>{
//                 a.style.display = 'none';
//             })
//             document.querySelector('#activite').style.display = 'flex';

//             document.querySelector("#streamBth").style.backgroundColor = "#7caaef";
//             document.querySelector("#peopleBtn").style.backgroundColor = "#7caaef";
//             document.querySelector("#gradeBtn").style.backgroundColor = "#7caaef";
//             // document.querySelector("#activitiesBtn").style.backgroundColor = "#3b5680";
//         }
//         else if(e.target.value == "people"){
//             document.querySelectorAll('.teacher-content').forEach(a =>{
//                 a.style.display = 'none';
//             })
//             document.querySelector('#people').style.display = 'flex';
           
//             document.querySelector("#activitiesBtn").style.backgroundColor = "#7caaef";
//             document.querySelector("#streamBth").style.backgroundColor = "#7caaef";
//             document.querySelector("#gradeBtn").style.backgroundColor = "#7caaef";
//             // document.querySelector("#peopleBtn").style.backgroundColor = "#3b5680";
//         }
//         else if(e.target.value == "grade"){
//             document.querySelectorAll('.teacher-content').forEach(a =>{
//                 a.style.display = 'none';
//             })
//             document.querySelector('#grade').style.display = 'block';

//             document.querySelector("#activitiesBtn").style.backgroundColor = "#7caaef";
//             document.querySelector("#streamBth").style.backgroundColor = "#7caaef";
//             document.querySelector("#peopleBtn").style.backgroundColor = "#7caaef";
//             // document.querySelector("#gradeBtn").style.backgroundColor = "#3b5680";
//         }
//         e.target.style.backgroundColor = "#3b5680"  
//     })

    
// });



$(document).ready(function(){
    loadChat();
})

$("#message").keyup(function(e){
    var message = $(this).val();
    if(e.which == 13){
        $.post("teacherAjax.php?action=SendMessage&message="+message, function(response){
            loadChat();
            //alert(response);
            $("#message").val("")
        })
    }
    // console.log("Im just clicked");
})
sendBtn.addEventListener("click",function(e){
    e.preventDefault();
    var message = $("#message").val();
    if(message!=""){
        $.post("teacherAjax.php?action=SendMessage&message="+message, function(response){
            loadChat();
            // alert(response);
            $("#message").val("")
        })
    }
})

function loadChat(){
    $.post("teacherAjax.php?action=getChat", function(response){
        // var messa = response.split(' ');
        
        $('.chat-history').html(response);
    })
}

startLectureButton.onclick = ()=>{
    window.open('https://us04web.zoom.us/meeting#/upcoming')
}

// $("#my_file").css({display: 'none'});

openClassroom.onclick = () =>{
    window.open("https://classroom.google.com/");
}

messageButton.onclick=()=>{
    if(chatContainer.style.display == "block"){
        chatContainer.style.display = "none"
        chatBack.style.display = "block"
    }
    else{
        chatBack.style.display = "none"
        chatContainer.style.display = "block";
    }
    // alert("asdcasdc");
}

var scrolled = false;
function updateScroll(){
    if(!scrolled){
        var element = document.querySelector(".chat-history");
        element.scrollTop = element.scrollHeight;
    }
}

$(".chat-history").on('scroll', function(){
    scrolled=true;
});

setInterval(updateScroll,10);