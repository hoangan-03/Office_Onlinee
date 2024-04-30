<?php
$conn_str = "postgresql://webdb_owner:htx50eprzaUA@ep-weathered-poetry-a129mhzu.ap-southeast-1.aws.neon.tech/webdb?options=endpoint%3Dep-weathered-poetry-a129mhzu&sslmode=require";
$dbconn = pg_connect($conn_str);
if (!$dbconn) {
    die("Connection failed: " . pg_last_error());
}

$departmentName = $_POST['department_name'];

$query = "INSERT INTO departments (departmentname) VALUES ('$departmentName')";
$result = pg_query($dbconn, $query);

if (!$result) {
    die("Error in SQL query: " . pg_last_error());
}

echo "Department added successfully";

pg_close($dbconn);