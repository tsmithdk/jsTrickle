<?php

session_start();
//VALIDATE BACKEND
// if(
//     empty($_POST['txtEmail']) ||
//     empty($_POST['txtPassword']) ||
//     !filter_var($_POST['txtEmail'], FILTER_VALIDATE_EMAIL) ||
//     !(strlen($_POST['txtPassword']) >= 6 && strlen($_POST['txtPassword']) <= 20)
//     ){
//     echo '{"status":0, "message":"**********CANNOT LOGIN: Api-login error********"}';
//     exit;
//     }


    $password = '123456';
    echo password_verify($password);

// //ENCRYPT PASSWORD (CBC)
// /* $password = $_POST['txtPassword'];
// $alg = "DES-CBC";
// $key = "gdfdfjdfkdfkdfkdf123245421";

// //function to retreive the exact length of the algorithm
// $iv_len = openssl_cipher_iv_length($alg);
// $iv = openssl_random_pseudo_bytes($iv_len);
// $cipher_text = openssl_encrypt($password, $alg, $key, OPENSSL_RAW_DATA, $iv);


// //encode password into base64
// $base64_chiper_text = base64_encode($cipher_text);
// //decrypt(decode) the password
// $password_decrypted = openssl_decrypt(base64_decode($base64_chiper_text), $alg, $key, OPENSSL_RAW_DATA, $iv);

//  */

//     //CONNECT TO DB
//     require_once __DIR__.'/../db.php';


// /*********************
//  ::SESSION LOGIN ATTEMPTS
//  ********************/

//  if($_SESSION['loginAttempt'] > 2){
//      echo '{"loginLimit": "reached", "attempts":'.$_SESSION['loginAttempt'].'}';
//      exit;
//  }




// /************************
//  :: SELECT from TBL_USERS
//  ************************/
// try{
//     $sQuery = $db->prepare('SELECT * FROM users
//                             WHERE email = :sEmail
//                             LIMIT 1'
//                             );

//     $sQuery->bindValue(':sEmail', $_POST['txtEmail']);
//     $sQuery->execute();
//     $aUsers = $sQuery->fetchAll();

//     if(count($aUsers)){
//         $pass = $aUsers[0]['password'];
//         if(password_verify($password, $hashed_password)){
//             $_SESSION['jUser'] = $aUsers[0];
//             echo '{"status":1, "message":"login success"}';
//          exit;
//           }

//     }

//    $_SESSION['loginAttempt'] = $_SESSION['loginAttempt'] + 1;

//     echo '{"status":0, "message":"cannot login", "attempts":'.$_SESSION['loginAttempt'].'}';
//             try{
//                 /******************************
//                 :: login email first attempt
//                 *******************************/
//                 $sLoginAttemptQuery = $db->prepare('INSERT INTO login_attempts
//                  VALUES (null,  :iTime, :bStatus, :sEmail)');

//                 $sLoginAttemptQuery->bindValue(':iTime', time());
//                 $sLoginAttemptQuery->bindValue(':bStatus', 0);
//                 $sLoginAttemptQuery->bindValue(':sEmail', $_POST['txtEmail']);
//                 $sLoginAttemptQuery->execute();

//             }catch(PDOException $exception){
//                 echo '{ "status":33, "message":"YOU CANNOT LOGIN FORM ::login email first attempt"}';
//                 var_dump($exception);
//             }


//              try{

//                  /*******************************
//                      :: Check how many attempts
//                  *******************************/
//                     $valid_attempts = time() - (5);
//                     $sCheckLoginAttempts = $db->prepare("SELECT time
//                                                         FROM login_attempts
//                                                         WHERE email = :sEmail AND
//                                                         status = 0 AND
//                                                         time > :iValidAttempts");

//                     $sCheckLoginAttempts->bindValue(':sEmail', $_POST['txtEmail']);
//                     $sCheckLoginAttempts->bindValue(':iValidAttempts', $valid_attempts);
//                     $sCheckLoginAttempts->execute();
//                     //if more than 3 block it
//                     if($sCheckLoginAttempts->rowCount() >= 3) {
//                         echo 'U ARE BLOCKED';
//                         return;
//                     }

//                     }catch(PDOException $exception){
//                     echo '{ "status":333, "message":"YOU CANNOT LOGIN FORM api-login"}';
//                     var_dump($exception);
//                     }

// }catch(PDOException $exception){
//     echo '{ "status":333, "message":"YOU CANNOT LOGIN FORM api-login"}';
//     var_dump($exception);


//     $_SESSION['loginAttempt'] = $_SESSION['loginAttempt'] + 1;

//     echo '{"status":0, "message":"cannot login", "attempts":'.$_SESSION['loginAttempt'].'}';



// }//end catch SELECT from TBL_USERS


