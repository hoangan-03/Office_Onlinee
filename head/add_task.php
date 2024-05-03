<?php
$conn_str = "postgresql://webdb_owner:htx50eprzaUA@ep-weathered-poetry-a129mhzu.ap-southeast-1.aws.neon.tech/webdb?options=endpoint%3Dep-weathered-poetry-a129mhzu&sslmode=require";
$dbconn = pg_connect($conn_str);
if (!$dbconn) {
    die("Connection failed: " . pg_last_error());
}

$title = $_POST['title'];
$description = $_POST['description'];
$deadline = $_POST['deadline'];
$creatorId = $_POST['creatorId'];
$responsibleUserId = $_POST['responsibleUserId'];
$status = $_POST['status'];

$query = "INSERT INTO tasks (title, description, deadline, creatorid, responsibleuserid, status) VALUES ('$title', '$description', '$deadline', $creatorId, $responsibleUserId, '$status')";
$result = pg_query($dbconn, $query);

if (!$result) {
    die("Error in SQL query: " . pg_last_error());
}

echo "Task added successfully";

pg_close($dbconn);
?>