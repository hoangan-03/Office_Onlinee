<?php
$conn_str = "postgresql://webdb_owner:htx50eprzaUA@ep-weathered-poetry-a129mhzu.ap-southeast-1.aws.neon.tech/webdb?options=endpoint%3Dep-weathered-poetry-a129mhzu&sslmode=require";
$dbconn = pg_connect($conn_str);
if (!$dbconn) {
    die("Connection failed: " . pg_last_error());
}

$username = $_POST['username'];
$fullname = $_POST['fullname'];

$gender = $_POST['gender'];
$yearofbirth = $_POST['yearofbirth'];

$query = "UPDATE users SET fullname = '{$fullname}', gender = '{$gender}', yearofbirth = '{$yearofbirth}' WHERE username = '{$username}'";
$result = pg_query($dbconn, $query);

if (!$result) {
    die("Error in SQL query: " . pg_last_error());
}

pg_close($dbconn);

// Redirect the user back to the account info page
header("Location: account_info.php");
?>