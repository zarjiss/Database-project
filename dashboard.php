<?php
session_start();


if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION["user_name"]; ?>!</h1>
    <p>You are now logged in.</p>
    <a href="logout.php">Logout</a>  <!-- Logout button -->
</body>
</html>
