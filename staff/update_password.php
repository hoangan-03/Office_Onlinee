<?php
session_start();

$conn_str = "postgresql://webdb_owner:htx50eprzaUA@ep-weathered-poetry-a129mhzu.ap-southeast-1.aws.neon.tech/webdb?options=endpoint%3Dep-weathered-poetry-a129mhzu&sslmode=require";
$dbconn = pg_connect($conn_str);
if (!$dbconn) {
    die("Connection failed: " . pg_last_error());
}

$old_password = $_POST['old_password'];
$new_password = $_POST['new_password'];
$username = $_POST['username']; // Get the username from the form submission

// Hash the passwords
$hashed_old_password = substr(hash('sha512', $old_password) . hash('sha512', $old_password) . hash('sha512', $old_password), 0, 255);
$hashed_new_password = substr(hash('sha512', $new_password) . hash('sha512', $new_password) . hash('sha512', $new_password), 0, 255);

// Check if the new password is the same as the old password
if ($hashed_old_password == $hashed_new_password) {
    $_SESSION['error'] = "New password cannot be the same as the old password.";
    header("Location: account_info.php");
    exit;
}

// Get the current password from the database
$query = "SELECT password FROM users WHERE username = '{$username}'";
$result = pg_query($dbconn, $query);
if (!$result) {
    die("Error in SQL query: " . pg_last_error());
}
$current_password = pg_fetch_result($result, 0, 'password');

// Check if the old password is correct
if ($hashed_old_password == $current_password) {
    // Update the password in the database
    $query = "UPDATE users SET password = '{$hashed_new_password}' WHERE username = '{$username}'";
    $result = pg_query($dbconn, $query);
    if (!$result) {
        die("Error in SQL query: " . pg_last_error());
    }
    $_SESSION['success'] = "Password updated successfully.";
} else {
    $_SESSION['error'] = "Incorrect old password.";
}

// Redirect back to the form page
header("Location: account_info.php");
exit;
?>