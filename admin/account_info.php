</html>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>AccountInfo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet" />
  <link rel="stylesheet" href="../styles.css">
  <link rel="stylesheet" href="../prestyles.css">
  <link rel="stylesheet" href="../sidebar.css" />
  <link rel="stylesheet" href="admin.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
  <?php
  if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
  }
  $currentuser = $_SESSION['user'];
  $currentusername = $currentuser['username'];

  include 'sidebar.php';

  $conn_str = "postgresql://webdb_owner:htx50eprzaUA@ep-weathered-poetry-a129mhzu.ap-southeast-1.aws.neon.tech/webdb?options=endpoint%3Dep-weathered-poetry-a129mhzu&sslmode=require";
  $dbconn = pg_connect($conn_str);

  // Fetch the current user's information from the database

  $query = "SELECT users.username, users.fullname, roles.rolename, roles.roleid, departments.departmentname, departments.departmentid, users.gender, users.yearofbirth 
        FROM users 
        INNER JOIN roles ON users.roleid = roles.roleid 
        INNER JOIN departments ON users.departmentid = departments.departmentid 
        WHERE users.username = $1";

  $result = pg_prepare($dbconn, "my_query", $query);
  $result = pg_execute($dbconn, "my_query", array($currentuser['username']));
  $user = pg_fetch_assoc($result);

  $roles_query = "SELECT * FROM roles";
  $roles_result = pg_query($dbconn, $roles_query);
  $roles = pg_fetch_all($roles_result);

  $departments_query = "SELECT * FROM departments";
  $departments_result = pg_query($dbconn, $departments_query);
  $departments = pg_fetch_all($departments_result);
  ?>

  <section class="w-screen h-screen flex flex-col items-center gap-4 bg-gray-200">

    <div class="w-full bg-white flex justify-start items-center" style="height: 80px; padding-left: 160px;">
      <h4 class="font-bold">Account Details</h4>

    </div>
    <div class="wrapp bg-white rounded-2xl flex flex-col gap-1">
      <form id="userForm" action="update_user_info.php" method="post" onsubmit="showModal(event)">
        <div class="flex flex-col gap-1 " style="width: 50%">
          <div class="readonly flex flex-col justify-start items-start" style="margin-bottom: 10px;">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" value="<?php echo $user['username']; ?>" readonly>
          </div>
          <div class=" flex flex-col justify-start items-start" style="margin-bottom: 10px;">
            <label for="fullname">Full Name</label>
            <input type="text" id="fullname" name="fullname" value="<?php echo $user['fullname']; ?>">
          </div>

        </div>
        <div class="flex flex-col gap-1 " style="width: 50%">

          <div class=" flex flex-col justify-start items-start" style="margin-bottom: 10px;">
            <label for="gender">Gender</label>
            <select id="gender" name="gender">
              <option value="Male" <?php echo $user['gender'] == 'Male' ? 'selected' : ''; ?>>Male</option>
              <option value="Female" <?php echo $user['gender'] == 'Female' ? 'selected' : ''; ?>>Female</option>
              <option value="Other" <?php echo $user['gender'] == 'Other' ? 'selected' : ''; ?>>Other</option>
            </select>
          </div>
          <div class=" flex flex-col justify-start items-start" style="margin-bottom: 10px;">
            <label for="yearofbirth">Year of Birth</label>
            <select id="yearofbirth" name="yearofbirth">
              <?php for ($year = date('Y'); $year >= 1900; $year--) : ?>
                <option value="<?php echo $year; ?>" <?php echo $user['yearofbirth'] == $year ? 'selected' : ''; ?>>
                  <?php echo $year; ?>
                </option>
              <?php endfor; ?>
            </select>
          </div>
        </div>


      </form>
      <input form="userForm" class="submitb" type="submit" value="Save changes">
    </div>
    <div class="modal fade" id="successModal" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header flex flex-row justify-between bg-theme-dark items-center">
            <h4 class="modal-title text-center text-white text-base">
              Password changed successfully
            </h4>
            <button type="button" class="close" data-dismiss="modal" style="color: white;">&times;</button>
          </div>
          <div class="modal-body text-2xl text-black">
            <p class="text-xl text-black font-bold">
              Your changes have been saved successfully.
            </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn closee btn-success text-white" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <script>
      function showModal(event) {
        event.preventDefault();

        var formData = $('#userForm').serialize();
        $.ajax({
          type: 'POST',
          url: 'update_user_info.php',
          data: formData,
          success: function(response) {
            $('#successModal').modal('show');
          }
        });
      }
    </script>
    <div class="wrapp bg-white rounded-2xl flex flex-col gap-1">
      <form id="passForm" action="update_password.php" method="post">
        <input type="hidden" name="username" value="<?php echo $_SESSION['user']['username']; ?>">
        <div class="flex flex-col gap-1 " style="width: 50%">
          <div class=" flex flex-col justify-start items-start" style="margin-bottom: 10px;">
            <label for="old_password">Old Password</label>
            <input type="password" id="old_password" name="old_password">
          </div>
        </div>

        <div class="flex flex-col gap-1 " style="width: 50%">
          <div class=" flex flex-col justify-start items-start" style="margin-bottom: 10px;">
            <label for="new_password">New Password</label>
            <input type="password" id="new_password" name="new_password">
          </div>
        </div>
      </form>
      <input form="passForm" class="submitbb" type="submit" value="Change Password">
    </div>

    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog ">
        <div class="modal-content">
          <div class="modal-header flex flex-row justify-between bg-theme-dark items-center">
            <h4 class="modal-title text-center text-white text-base">
              <?php echo isset($_SESSION['error']) ? 'Failed to change password' : 'Password changed successfully'; ?>
            </h4>
            <button type="button" class="close" data-dismiss="modal" style="color: white;">&times;</button>
          </div>
          <div class="modal-body text-2xl text-black">
            <p class="text-xl text-black font-bold">
              <?php echo isset($_SESSION['error']) ? $_SESSION['error'] : $_SESSION['success']; ?>
            </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn closee <?php echo isset($_SESSION['error']) ? 'btn-danger' : 'btn-success'; ?> text-white" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
      $(document).ready(function() {
        $('.closee').click(function() {
          $('#myModal').modal('hide');
        });
      });
      $(document).ready(function() {
        $('.closee').click(function() {
          $('#successModal').modal('hide');
        });
      });
    </script>
    <?php
    if (isset($_SESSION['error']) || isset($_SESSION['success'])) {
      echo "<script type='text/javascript'>
                $(document).ready(function(){
                    $('#myModal').modal('show');
                });
            </script>";
      unset($_SESSION['error']);
      unset($_SESSION['success']);
    }
    ?>
  </section>
  <style>
    .submitb {
      width: 170px !important;
      border-radius: 10px !important;
      background-color: blue !important;
      color: white !important;
      font-weight: bold !important;
    }

    .submitbb {
      width: 200px !important;
      border-radius: 10px !important;
      background-color: blue !important;
      color: white !important;
      font-weight: bold !important;
    }

    .submitb:hover {
      background-color: #d1e4ff !important;
      color: black !important;
    }

    .submitbb:hover {
      background-color: #d1e4ff !important;
      color: black !important;
    }

    body {
      font-family: Arial, sans-serif;
      font-size: 17px !important;
    }

    .readonly input {
      background-color: #ddd;
      cursor: not-allowed;
    }

    .wrapp {
      width: 1300px;
      margin-left: 80px;
      height: auto;
      padding-right: 30px;
      padding-left: 30px;

      padding-top: 10px;
      padding-bottom: 10px;
    }

    form {
      width: 100%;
      height: 100%;
      display: flex;
      flex-direction: row;
      gap: 100px;
    }

    label {
      display: block;
      margin-bottom: 0px !important;
      font-size: 18px;
      font-weight: bold;
    }

    select {
      width: 100%;
      padding: 2px 15px;
      margin: 8px 0;
      box-sizing: border-box;
      border: 1px solid grey;
      border-radius: 7px;
      height: 40px;
    }

    input[type="text"] {
      width: 100%;
      padding: 12px 15px;
      margin: 8px 0;
      height: 40px;
      box-sizing: border-box;
      border: 1px solid grey;
      border-radius: 7px;
      font-weight: normal;
    }

    input[type="password"] {
      width: 100%;
      padding: 12px 15px;
      margin: 8px 0;
      height: 40px;
      box-sizing: border-box;
      border: 1px solid grey;
      border-radius: 7px;
      font-weight: normal;
    }

    input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      width: 100%;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>
</body>
</html>