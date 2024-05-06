<?php
session_start();
if (!isset($_SESSION["user"])) {
  header("Location: login.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MyConfessions</title>
   
    <link rel="stylesheet" href="css/foot_nav.css">
    <link rel="stylesheet" href="css/confess.css">
  </head>
  <body>
   <form action="confess.php" method="POST">
    <nav>
      <img src="img/confessit.png" height="40px">
    </nav>
    <div>
      <div class="bcg_clr">
        <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["confess"])) {
          $confession = $_POST["confession"];
          $sr_no = $_SESSION["sr_no"];
          $userr = $_SESSION["user"];
          $gender = $_SESSION["gender"];
          $type = $_POST["visibility"];
          $category = $_POST["category"];

          require_once "Connectdb64.php";
          if (!empty($confession)) {

            $sql_confess ="INSERT INTO `Confession` (`sr.no`, `username`, `type`,`category`, `confession`, `gender`) VALUES (?, ?, ?, ?, ?, ?)";

            $stmt = mysqli_prepare($conn, $sql_confess);
            mysqli_stmt_bind_param($stmt,"isssss",$sr_no,$userr,$type,$category,$confession,$gender);

            if (mysqli_stmt_execute($stmt)) {
              echo "<div class='alert alert-success'>Successfully shared your {$_POST['category']}</div>";
              echo "<script>setTimeout(function() {window.location.href='home.php';}, 1300);</script>";
              exit();
            } else {
              echo "<p>Unsuccessful {$_POST['category']}.</p>";
              echo "Error: " . mysqli_stmt_error($stmt);
            }

            mysqli_stmt_close($stmt);
          } else {
            echo "<div class='alert alert-danger'>Write Something!</div>";
          }
        } ?>
      

        
        <textarea  name="confession" id="confession" placeholder="Share your confession and let the world know about it."></textarea>
        <div class="type_post">
         <select name="category" id="category">
          <option value="Confession">Confession</option>
          <option value="Love story">Love story</option>
          <option value="Confusion">Confusion</option>
        </select>
        
        <select name="visibility" id="visibility">
          <option value="public">Public</option>
          <option value="private">Private</option>
        </select>

        </div>
        </div>
        <div class="button">
        <input class="btn2" type="submit" value="Confess it!" name="confess">
        </div>
        
    </div>
      </form>
    <footer>
      <div class="opt" id="home">
        <img class="btm-icn" src="img/home.svg" width="30px">
        <p>HOME</p>
      </div>
      <div class="opt" id="pencil">
        <div class="btn_clicked">
<svg version="1.0" xmlns="http://www.w3.org/2000/svg"
  height="20px" width="20px" viewBox="0 0 256.000000 256.000000"
 preserveAspectRatio="xMidYMid meet" class="btm-icn">
<metadata>
Created by potrace 1.10, written by Peter Selinger 2001-2011
</metadata>
<g transform="translate(0.000000,256.000000) scale(0.050000,-0.050000)"
fill="#ffffff" stroke="none">
<path d="M3890 4762 c-45 -21 -183 -142 -315 -275 l-235 -237 456 -456 455
-455 252 256 c403 407 402 444 -10 862 -350 355 -420 391 -603 305z"/>
<path d="M1965 2875 l-1245 -1245 455 -455 455 -455 1245 1245 c685 685 1245
1254 1245 1265 0 26 -864 890 -890 890 -11 0 -580 -560 -1265 -1245z"/>
<path d="M632 1459 c-20 -57 -309 -1129 -305 -1132 6 -6 1130 304 1141 314 6
6 -178 199 -408 429 -277 277 -422 408 -428 389z"/>
</g>
</svg>
      </div>
        <p>CONFESS</p>
      </div>
      <div class="opt" id="profile">
        <img class="btm-icn"  src="img/profile.svg" width="30px">
        <p>PROFILE</p>
      </div>
    </footer>
	<script src="js/btmbtn.js"></script>
  </body>
</html>