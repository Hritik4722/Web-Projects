<?php
session_start();
if (!isset($_SESSION["user"])) {
  header("Location: login.php");
}
$gender_id = true;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MyConfessions</title>

    <link rel="stylesheet" href="css/foot_nav.css">
    <link rel="stylesheet" href="css/profile.css">
  </head>
  <body>
    <nav>
      <img src="img/logo.png" width="35px">
      <h3>@<?php echo "{$_SESSION["user"]}"; ?></h3>
      <a href="logout.php" class="btn btn-warning">Logout</a>
    </nav>
    <div class="parentp">
      <div class="img_profile">
        <?php
        if($_SESSION['gender'] === 'male'){
          echo "<img src='img/avatar.png'>";
          $gender_id = true;
        }
        else{
          echo "<img src='img/avatarf.png'>";
          $gender_id= false;
        }
        ?>
         <?php echo "<p class='email_p' >{$_SESSION["email"]}</p>"; ?>
      </div>
      <div class="co_parent">
        <div class="public_btn clicked_btn" id="public_b">
        <p class="c_btn">Public</p>
        </div>
        <div class="private_btn" id="private_b">
        <p class="c_btn">Private</p>
        </div>
      </div>
    </div>
    <div class="Public_confess " id="Public_con">
    <?php
    $sr_num = $_SESSION["sr_no"];
    require_once "Connectdb64.php";
    //$sql = "SELECT * FROM Confession WHERE type = 'public' AND `sr.no` = '$sr_num'";
   $sql = "SELECT *,DATE_FORMAT(time, '%d/%b/%y') AS formatted_date,DATE_FORMAT(time, '%H:%i:%s') AS formatted_time FROM Confession WHERE type = 'public' AND `sr.no` = '$sr_num'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
      }
      $rev_rows = array_reverse($rows);
      foreach ($rev_rows as $roww){
        echo "<div class='confession_d'>";
        echo "<div class='prf_img'>";
        if($gender_id){
          echo "<img src='img/avatar.png' width='50px'>";
        }
        else{
          echo "<img src='img/avatarf.png' width='50px'>";
        }
        echo "</div>";
        echo "<div class='con_message'>";
        echo "<div class='con_message_d2'>";
        echo "<p> {$_SESSION["user"]}</p>";
        echo "<div class='con_message_d3'>";
        echo "<span>{$roww["formatted_date"]} |</span>";
        echo "<span style='padding-left:3px;'>{$roww["formatted_time"]}</span>";
        echo "</div>";
        echo "</div>";
        echo "<p2>" . htmlspecialchars($roww["confession"]) . "</p2>";
        echo "</div>";
        echo "</div>";
      }
    } else {
        echo "<center>No confessions yet!.</center>";
    }
    
    ?>
    </div>
    <div class="private_confess confess_h" id="private_con">
      <?php 
     //$sql_p = "SELECT * FROM Confession WHERE type = 'private' AND `sr.no` = '$sr_num'";
     $sql_p = "SELECT *,DATE_FORMAT(time, '%d/%b/%y') AS formatted_date,DATE_FORMAT(time, '%H:%i:%s') AS formatted_time FROM Confession WHERE type = 'private' AND `sr.no` = '$sr_num'";
          
    $result_p = mysqli_query($conn, $sql_p);
    if ($result_p->num_rows > 0) {
      while ($row_p = mysqli_fetch_assoc($result_p)) {
       $row_pp[] = $row_p;
      }
      $rev_rowp = array_reverse($row_pp);
      foreach ($rev_rowp as $row_){
         echo "<div class='confession_d'>";
        echo "<div class='prf_img'>";
        if($gender_id){
          echo "<img src='img/avatar.png' width='50px'>";
        }
        else{
          echo "<img src='img/avatarf.png' width='50px'>";
        }
        echo "</div>";
        echo "<div class='con_message'>";
        echo "<div class='con_message_d2'>";
        echo "<p> {$_SESSION["user"]}</p>";
        echo "<div class='con_message_d3'>";
        echo "<span>{$roww["formatted_date"]} |</span>";
        echo "<span style='padding-left:3px;'>{$roww["formatted_time"]}</span>";
        echo "</div>";
        echo "</div>";
        echo "<p2>". htmlspecialchars($row_["confession"])."</p2>";
        echo "</div>";
        echo "</div>";
      }
    } else {
      echo "<center>No confessions yet!.</center>";
    }
    mysqli_close($conn);
    ?> 
    </div>
    <footer>
      <div class="opt" id="home">
        <img class="btm-icn"  src="img/home.svg" width="30px">
        <p class="pclr">HOME</p>
      </div>
      <div class="opt" id="pencil">
        <img class="btm-icn"  src="img/pencil.svg" width="30px">
        <p>CONFESS</p>
      </div>
      <div class="opt" id="profile">
      <div class="btn_clicked">
<svg version="1.0" xmlns="http://www.w3.org/2000/svg"
 width="20px" height="20px" viewBox="0 0 300.000000 294.000000"
 preserveAspectRatio="xMidYMid meet" class="btm-icn">
<metadata>
Created by potrace 1.10, written by Peter Selinger 2001-2011
</metadata>
<g transform="translate(0.000000,294.000000) scale(0.100000,-0.100000)"
fill="#ffffff" stroke="none">
<path d="M1305 2755 c-209 -34 -413 -117 -577 -235 -99 -71 -241 -213 -312
-312 -154 -217 -238 -484 -238 -758 0 -222 44 -413 140 -602 190 -372 538
-628 962 -710 36 -6 135 -12 220 -12 234 0 388 36 595 139 370 185 638 545
710 952 20 114 20 342 0 456 -46 259 -165 493 -351 687 -190 197 -422 326
-687 381 -134 27 -341 34 -462 14z m316 -405 c164 -51 272 -200 272 -375 0
-283 -277 -468 -545 -366 -162 62 -271 257 -239 428 45 244 278 386 512 313z
m114 -1052 c314 -64 555 -220 555 -358 0 -74 -200 -263 -365 -345 -138 -69
-261 -97 -420 -98 -184 0 -322 35 -472 119 -151 84 -323 256 -323 323 0 109
146 230 370 309 235 81 429 96 655 50z"/>
</g>
</svg>

      </div>
        <p>PROFILE</p>
      </div>
    </footer>

	<script src="js/btmbtn.js"></script>
	<script src="js/profile.js"></script>
  </body>
</html>