<?php
header("X-Frame-Options: DENY");
header("X-Content-Type-Options: nosniff");
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once("conect.php");


if(isset($_POST['submit']))
{

    // attempt initialize
//    if(!isset($_SESSION['attempts'])){
  //      $_SESSION['attempts'] = 0;
   // }

    // block condition
     //   if($_SESSION['attempts'] >= 5){
       // echo "Too many attempts. Try later.";
       // exit();
   // }
if($password !== $_POST['confirm_password']){
    echo "Passwords do not match";
    exit();
}
     $username = trim($_POST['username']);
    $password =  trim($_POST['password']);
   if(strlen($username) < 3){
    echo "<h3 style='color:red;'>Invalid username (min 3 characters)</h3>";
    exit();
if(strlen($username) > 20){
    echo "<h3>Username too long</h3>";
    exit();
}
}
    $stmt =mysqli_prepare($conn,
                   "SELECT * FROM users WHERE username = ? AND password = ?");
    mysqli_stmt_bind_param($stmt, "ss" ,$username ,$password);
    mysqli_stmt_execute($stmt);
    $result =mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($result) > 0){
   session_regenerate_id(true); 
   $_SESSION['user'] = $username; 

    $_SESSION['attempts'] = 0;
    echo "<h2>Login Success</h2>";
   echo "<a href='logout.php'>Logout</a>";
} else {

    $_SESSION['attempts']++;
   sleep(2); 
    echo "<h3>Invalid username or password</h3>";
}
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>secure code review</title>
</head>
<body>

<h2>Login Form</h2>

<form method="POST" autocomplete="off">
    Name: <input required type="text" name="username"><br><br>
    Password: <input required type="password" name="password"><br><br>
    <input type="submit" name="submit">
</form>

</body>
</html>
