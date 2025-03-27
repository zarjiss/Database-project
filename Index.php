<?php
session_start();
require_once("database.php");

$success_message = "";
$error_message = "";

// Handle Sign-Up
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["signup"])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Check if email already exists
    $check_query = "SELECT * FROM users WHERE email = '$email'";
    $check_result = mysqli_query($con, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        $error_message = "Email already exists. Please use another email.";
    } else {
        $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
        if (mysqli_query($con, $query)) {
            $success_message = "Registration Successful! You can now Sign In.";
        } else {
            $error_message = "Error: " . mysqli_error($con);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up & Sign In | AsmrProg</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container" id="container">
        <!-- Sign Up Form -->
        <div class="form-container sign-up">
            <form action="" method="post">
                <h1>Create Account</h1>
                <span>or use your email for registration</span>
                <input type="text" name="name" placeholder="Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" name="signup">Sign Up</button>
            </form>
            <?php if ($success_message): ?>
                <p class="message success"><?php echo $success_message; ?></p>
            <?php endif; ?>
            <?php if ($error_message): ?>
                <p class="message error"><?php echo $error_message; ?></p>
            <?php endif; ?>
        </div>

        <!-- Sign In Form -->
        <div class="form-container sign-in">
            <form action="login.php" method="post">
                <h1>Sign In</h1>
                <span>or use your email & password</span>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" name="signin">Sign In</button>
            </form>
        </div>

        <!-- Toggle Section -->
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your details to log in</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello Friend!</h1>
                    <p>Sign up with your details</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
