<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HomePage</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet" />
  <link rel="stylesheet" href="../styles.css">
  <link rel="stylesheet" href="../prestyles.css">
  <link rel="stylesheet" href="director.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
  <?php
  include 'sidebar.php';
  if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
  }
  $currentuser = $_SESSION['user'];
  $conn_str = "postgresql://webdb_owner:htx50eprzaUA@ep-weathered-poetry-a129mhzu.ap-southeast-1.aws.neon.tech/webdb?options=endpoint%3Dep-weathered-poetry-a129mhzu&sslmode=require";
  $dbconn = pg_connect($conn_str);
  if (!$dbconn) {
    die("Connection failed: " . pg_last_error());
  }

  $query = "SELECT departmentname FROM departments WHERE departmentid = " . $currentuser['departmentid'];
  $result = pg_query($dbconn, $query);
  $departmentname = pg_fetch_result($result, 0, 'departmentname');


  ?>
  


</body>

</html>