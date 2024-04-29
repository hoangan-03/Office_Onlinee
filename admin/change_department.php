<?php
$conn_str = "postgresql://webdb_owner:htx50eprzaUA@ep-weathered-poetry-a129mhzu.ap-southeast-1.aws.neon.tech/webdb?options=endpoint%3Dep-weathered-poetry-a129mhzu&sslmode=require";
$dbconn = pg_connect($conn_str);
if (!$dbconn) {
    die("Connection failed: " . pg_last_error());
}

$userId = $_POST['user_id'];
$departmentId = $_POST['department_id'];

$query = "UPDATE users SET departmentid = $departmentId WHERE userid = $userId";
$result = pg_query($dbconn, $query);

if (!$result) {
    die("Error in SQL query: " . pg_last_error());
}

$newDepartmentQuery = "SELECT departmentname FROM departments WHERE departmentid = $departmentId";
$newDepartmentResult = pg_query($dbconn, $newDepartmentQuery);
if (!$newDepartmentResult) {
    die("Error in SQL query: " . pg_last_error());
}
$newDepartment = pg_fetch_result($newDepartmentResult, 0, 'departmentname');

echo $newDepartment;

pg_close($dbconn);