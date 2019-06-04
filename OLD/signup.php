<?php
$sTitle = 'Signup | jsTrickle';
$sCss = 'signup.css';
require_once './components/top.php';
?>

<div class="container">
    <div class="top">
    jsTrickle
    </div>
    <div class="content">
        <h1>It's free to signup and takes no time.</h1>
        <form id="frmSignup">
            <input name="txtEmail" type="text" value="A@A.com" placeholder="email"> 
            <input name="txtPassword" type="password" value="123456" placeholder="password (6 to 30 characters)">
            <input name="txtConfirmPassword" type="password" value="123456" placeholder="Confirm password">
           <button id="btnSignup" type="submit" class="ok mt10">signup</button>
        </form>
    </div>
</div>


<?php
$sScript ='signup.js';
require_once './components/bottom.php';
