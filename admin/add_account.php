<?php
$conn_str = "postgresql://webdb_owner:htx50eprzaUA@ep-weathered-poetry-a129mhzu.ap-southeast-1.aws.neon.tech/webdb?options=endpoint%3Dep-weathered-poetry-a129mhzu&sslmode=require";
$dbconn = pg_connect($conn_str);
parse_str(file_get_contents("php://input"), $_POST);
$fullname = $_POST['newFullname'];
$username = $_POST['newUsername'];
$password = $_POST['newPassword'];
$gender = $_POST['newGender'];
$dob = $_POST['newDOB'];
$role = $_POST['newRole'];
$department = $_POST['newDepartment'];

// Create a hash that is exactly 255 characters long
$hashed_password = substr(hash('sha512', $password) . hash('sha512', $password) . hash('sha512', $password), 0, 255);

// Get the roleid for the given role
$query = "SELECT roleid FROM roles WHERE rolename = '$role'";
$result = pg_query($dbconn, $query);
if (!$result) {
    die("Error in SQL query: " . pg_last_error());
}
$row = pg_fetch_assoc($result);
$roleid = $row['roleid'];

// Get the departmentid for the given department
$query = "SELECT departmentid FROM departments WHERE departmentname = '$department'";
$result = pg_query($dbconn, $query);
if (!$result) {
    die("Error in SQL query: " . pg_last_error());
}
$row = pg_fetch_assoc($result);
$departmentid = $row['departmentid'];

$query = "INSERT INTO users (fullname, username, password, gender, yearofbirth, roleid, departmentid) VALUES ('$fullname', '$username', '$hashed_password', '$gender', '$dob', $roleid, $departmentid)";

$result = pg_query($dbconn, $query);
if (!$result) {
    die("Error in SQL query: " . pg_last_error());
}


echo "Account added successfully";
pg_close($dbconn);

?>