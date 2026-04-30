<?php
session_start();
include("conect.php");

// STEP 1: Handle Login Request
if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepared Statement (Prevents SQL Injection)
    $stmt = $conn->prepare("SELECT * FROM users WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {

        $user = $result->fetch_assoc();

        // Verify Hashed Password
        if (password_verify($password, $user['password'])) {

            // Generate OTP for MFA
            $otp = rand(100000, 999999);

            $_SESSION['otp'] = $otp;
            $_SESSION['user'] = $username;

            // Simulate sending OTP (in real app use email/SMS)
            echo "<h3>OTP Sent: $otp</h3>";

            // Redirect to OTP verification page
            header("Location: verify.php");
            exit();

        } else {
            echo "<h2>Invalid Password</h2>";
        }

    } else {
        echo "<h2>User Not Found</h2>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<body>

<h2>Login Form</h2>

<form method="POST">
    Name: <input type="text" name="username"><br><br>
    Password: <input type="text" name="password"><br><br>
    <input type="submit" name="submit">
</form>

</body>
</html>
