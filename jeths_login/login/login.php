<?php
session_start();
require "config.php";

// Already logged in? Go straight to the dashboard.
if (isset($_SESSION["username"])) {
    header("Location: dashboard.php");
    exit;
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = $_POST["password"];

    if (!$conn) {
        $error = "Could not connect to the database.";
    } else {
        // Look up the user by username
        $stmt = mysqli_prepare($conn, "SELECT Password FROM users WHERE Username = ?");
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($result);

        // Compare the typed password with the stored hash
        if ($user && password_verify($password, $user["Password"])) {
            $_SESSION["username"] = $username;
            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Invalid username or password.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Jeth's Photography</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="login-page">

<div class="login-box">
    <h1>Jeth's Photography</h1>
    <p class="subtitle">Sign in to continue</p>

    <?php if ($error != ""): ?>
        <div class="error"><?= $error ?></div>
    <?php endif; ?>

    <form method="post" action="login.php">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required value="<?= isset($username) ? htmlspecialchars($username) : '' ?>">

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Log In</button>
    </form>
</div>

</body>
</html>
