<?php
session_start();
if (!isset($_SESSION["user"])) {
  header("Location: login.php");
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
    <link rel="stylesheet" href="css/home.css">
  </head>
  <body>
    <nav>
      
      <img src="img/logo2.png" alt="logo" >

      
    </nav>
    <div class="confession_home">
          <?php
          $sr_num = $_SESSION["sr_no"];
          require_once "Connectdb64.php";

          $sql =
            "SELECT *,DATE_FORMAT(time, '%d/%b/%y') AS formatted_date,DATE_FORMAT(time, '%H:%i:%s') AS formatted_time FROM Confession WHERE type = 'public'";
          $result = mysqli_query($conn, $sql);
          if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              $rows[] = $row;
            }
            $rev_rows = array_reverse($rows);
            foreach ($rev_rows as $roww) {
              echo "<div class='confession_d'>";
              echo "<div class='prf_img'>";
              echo "<div class='prf_d1'>";
              if ($roww["gender"] === "male") {
                echo "<img src='img/avatar.png' width='100%'>";
              } else {
                echo "<img src='img/avatarf.png' width='100%'>";
              }
              echo "</div>";
              echo "<div class='header_con'>";
              echo "<div class='header_con2'>";
              echo "<p> {$roww["username"]}</p>";
              echo "<div class='header_con3'>";
              echo "<span style='font-size:0.7rem';> {$roww["category"]} |</span>";
              echo "<span class='time'> {$roww["formatted_time"]}</span>";
              echo "</div>";
              echo "</div>";
              echo "<span>{$roww["formatted_date"]}</span>";
              echo "</div>";
              echo "</div>";
              echo "<div class='con_mes'>";
              
              echo "<p2>" . htmlspecialchars($roww["confession"]) . "</p2>";
              echo "</div>";
              echo "<div class='reaction'>";
              echo "<div class='like'>";
              
              echo "</div>";
              echo "<div class='dilike'>";
              
              echo "</div>";
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
      <div class="btn_clicked">
       <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
       width="20px" height="20px" viewBox="0 0 900.000000 900.000000"
       preserveAspectRatio="xMidYMid meet" class="btm-icn">
      <metadata>
      Created by potrace 1.10, written by Peter Selinger 2001-2011
      </metadata>
      <g transform="translate(0.000000,900.000000) scale(0.100000,-0.100000)"
fill="#ffffff" stroke="none">
<path d="M4442 7823 c-22 -21 -58 -54 -80 -73 -22 -19 -80 -71 -128 -115 -49
-44 -118 -106 -154 -137 -36 -31 -91 -80 -122 -110 -31 -29 -69 -64 -83 -77
-15 -13 -73 -64 -129 -115 -55 -50 -121 -109 -146 -130 -42 -36 -87 -77 -295
-268 -44 -40 -119 -106 -165 -147 -98 -86 -205 -183 -329 -296 -47 -44 -124
-113 -171 -154 -72 -63 -237 -211 -274 -247 -25 -23 -235 -211 -272 -243 -21
-18 -79 -70 -128 -115 -197 -180 -224 -204 -301 -271 -44 -38 -104 -92 -133
-120 -29 -27 -72 -65 -94 -85 -22 -19 -84 -75 -137 -124 -53 -49 -127 -116
-166 -149 -38 -33 -100 -88 -137 -121 -152 -140 -211 -191 -229 -200 -54 -26
-4 -31 352 -36 l364 -5 5 -1545 5 -1545 23 -57 c24 -59 86 -148 103 -148 6 0
22 -9 36 -20 14 -11 56 -29 93 -40 64 -19 96 -20 1023 -20 526 0 958 1 959 3
2 1 5 592 8 1312 l5 1310 745 0 745 0 5 -1310 5 -1310 960 -2 c931 -3 961 -2
1026 17 36 11 78 29 92 40 14 11 30 20 36 20 17 0 79 89 103 148 l23 57 5
1545 5 1545 355 3 c195 1 358 6 363 11 4 4 -24 37 -63 72 -39 35 -92 84 -118
108 -26 24 -99 89 -162 145 -108 95 -149 133 -360 325 -47 43 -105 95 -130
117 -42 36 -204 182 -276 249 -61 56 -119 108 -234 209 -102 90 -195 175 -315
285 -94 87 -410 369 -451 403 -25 21 -58 50 -73 65 -57 57 -138 131 -221 202
-47 41 -112 99 -146 130 -190 174 -243 222 -278 252 -54 46 -255 227 -288 258
-32 32 -48 46 -228 206 -80 70 -177 158 -216 194 -96 89 -156 141 -165 141 -3
0 -25 -17 -47 -37z"/>
</g>
</svg>

      </div>
        <p class="pclr">HOME</p>
      </div>
      <div class="opt" id="pencil">
        <img class="btm-icn"  src="img/pencil.svg" width="30px">
        <p>CONFESS</p>
      </div>
      <div class="opt" id="profile">
        <img class="btm-icn"  src="img/profile.svg" width="30px">
        <p>PROFILE</p>
      </div>
    </footer>
    <?php
//echo "<h1>{$_SESSION["user"]}</h1>";
?>
    

    
	<script src="js/btmbtn.js"></script>
  </body>
</html>