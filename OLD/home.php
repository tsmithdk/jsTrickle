<?php
// check if the user is logged
// not logged, take the user to the login page
session_start();
$sScript = 'home.js';
if( !$_SESSION['jUser'] ){
  header('Location: login.php');
  exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>keabook : : home</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/app.css">
  <link rel="stylesheet" href="css/home.css">
</head>
<body>

  <div class="container">


    <div class="top">
        <div id="logo">KEABOOK</div>
        <div id="friends">Friends</div>
        <a href="logout.php" id="logout">logout</a>
    </div>



    <div class="content">
      <form id="frmPost">
        <input id="txtPost" name="txtPost" type="text" value="" placeholder="What is in your mind?">
        <button type="submit" class="ok mt10" id="btnAddPost">Post</button>
      </form>

    <div id="posts">
  <!-- GET/SHOW POST -->
           <?php
            require_once 'db.php';
            try{
              $sQuery = $db->prepare('SELECT * FROM posts ORDER
              BY id DESC');
              $sQuery->execute();
              //get back an Array
              $aPosts = $sQuery->fetchAll();
              //print_r($aPosts);
              foreach ($aPosts as $aPost) { //[ [], [], [] ]

                $sEditAndDelete = '';

                if($aPost['user_id'] == $_SESSION['jUser']['id']){
                  $sEditAndDelete = " <button class='btnEdit'>edit</button>
                                      <button class='btnDelete'>delete</button>";
                }


                echo "<div id='".$aPost['id']."' class='post'>
                        <div class='message' contenteditable='false' required readonly> ".$aPost['message']."</div>
                        <div class='date'>".$aPost['date']."</div>
                        ".$sEditAndDelete."
                        <button class='btnLike'>like</button>
                        <div></div>
                    </div>";

              }

            }catch(PDOException $ex){
              echo "Sorry, System is updating...";

            }
           ?>

            </div>
    </div>

  </div>

<?php
  /* $sScript = 'home.js'; */
  require_once './components/bottom.php';
