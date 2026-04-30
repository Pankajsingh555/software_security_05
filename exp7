<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("conect.php");

if(isset($_POST['submit'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    // STEP 1: Get user from DB
    $stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE username = ?");
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($result) > 0){

        $user = mysqli_fetch_assoc($result);

        // STEP 2: Verify password
        if(password_verify($password, $user['password'])){
            echo "<h2>Login Success</h2>";
        } else {
            echo "<h2>Invalid Password</h2>";
        }

    } else {
        echo "<h2>User Not Found</h2>";
    }
}
?>
