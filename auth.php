<?php
include "db.php";
// Get action (signup or signin)

session_start();

$action = $_POST["action"] ?? ""; 

// ---------------------------
// 1. USER SIGN UP LOGIC
// ---------------------------
if ($action == "signup") {

    $username = $_POST["username"];
    $email = $_POST["user_email"];
    $phone = $_POST["user_no"];
    $password = $_POST["user_password"];

    // Check if email or username already exists
    $check = $conn->query("SELECT * FROM signin WHERE username='$username' OR user_email='$email'");

    if ($check->num_rows > 0) {
        echo "<script>alert('User already exists! Please log in.'); window.location='auth.php';</script>";
        exit;
    }

    // Insert new user
    $sql = "INSERT INTO signin (username, user_email, user_no, user_password)
            VALUES ('$username', '$email', '$phone', '$password')";

    if ($conn->query($sql)) {
        echo "<script>alert('Account created successfully! Please log in.'); window.location='auth.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}



// ---------------------------
// 2. USER SIGN IN LOGIC
// ---------------------------
if ($action == "signin") {
    
    $email = $_POST["user_email"];
    $password = $_POST["user_password"];

    $result = $conn->query("SELECT * FROM signin WHERE user_email='$email' AND user_password='$password'");

    if ($result->num_rows == 1) {

        $user = $result->fetch_assoc();

        // store user info in session
        $_SESSION["username"] = $user["username"];
        $_SESSION["user_id"] = $user["user_id"];

        echo "<script>alert('You are logged in!'); window.location='index.php';</script>";
        exit;
    } else {
        echo "<script>alert('Invalid Email or Password!'); window.location='auth.php';</script>";
        exit;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green Connect - Auth</title>
    <link rel="stylesheet" href="auth.css">
</head>
<body>

<!-- NAVBAR -->


<!-- TOP SECTION TEXT -->
<div class="top-section">
    <div class="icon">🌱</div>
    <h2>Green Connect</h2>
    <p class="community-title">Join Our Community</p>
    <p class="community-sub">Connect with plant lovers in your area</p>
</div>

<!-- AUTH CARD -->
<div class="auth-card">

    <!-- TAB SWITCH -->
    <div class="tab-row">
        <button id="tabSignIn" class="tab active" onclick="showSignIn()">Sign In</button>
        <button id="tabSignUp" class="tab" onclick="showSignUp()">Sign Up</button>
    </div>

    <!-- SIGN IN FORM -->
    <form id="signInForm" class="form-section" action="auth.php" method="post">
    <input type="hidden" name="action" value="signin">

    <label>Email</label>
    <input type="email" name="user_email" required>

    <label>Password</label>
    <input type="password" name="user_password" required>

    <button class="submit-btn">Sign In</button>
    </form>

        <p class="switch-text">Don't have an account? <span onclick="showSignUp()">Switch to Sign Up</span></p>
    </form>

    <!-- SIGN UP FORM -->
   <form id="signUpForm" class="form-section hidden" action="auth.php" method="post">
    <input type="hidden" name="action" value="signup">

    <label>Full Name</label>
    <input type="text" name="username" required>

    <label>Email</label>
    <input type="email" name="user_email" required>

    <label>Phone Number</label>
    <input type="text" name="user_no" required>

    <label>Password</label>
    <input type="password" name="user_password" required>

    <button class="submit-btn">Create Account</button>
</form>
      <p class="switch-text">Already have an account? <span onclick="showSignIn()">Switch to Sign In</span></p>
   
</div>

<!-- FOOTER NOTE -->
<p class="footer-note">
    By continuing, you agree to Green Connect’s terms of service and privacy policy
</p>

<script>
function showSignIn() {
    document.getElementById("signInForm").classList.remove("hidden");
    document.getElementById("signUpForm").classList.add("hidden");

    document.getElementById("tabSignIn").classList.add("active");
    document.getElementById("tabSignUp").classList.remove("active");
}

function showSignUp() {
    document.getElementById("signInForm").classList.add("hidden");
    document.getElementById("signUpForm").classList.remove("hidden");

    document.getElementById("tabSignUp").classList.add("active");
    document.getElementById("tabSignIn").classList.remove("active");
}
</script>

</body>
</html>
