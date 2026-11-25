<?php
// Database connection - same details as your main site's config.php.
try {
    $conn = mysqli_connect("sqlXXX.infinityfree.com", "if0_XXXXXXXX", "your_password_here", "if0_XXXXXXXX_jeths_photography");
} catch (mysqli_sql_exception $e) {
    $conn = false;
}
