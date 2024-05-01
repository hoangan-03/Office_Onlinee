<?php
$conn_str = "postgresql://webdb_owner:htx50eprzaUA@ep-weathered-poetry-a129mhzu.ap-southeast-1.aws.neon.tech/webdb?options=endpoint%3Dep-weathered-poetry-a129mhzu&sslmode=require";
$dbconn = pg_connect($conn_str);
if (!$dbconn) {
    die("Connection failed: " . pg_last_error());
}
$taskId = $_POST['taskId'];
$comment = $_POST['comment'];
$userId = $_POST['userId'];

$query = "INSERT INTO comments (taskid, userid, comment, timestamp) VALUES ($1, $2, $3, NOW())";
$result = pg_query_params($dbconn, $query, array($taskId, $userId, $comment));

if (!$result) {
    echo json_encode(['status' => 'error', 'message' => pg_last_error()]);
} else {
    echo json_encode(['status' => 'success']);
}
?>