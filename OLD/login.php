<?php
  // Check if user is logged
if($_SESSION['jUser']){
    header('Location: home.php');
}
/* $_SESSION['loginAttempt'] = $_SESSION['loginAttempt'] + 0; */



$sTitle = 'Login | jsTrickle';
$sCss = 'login.css';
require_once './components/top.php';
?>
<div class="container">
    <div class="top">
        jsTrickle
    </div>

    <div class="content">
        <form id="frmLogin">


        <div class="boxInput">
        <div id="invalidEmail" class="invalid">Invalid Email</div>
            <input id="txtEmail" name="txtEmail" type="text" value="A@A.com" placeholder="email">
        </div>

            <div class="boxInput">
            <div id="invalidPassword" class="invalid">Invalid Password</div>
            <input id="txtPassword" name="txtPassword" class="mt10" type="password" value="123456" placeholder="password (6 to 20 characters)" maxlength="20">
            </div>
           <button id="btnLogin" type="button" class="ok mt10">Login</button>
        </form>
        <p class="error"></p>
    </div>
</div>



<?php
$sScript ='login.js';
require_once './components/bottom.php';
