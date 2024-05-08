<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>DirectorSidebar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet" />
  <link rel="stylesheet" href="../styles.css">
  <link rel="stylesheet" href="../sidebar.css" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <?php
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
  <div class="sidebar">
    <div class="flex items-center justify-center flex-col gap-2 py-2 h-120 mt-50">
      <img alt="logo" class="w-4 h-4 object-cover" src="../logo.png" />
      <h1 class="text-2xl sidebar-hug">Job Online</h1>
    </div>

    <div class="sidebar-item sidebar-hug flex-col h-60 mb-4">

      <p class="text-lg font-bold">Director</p>
      <p class="font-bold badge badge-soft-primary" style="padding: 10px !important; font-size: 18px"><?= $departmentname ?></p>
      <p class="text-base">Hello <?= $currentuser['username'] ?></p>
    </div>


    <a href="home.php">
      <div class="sidebar-item items-center flex flex-row justify-start items-center <?php echo basename($_SERVER['PHP_SELF']) == 'home.php' ? 'bg-blue-100' : ''; ?> gap-4">
        <img alt="calendar" class="sidebar-logo w-2 h-2 object-cover" src="../assets/homepage.png" />
        <h1 class="sidebar-hug-item">Home</h1>
      </div>
    </a>

    <a href="directorManagement.php">
      <div class="sidebar-item items-center flex flex-row justify-start items-center <?php echo basename($_SERVER['PHP_SELF']) == 'directorManagement.php' ? 'bg-blue-100' : ''; ?> gap-4">
        <img alt="calendar" class="sidebar-logo w-2 h-2 object-cover" src="../assets/task.png" />
        <h1 class="sidebar-hug-item">Task Assignment</h1>
      </div>
    </a>
    <a href="account_info.php">
      <div class="sidebar-item items-center flex flex-row justify-start items-center <?php echo basename($_SERVER['PHP_SELF']) == 'account_info.php' ? 'bg-blue-100' : ''; ?> gap-4">
        <img alt="calendar" class="sidebar-logo w-2 h-2 object-cover" src="../assets/user.png" />
        <h1 class="sidebar-hug-item">Account</h1>
      </div>
    </a>
    <a href="../logout.php">
      <div class="sidebar-item items-center flex flex-row justify-start items-center gap-4">
        <img alt="calendar" class="sidebar-logo w-2 h-2 object-cover" src="../assets/logout.png" />
        <h1 class="sidebar-hug-item">Log out</h1>
      </div>
    </a>


  </div>
</body>

</html>