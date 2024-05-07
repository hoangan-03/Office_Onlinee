<?php
$conn_str = "postgresql://webdb_owner:htx50eprzaUA@ep-weathered-poetry-a129mhzu.ap-southeast-1.aws.neon.tech/webdb?options=endpoint%3Dep-weathered-poetry-a129mhzu&sslmode=require";
$dbconn = pg_connect($conn_str);
if (!$dbconn) {
    die("Connection failed: " . pg_last_error());
}

$taskId = $_POST['taskId'];

$query = "SELECT tasks.title AS title, tasks.description AS description, tasks.deadline AS deadline, tasks.status AS status, tasks.responsibleuserid AS responsibleuserid, tasks.creatorid AS creatorid, users.fullname AS fullname, users.roleid AS responsibleuserroleid, users.departmentid AS responsibleuserdepartmentid, departments.departmentname AS departmentname
           FROM tasks
           INNER JOIN users ON tasks.responsibleuserid = users.userid
           INNER JOIN departments ON users.departmentid = departments.departmentid
           WHERE tasks.taskid = $taskId";


$result = pg_query($dbconn, $query);

if (!$result) {
    die("Error in SQL query: " . pg_last_error());
}

$task = pg_fetch_assoc($result);

$query = "SELECT comments.userid AS userId, comments.comment AS text, roles.rolename AS rolename, comments.timestamp AS timestampp
           FROM comments
           INNER JOIN users ON comments.userid = users.userid
           INNER JOIN roles ON users.roleid = roles.roleid
           WHERE comments.taskid = $taskId";

$result = pg_query($dbconn, $query);

if (!$result) {
    die("Error in SQL query: " . pg_last_error());
}

$comments = pg_fetch_all($result);

$task['comments'] = $comments;

echo json_encode($task);

pg_close($dbconn);
?>