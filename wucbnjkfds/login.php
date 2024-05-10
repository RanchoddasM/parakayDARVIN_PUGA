<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAB ACT 3</title>

    <!--<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="logincss.css"> -->
</head>

<body>
<center>
    <div class="form">
                         
            <div class="login">
                <form method="post">
                <h2>LOGIN</h2>
                <input type="text" placeholder="Username" name="uname">
                <input type="password" placeholder="Password" name="pass">
                <input type="submit" value="Login" name="log">
                <a href="">Forgot password?</a>
            </form>
            </div>
            <div class="register">
               <form method="post">
                <h2>REGISTER</h2>
                <input type="text" placeholder="Username" name="uname" required>
                <input type="password" placeholder="Password" name="pass" required>
                <input type="password" placeholder="Confirm Password" name="cpass" required>
                <input type="submit" name="reg" value="Register">
            </form> 
            </div>
        
    </div>
</center>    
    <script type="text/javascript" src="loginjs.js"></script>
</body>
</html>

<?php
session_start();
    include 'cnct.php';

    if (isset($_POST['reg'])) {
        $uname = $_POST['uname'];
        $pass = $_POST['pass'];
        $cpass = $_POST['cpass'];


    $namecheck = "SELECT * FROM `user` WHERE `username` = '$uname'";
    $check = mysqli_query($conn, $namecheck);

    if (mysqli_num_rows($check) > 0) {
        echo '<script>alert("Username already exist")</script>';
        header("refresh:0;");
    }elseif ($pass != $cpass) {
        echo '<script>alert("Password Confirmation: Unmatched")</script>';
    }
    else{
        $sql = "INSERT INTO `user`(`username`, `pass`) VALUES ('$uname','$pass')";
        $res = mysqli_query($conn, $sql);

        if ($res) {
            echo '<script>alert("Registered Successfully")</script>';
        }else {
      echo '<script>alert("Errorrrrr")</script>';
    }
    }

    }

//============================================================================//
if (isset($_POST['log'])) {

if (isset($_POST['uname']) && isset($_POST['pass'])){
  function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $name = $_POST['uname'];
$pass = $_POST['pass'];

$sql = "SELECT `id`, `username`, `pass` FROM `user` WHERE `username` = '$name' AND `pass` = '$pass'";
$result = mysqli_query($conn, $sql);


if(mysqli_num_rows($result) == 1){
  $row = mysqli_fetch_assoc($result);
    
    if($row['username'] == $name && $row['pass'] == $pass) {
$_SESSION['username'] = $row['username'];
$_SESSION['pass'] = $row['pass'];
$_SESSION['id'] = $row['id'];
$name = $_SESSION['username'];
$pass = $_SESSION['pass'];
$aydi = $_SESSION['id'];
header("location: home.php");
   exit();
    
    }elseif($row['username'] == $name && $row['pass'] != $pass){
         header("refresh:0;");
  echo '<script>alert("Account | Username and Password | Unmatched")</script>';
  exit();
    }

}

}
}

?>