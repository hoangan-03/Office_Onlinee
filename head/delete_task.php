<?php
$taskId = $_POST['taskId'];
$conn_str = "postgresql://webdb_owner:htx50eprzaUA@ep-weathered-poetry-a129mhzu.ap-southeast-1.aws.neon.tech/webdb?options=endpoint%3Dep-weathered-poetry-a129mhzu&sslmode=require";
$dbconn = pg_connect($conn_str);
if (!$dbconn) {
    die("Connection failed: " . pg_last_error());
}

$query = "DELETE FROM comments WHERE taskid = $taskId";
$result = pg_query($dbconn, $query);
if (!$result) {
    die("Error in SQL query: " . pg_last_error());
}

$query = "DELETE FROM tasks WHERE taskid = $taskId";
$result = pg_query($dbconn, $query);
if (!$result) {
    die("Error in SQL query: " . pg_last_error());
}

pg_close($dbconn);

header("Location: headManagement.php");
?>