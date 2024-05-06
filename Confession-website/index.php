<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: home.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="css/regn_login.css">
  <script src="js/index.js"></script>
  <title>Confession</title>
</head>
<body>
	<nav>
	  <h1>Confession</h1>

	</nav>
	<div class="parent">
	  <form class="child" action="index.php" method="POST">
	<?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
    $username = $_POST["username"];
    $email = strtolower($_POST["email"]);
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $gender = $_POST["gender"];
    require_once "Connectdb64.php";
    
    $sql_exist = "SELECT * FROM user64 WHERE email = '$email'";
    $result = mysqli_query($conn, $sql_exist);
    $row_count = mysqli_num_rows($result);
    if(empty($username) OR empty($password) OR empty($cpassword) OR empty($email)){
      echo "<div class='alert alert-danger'>All fields are required</div>";
    }
    elseif($password != $cpassword){
      echo "<div class='alert alert-danger'>Password mismatched</div>";
    }
    elseif($row_count > 0){
      echo "<div class='alert alert-danger'>Email already exist!</div>";
    }
    elseif(empty($_POST['checkbox'])){
      echo "<div class='alert alert-danger'>Click on the Checkbox</div>";
    }
    else{
      $passwordHash = password_hash($password, PASSWORD_DEFAULT);
      $sql_register = "INSERT INTO user64 (username, password, email, gender) VALUES ('$username','$passwordHash','$email','$gender')";
      $sql_query_reg = mysqli_query($conn, $sql_register);
      if($sql_query_reg){
       echo "<div class='alert alert-success'>Registered successfull, Proceed to Login.</div>";
      }
      else{
       echo "<div class='alert alert-danger'>Something went wrong</div>";
      }
    }
  } ?>
	    
	    <div>
	    <input class="inp" type="text" placeholder="Enter Username" name="username">
	    </div>
	    <div>
	    <input class="inp" type="email" placeholder="Enter Email" name="email">
	    </div>	    
	     <div>
	    <input class="inp" type="password" placeholder="Enter Password" name="password">
	    </div>
	     <div>
	    <input  class="inp" type="password" placeholder="Confirm Your Password" name="cpassword">
	    </div>
	    <div>
	      <select name="gender" id="gender">
          <option value="male">Male</option>
          <option value="female">Female</option>
          <option value="other">Other</option>
        </select>
	    </div>
	    <div class="chkdiv">
	    <input class="chkbox" name="checkbox" type="checkbox">
	    <label for="checkbox" >Agree Terms and Conditions</label>
	    </div>	    
	     <div>
	    <input class="btn" type="submit" value="Register" name="register">
	    </div>

	    <div>
	      <p class="ptag">Already registered? <a href="login.php">Log In.</a></p>
	    </div>
	  </form>
	</div>

</body>
</html>