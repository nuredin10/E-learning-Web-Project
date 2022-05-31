signupBtn = $("#submit-signup");
// email = $("#email");
// incorrectEmail = $(".incorrect-email")
incorrectPass = $(".incorrect-password")

// function isEmail(email) {
//     var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
//     return regex.test(email);
// }

signupBtn.click(function(e){
  
    // var errorMessage = "";
    // if(isEmail(email.val()) == false){
    //    incorrectEmail.html("Your email is not valid")
    //    e.preventDefault();
    //    incorrectEmail.css({display: 'block'})
    // }
    if($("#password").val() != $("#confirm-password").val()){
        incorrectPass.html("Your password doesn't match")
        e.preventDefault();
        incorrectPass.css({display: 'block'})
    }

});
