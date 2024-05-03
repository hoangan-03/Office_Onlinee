<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Department</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet" />
  <link rel="stylesheet" href="../styles.css">
  <link rel="stylesheet" href="sidebar.css" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="script.js"></script>
</head>

<body>
<?php
  if(session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
  }
  $currentuser = $_SESSION['user'];
  ?>
  <div class="sidebar">
    <div class="flex items-center justify-center flex-col gap-2 py-2 h-120 mt-50">
      <img alt="logo" class="w-4 h-4 object-cover" src="../logo.png" />
      <h1 class="text-2xl sidebar-hug">Job Online</h1>
    </div>

    <div class="sidebar-item sidebar-hug flex-col h-60 mb-4">
      <p class="text-lg font-bold">Director</p>
      <p class="text-base">Hello John</p>
    </div>

    <div>
      <div
        class="sidebar-item items-center flex flex-row justify-start items-center bg-blue-100 gap-4">
        <img alt="calendar" class="sidebar-logo w-2 h-2 object-cover" src="../assets/task.png" />
        <h1 class="sidebar-hug-item">Task Assignment</h1>
      </div>
    </div>


  </div>
</body>

</html>