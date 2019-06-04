<?php

//VALIDATE BACKEND
if(
empty($_POST['txtEmail']) ||
empty($_POST['txtPassword']) ||
!filter_var($_POST['txtEmail'], FILTER_VALIDATE_EMAIL) ||
!(strlen($_POST['txtPassword']) >= 6 && strlen($_POST['txtPassword']) <= 20)
){
echo '{"status":0, "message":"**********CANNOT LOGIN: Api-login error********"}';
exit;
}

//CONNECT TO DB
require_once __DIR__.'/../db.php';



try{

/*------------------------------------------------
    :: Check how many attempts
 ------------------------------------------------*/
    $valid_attempts = time() - (5 * 60);
    $sCheckLoginAttempts = $db->prepare("SELECT time
                                         FROM login_attempts
                                         WHERE email = :sEmail AND
                                         status = 0 AND
                                         time > :iValidAttempts");

    $sCheckLoginAttempts->bindValue(':sEmail', $_POST['txtEmail']);
    $sCheckLoginAttempts->bindValue(':iValidAttempts', $valid_attempts);
    $sCheckLoginAttempts->execute();
    //if more than 3 block it
    if($sCheckLoginAttempts->rowCount() >= 3) {
        echo 'U ARE BLOCKED';
        return;
    }


/*------------------------------------------------
    :: login email first attempt
 ------------------------------------------------*/
    $sLoginAttemptQuery = $db->prepare('INSERT INTO login_attempts
    VALUES (null,  :iTime, :bStatus, :sEmail)');

    $sLoginAttemptQuery->bindValue(':iTime', time());
    $sLoginAttemptQuery->bindValue(':bStatus', 0);
    $sLoginAttemptQuery->bindValue(':sEmail', $_POST['txtEmail']);
    $sLoginAttemptQuery->execute();


    $sQuery = $db->prepare('SELECT * FROM users
                            WHERE email = :sEmail AND
                            password = :sPassword
                            LIMIT 1'
                            );

    $sQuery->bindValue(':sEmail', $_POST['txtEmail']);
    $sQuery->bindValue(':sPassword',$_POST['txtPassword']);
    $sQuery->execute();
    $aUsers = $sQuery->fetchAll();

    if(count($aUsers)){
        session_start();
        $_SESSION['jUser'] = $aUsers[0];
        $sLoginAttemptQuery->bindValue(':iTime', time());
        $sLoginAttemptQuery->bindValue(':bStatus', 1);
        $sLoginAttemptQuery->bindValue(':sEmail', $_POST['txtEmail']);
        $sLoginAttemptQuery->execute();
        echo '{ "status":1, "message":"LOGIN SUCCESS"}';
        exit;
    }
   echo '{ "status":222, "message":"YOU CANNOT LOGIN"}';


}catch(PDOException $exception){
    echo '{ "status":333, "message":"YOU CANNOT LOGIN FORM api-login"}';
    var_dump($exception);
}

