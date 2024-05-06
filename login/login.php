<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn_str = "postgresql://webdb_owner:htx50eprzaUA@ep-weathered-poetry-a129mhzu.ap-southeast-1.aws.neon.tech/webdb?options=endpoint%3Dep-weathered-poetry-a129mhzu&sslmode=require";
    $dbconn = pg_connect($conn_str);
    if (!$dbconn) {
        die("Connection failed: " . pg_last_error());
    }
    $username = $_POST['username'];
    $password = $_POST['pass'];
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = pg_query($dbconn, $query);
    if (!$result) {
        die("Error in SQL query: " . pg_last_error());
    }
    $user = pg_fetch_assoc($result);
    if ($user) {
        if ($user['password'] == $password) {
            $_SESSION['user'] = $user;

            switch ($user['roleid']) {
                case 1:
                    header('Location: ../admin/admin.php');
                    break;
                case 2:
                    header('Location: ../director/director.php');
                    break;
                case 3:
                    header('Location: ../head/head.php');
                    break;
                case 4:
                    header('Location: ../staff/staff.php');
                    break;
            }
        } else {
            $_SESSION['error'] = 'Incorrect password';
            header('Location: index.php');
        }
    } else {
        $_SESSION['error'] = 'Username does not exist';
        header('Location: index.php');
    }
    pg_close($dbconn);
}
?>