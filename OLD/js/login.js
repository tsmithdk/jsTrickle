/* trigger the click */
$(document).on('click', '#btnLogin', function(){

  // validate--- FRONTEND VALIDATION---IF IT PASS THAN CHECK FOR THE BACKEND VALIDATION
  var sEmail = $("#txtEmail").val();
  var sPassword = $("#txtPassword").val();

  $("#invalidEmail", "#invalidPassword").hide();

  var bErrorsFound = false;
  // validate Email
  if (!fnIsEmailValid(sEmail)) {
    $("#invalidEmail").show();
    bErrorsFound = true;
  }
  // validate Password
  if (sPassword.length < 6 || sPassword.length > 20) {
    $("#invalidPassword").show();
    bErrorsFound = true;
  }
  // validate boolian for password and email
  if (bErrorsFound) {
    return;
  }

  $.ajax({
    url: "apis/api-login.php",
    method: "POST",
    data: $("#frmLogin").serialize(),
    dataType: "JSON"
  }).always(function(jData) {
    console.log(jData)

   /*  if (jData.status === 1) {
    //location.href = "home.php"
    console.log("yes Login")
    } */

    if (jData['loginLimit'] === "reached") {
      $('.error').append(`Too many login ATTEMPTS...Please wait for 5 minutes`)

      setTimeout(function(){
        document.location.href ='apis/api-logout.php'
      },3000)
    }else{
      console.log(jData['attempts'])
    }

    console.log("Cannot Login")

    //swal("Not Logged In!", "...sorry you cannot logged in!")
    $("h1").text("Incorrect Login")
  })
})

function fnIsEmailValid(sEmail) {
  var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return regex.test(String(sEmail).toLowerCase()); // true or false
}
