<?php
$conn_str = "postgresql://webdb_owner:htx50eprzaUA@ep-weathered-poetry-a129mhzu.ap-southeast-1.aws.neon.tech/webdb?options=endpoint%3Dep-weathered-poetry-a129mhzu&sslmode=require";
$dbconn = pg_connect($conn_str);
if (!$dbconn) {
    die("Connection failed: " . pg_last_error());
}

$userId = $_POST['user_id'];
$roleId = $_POST['role_id'];

$query = "UPDATE users SET roleid = $roleId WHERE userid = $userId";
$result = pg_query($dbconn, $query);

if (!$result) {
    die("Error in SQL query: " . pg_last_error());
}

// After the role has been changed, fetch the new role name
$newRoleQuery = "SELECT rolename FROM roles WHERE roleid = $roleId";
$newRoleResult = pg_query($dbconn, $newRoleQuery);
if (!$newRoleResult) {
    die("Error in SQL query: " . pg_last_error());
}
$newRole = pg_fetch_result($newRoleResult, 0, 'rolename');

echo $newRole;

pg_close($dbconn);