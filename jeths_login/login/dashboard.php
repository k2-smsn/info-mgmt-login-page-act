<?php
session_start();

// Not logged in? Send them back to the login page.
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | Jeth's Photography</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>Jeth's Photography</h1>
    <a href="logout.php">Log Out</a>
</header>

<main>
    <h2>Welcome, <?= htmlspecialchars($_SESSION["username"]) ?>!</h2>
    <p>You are logged in. Choose what you want to do:</p>

    <div class="menu">
        <a href="../register_customer.php">Customer Registration</a>
        <a href="../add_service.php">Service Management</a>
    </div>
</main>

</body>
</html>
