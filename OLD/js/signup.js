/* trigger the click */
$('#frmSignup').submit(function(e){
    e.preventDefault()
    $.ajax({
        url:"apis/api-signup.php",
        method: "POST",
        data: $('#frmSignup').serialize(),
        dataType: "JSON"
    }).always(function(jData){
       console.log(jData)
       if(jData.status===1){
       location.href="home.php"
        }else{
       console.log('Cannot sign you up')
    }
    })
})