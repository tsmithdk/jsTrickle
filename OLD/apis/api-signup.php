<?php

///////    SYNTAX ERROR CHECK    ////////////
error_reporting(E_ALL);
ini_set('display_errors','On');
///////    END SYNTAX ERROR CHECK    ////////////
/*
  if(
      empty($_POST['txtEmail']) ||
      empty($_POST['txtPassword']) ||
      empty($_POST['txtConfirmPassword']) ||
      !filter_var($_POST['txtEmail'], FILTER_VALIDATE_EMAIL) ||
      !(strlen($_POST['txtPassword']) >= 6 && strlen($_POST['txtPassword']) <= 20) ||
      !($_POST['txtPassword'] == $_POST['txtConfirmPassword'])
  ){
    echo '{"status":0, "message":"******************"}';
    exit;
  } */

  //HASHING
  $password = $_POST['txtPassword'];
  $options = [
      'cost'=> 5,
  ];
$hashed_password =  password_hash($password, PASSWORD_DEFAULT, $options);





/* //ENCRYPT PASSWORD (CBC)
  $password = $_POST['txtPassword'];
  $alg = "DES-CBC";
  $key = "gdfdfjdfkdfkdfkdf123245421";

//function to retreive the exact length of the algorithm
  $iv_len = openssl_cipher_iv_length($alg);
  $iv = openssl_random_pseudo_bytes($iv_len);
  $cipher_text = openssl_encrypt($password, $alg, $key, OPENSSL_RAW_DATA, $iv);


//encode password into base64
  $base64_chiper_text = base64_encode($cipher_text);
//decrypt(decode) the password
  // echo openssl_decrypt(base64_decode($base64_chiper_text), $alg, $key, OPENSSL_RAW_DATA, $iv);
 */



  require_once '../db.php';
  try{
    //echo '{"status":4, "activationKey":"'. $sActivationKey.'"}';
    $iBlockedDate = time();
    $sQuery = $db->prepare('INSERT INTO users
                            VALUES (null,  :sEmail, :sPassword, :bBlocked, :iBlockedDate)');

    $sQuery->bindValue(':sEmail', $_POST['txtEmail']);
    $sQuery->bindValue(':sPassword', $hashed_password);
    $sQuery->bindValue(':bBlocked', 0);
    $sQuery->bindValue(':iBlockedDate', $iBlockedDate);
    $sQuery->execute();
    if( $sQuery->rowCount() ){
      echo '{"status":1, "message":"success"}';
      exit;
    }
    //echo '{"status":0, "message":"error"}';
  }catch( PDOException $e ){
    var_dump($e);
    echo '{"status":0, "message":"error", "code":"001", "line":'.__LINE__.'}';
  }


