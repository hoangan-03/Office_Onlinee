<?php
$conn_str = "postgresql://webdb_owner:htx50eprzaUA@ep-weathered-poetry-a129mhzu.ap-southeast-1.aws.neon.tech/webdb?options=endpoint%3Dep-weathered-poetry-a129mhzu&sslmode=require";
$dbconn = pg_connect($conn_str);
if (!$dbconn) {
    die("Connection failed: " . pg_last_error());
}

$searchTerm = $_GET['search'];

$query = "SELECT * FROM users WHERE username LIKE '%$searchTerm%'";
$result = pg_query($dbconn, $query);

if (!$result) {
    die("Error in SQL query: " . pg_last_error());
}

// Output a new table with the matching users
echo "<table>";
while ($row = pg_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['username'] . "</td>";
    echo "<td>" . $row['role'] . "</td>";
    echo "<td>" . $row['department'] . "</td>";
    echo "</tr>";
}
echo "</table>";

pg_close($dbconn);