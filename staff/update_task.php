<?php
$conn_str = "postgresql://webdb_owner:htx50eprzaUA@ep-weathered-poetry-a129mhzu.ap-southeast-1.aws.neon.tech/webdb?options=endpoint%3Dep-weathered-poetry-a129mhzu&sslmode=require";
$dbconn = pg_connect($conn_str);
if (!$dbconn) {
    die("Connection failed: " . pg_last_error());
}

$taskId = $_POST['taskId'];
$newStatus = $_POST['status'];
$comment = $_POST['comment'];

$query = "UPDATE tasks SET status = $1 WHERE taskid = $2";
$result = pg_query_params($dbconn, $query, array($newStatus, $taskId));

if (!$result) {
    die("Error in SQL query: " . pg_last_error());
}

$query = "INSERT INTO comments (taskid, comment) VALUES ($1, $2)";
$result = pg_query_params($dbconn, $query, array($taskId, $comment));

if (!$result) {
    die("Error in SQL query: " . pg_last_error());
}

echo json_encode(['status' => 'success']);
pg_close($dbconn);
?>