<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>head_Submission</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet" />
  <link rel="stylesheet" href="../styles.css">
  <link rel="stylesheet" href="../prestyles.css">
  <link rel="stylesheet" href="head.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
  <?php include 'sidebar.php'; ?>

  <section class="w-screen h-screen pt-10 pl-10 flex flex-col justify-center items-center gap-2 bg-gray-200">

    <h2 class="text-black">Your assigned task</h2>
    <div class="w-full flex flex-row gap-2 justify-center items-center">
      <?php
      $conn_str = "postgresql://webdb_owner:htx50eprzaUA@ep-weathered-poetry-a129mhzu.ap-southeast-1.aws.neon.tech/webdb?options=endpoint%3Dep-weathered-poetry-a129mhzu&sslmode=require";
      $conn = pg_connect($conn_str);
      $result = pg_query($conn, "SELECT departmentname FROM departments");
      $alldepartments = pg_fetch_all($result);
      $allstatus = array("Open", "In progress", "Completed", "Accepted", "Rejected");
      ?>

      <div class="dropdown">
        <button class="btn btn-primary backk dropdown-toggle" type="button" id="statusDropdown" data-bs-toggle="dropdown" aria-expanded="false">
          All Status
        </button>
        <ul class="dropdown-menu" aria-labelledby="statusDropdown">
          <li><a class="dropdown-item" href="#" onclick="filterStatus('')">All Status</a></li>
          <?php foreach ($allstatus as $status) : ?>
            <li><a class="dropdown-item" href="#" onclick="filterStatus('<?php echo $status; ?>')"><?php echo $status; ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>
      <script>
        var currentStatus = "";
        var currentDepartment = "";

        function filterStatus(status) {
          currentStatus = status;
          filterTable();
          document.getElementById("statusDropdown").textContent = status || "All Status";
        }

        function filterDepartment(department) {
          currentDepartment = department;
          filterTable();
          document.getElementById("departmentDropdown").textContent = department || "All Departments";
        }

        function filterTable() {
          var table = document.querySelector(".project-list-table");
          var rows = table.getElementsByTagName("tr");
          for (var i = 1; i < rows.length; i++) {
            var cells = rows[i].getElementsByTagName("td");
            if (cells.length < 5) continue;
            var departmentCell = cells[3];
            var statusCell = cells[4];
            var departmentMatch = currentDepartment === "" || departmentCell.textContent.trim() === currentDepartment;
            var statusMatch = currentStatus === "" || statusCell.textContent.trim() === currentStatus;
            rows[i].style.display = departmentMatch && statusMatch ? "" : "none";
          }
        }
      </script>




      <div id="cover">
        <form onsubmit="event.preventDefault(); searchTable()" class="flex flex-row justify-center items-center h-full">
          <div class=" w-auto h-full relative">
            <input type="text" id="searchBox" placeholder="Search by task">

          </div>
          <button type="button" class="glasss flex justify-center items-center" id="clearButton" onclick="clearInput()">
            <img src="../assets/close.png" alt="Clear Icon">
          </button>
          <button type="submit" class="glass flex justify-center items-center">
            <img src="../assets/search.png" alt="Search Icon">
          </button>

        </form>

        <script>
          function clearInput() {
            document.getElementById('searchBox').value = '';
          }
        </script>

        <script>
          function searchTable() {
            var input = document.getElementById("searchBox");
            var searchTerm = input.value.toLowerCase();
            var table = document.querySelector(".project-list-table");
            var rows = table.getElementsByTagName("tr");
            for (var i = 1; i < rows.length; i++) {
              var cells = rows[i].getElementsByTagName("td");
              if (cells.length > 0) {
                var cell = cells[0];
                var cellText = cell.textContent.toLowerCase().trim().replace(/\s\s+/g, ' ');
                var match = cellText.includes(searchTerm);
                rows[i].style.display = match ? "" : "none";
              }
            }
          }
        </script>

      </div>


    </div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css" integrity="sha512-pVCM5+SN2+qwj36KonHToF2p1oIvoU3bsqxphdOIWMYmgr4ZqD3t5DjKvvetKhXGc/ZG5REYTT6ltKfExEei/Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="">
            <div class="table-responsive bg-white rounded-xl mb-4 mx-0 h-400 px-5">
              <table class="table project-list-table table-nowrap align-middle table-borderless">
                <thead>
                  <tr>
                    <th scope="col" style="width: 220px;">Task</th>
                    <th scope="col" style="width: 100px;">Deadline</th>
                    <th scope="col" style="width: 170px;">Director ID</th>
                    <th scope="col" style="width: 170px;">Director</th>
                    <th scope="col" style="width: 220px;">Status</th>
                    <th scope="col" style="width: 220px;">Action</th>

                  </tr>
                </thead>
                <tbody>
                  <?php
                  $conn_str = "postgresql://webdb_owner:htx50eprzaUA@ep-weathered-poetry-a129mhzu.ap-southeast-1.aws.neon.tech/webdb?options=endpoint%3Dep-weathered-poetry-a129mhzu&sslmode=require";
                  $dbconn = pg_connect($conn_str);
                  if (!$dbconn) {
                    die("Connection failed: " . pg_last_error());
                  }
                  $currentuser = $_SESSION['user'];
                  $query = 'SELECT * FROM roles';
                  $result = pg_query($dbconn, $query);
                  $allroles = pg_fetch_all($result);

                  $query = 'SELECT * FROM users';
                  $result = pg_query($dbconn, $query);
                  $allusers = pg_fetch_all($result);

                  $query = 'SELECT * FROM departments';
                  $result = pg_query($dbconn, $query);
                  $alldepartments = pg_fetch_all($result);
                  $currentUserId = $currentuser['userid'];
                  $query = "SELECT tasks.taskid as id, tasks.title AS title, tasks.description AS description, tasks.deadline AS deadline, tasks.status AS status, tasks.creatorid AS creatorid, departments.departmentname AS departmentname, users.fullname AS fullname
                              FROM tasks
                              INNER JOIN users ON tasks.creatorid = users.userid
                              INNER JOIN departments ON users.departmentid = departments.departmentid WHERE tasks.responsibleuserid = $currentUserId";


                  $result = pg_query($dbconn, $query);
                  if (!$result) {
                    die("Error in SQL query: " . pg_last_error());
                  }
                  $tasks = pg_fetch_all($result);

                  foreach ($tasks as $task) {
                  ?>

                    <tr>
                      <td>
                        <div class="avatar-sm d-inline-block me-2">
                          <div class="avatar-title bg-soft-primary rounded-circle text-primary">
                            <i class="mdi mdi-account-circle m-0"></i>
                          </div>
                        </div>
                        <a href="#" class="text-body"><?php echo $task['title']; ?></a>
                      </td>
                      <td><?php echo $task['deadline']; ?></td>
                      <td><?php echo $task['creatorid']; ?></td>
                      <td><?php echo $task['fullname']; ?></td>

                      <td>
                        <span id="status_<?= $task['id'] ?>" class="badge 
                        <?php
                        switch ($task['status']) {
                          case 'Open':
                            echo 'badge-soft-primary';
                            break;
                          case 'Completed':
                            echo 'badge-soft-black';
                            break;
                          case 'In progress':
                            echo 'badge-soft-info';
                            break;
                          case 'Accepted':
                            echo 'badge-soft-success';
                            break;
                          case 'Rejected':
                            echo 'badge-soft-danger';
                            break;
                        }
                        ?> mb-0">
                          <?php echo $task['status']; ?>
                        </span>
                      </td>


                      <td>
                        <ul class="list-inline mb-0">
                          <li class="list-inline-item dropdown">
                            <a class="text-muted dropdown-toggle font-size-18 px-2" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                              <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewTaskModal<?= $task['id'] ?>" data-taskid="<?= $task['id'] ?>">View
                                Task</a>
                            </div>
                            <div class="modal fade" id="viewTaskModal<?= $task['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-xl" style="width:1450px; max-width: 1250px; overflow: auto; height: 600px;">
                                <div class="modal-content flex flex-row gap-2 h-full w-full">
                                  <div class="flex flex-col gap-2" style="max-width: 700px;">
                                    <div class="modal-header w-ful">
                                      <h5 class="modal-title" id="exampleModalLabel">View Task</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body w-full h-full justify-between flex items-center flex-col">
                                      <table class="table">
                                        <tr>
                                          <th>Title</th>
                                          <td id="taskTitle<?= $task['id'] ?>"></td>
                                        </tr>
                                        <tr>
                                          <th>Description</th>
                                          <td id="taskDescription<?= $task['id'] ?>"></td>
                                        </tr>
                                        <tr>
                                          <th>Deadline</th>
                                          <td id="taskDeadline<?= $task['id'] ?>"></td>
                                        </tr>
                                        <tr>
                                          <th>Status</th>
                                          <td id="taskStatus<?= $task['id'] ?>"></td>
                                        </tr>
                                        <tr>
                                          <th>Director ID</th>
                                          <td id="taskAssignerId<?= $task['id'] ?>"></td>
                                        </tr>
                                        <tr>
                                          <th>Director Name</th>
                                          <td id="taskAssigner<?= $task['id'] ?>"></td>
                                        </tr>
                                      </table>
                                      <div class="flex flex-row gap-4 justify-center items-center" id="taskActions<?= $task['id'] ?>">
                                        <button type="button" class="btn btn-success takeBtn" data-taskid="<?= $task['id'] ?>">Take on task</button>
                                        <button type="button" class="btn btn-primary submitBtn" data-taskid="<?= $task['id'] ?>">Submit task</button>
                                      </div>
                                    </div>
                                  </div>
                                  <div id="taskCommentSection <?= $task['id'] ?>" class="flex flex-col items-centerw-300 h-full" style="width: 750px; padding: 20px">
                                    <div class="commentTable justify-between flex flex-col h-full">
                                      <table id="commentTable<?= $task['id'] ?>">
                                        <thead>
                                          <tr>
                                            <th scope="col" style="width: 50px;" class="spaced">ID</th>
                                            <th scope="col" style="width: 220px;" class="spaced">Role</th>
                                            <th scope="col" style="width: auto;" class="spaced">Comment</th>
                                            <th scope="col" style="width: auto;" class="spaced">Time</th>

                                          </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                      </table>
                                      <style>
                                        .commentTable {
                                          width: 100%;
                                          display: flex;
                                        }

                                        .commentTable table {
                                          width: 100%;
                                          display: table;
                                        }

                                        .commentTable thead {
                                          display: table;
                                          width: 100%;
                                          table-layout: fixed;
                                        }

                                        .commentTable tbody {
                                          height: 350px;
                                          overflow: auto;
                                          display: block;
                                          width: 100%;
                                          table-layout: fixed;
                                        }
                                      </style>

                                      <div class="flex flex-col justify-center items-center w-full gap-2">
                                        <textarea style="width: 100%; border: 2px solid black; margin-left: 12px;  margin-right: 12px;  padding: 5px; border-radius: 12px" id="taskComment<?= $task['id'] ?>" placeholder="Add a comment..."></textarea>
                                        <button type="button" class="btn btn-primary submitCommentBtn" data-taskid="<?= $task['id'] ?>">Submit Comment</button>
                                      </div>


                                    </div>

                                  </div>

                                </div>
                              </div>
                            </div>

                            <script>
                              $(document).ready(function() {
                                $('#viewTaskModal<?= $task['id'] ?>').on('show.bs.modal', function(event) {
                                  var button = $(event.relatedTarget)
                                  var taskId = button.data('taskid')

                                  $.ajax({
                                    url: "fetch_task.php",
                                    method: "POST",
                                    data: {
                                      taskId: taskId
                                    },
                                    dataType: "json",
                                    success: function(data) {
                                      $('#taskTitle' + taskId).text(data.title);
                                      $('#taskDescription' + taskId).text(data.description);
                                      $('#taskDeadline' + taskId).text(data.deadline);
                                      $('#taskStatus' + taskId).text(data.status);
                                      $('#taskAssignerId' + taskId).text(data.creatorid);
                                      $('#taskAssigner' + taskId).text(data.fullname);

                                      if (data.status === 'Open') {
                                        $('.takeBtn[data-taskid="' + taskId + '"]').prop('disabled', false);
                                        $('.submitBtn[data-taskid="' + taskId + '"]').prop('disabled', true);
                                      } else if (data.status === 'In progress') {
                                        $('.takeBtn[data-taskid="' + taskId + '"]').prop('disabled', true);
                                        $('.submitBtn[data-taskid="' + taskId + '"]').prop('disabled', false);
                                      } else {
                                        $('.takeBtn[data-taskid="' + taskId + '"]').prop('disabled', true);
                                        $('.submitBtn[data-taskid="' + taskId + '"]').prop('disabled', true);
                                      }

                                      $('#commentTable' + taskId + ' tbody').empty();



                                      $.each(data.comments, function(i, comment) {
                                        var timestamp = comment.timestampp.substring(0, 19);
                                        $('#commentTable' + taskId + ' tbody').prepend('<tr><td>' + comment.userid + '</td><td>' + comment.rolename + '</td><td>' + comment.text + '</td><td>' + timestamp + '</td></tr>');
                                      });

                                    }
                                  });
                                });
                                $('.submitBtn').click(function() {
                                  var taskId = $(this).data('taskid');
                                  var newStatus = 'Completed';
                                  var comment = $('#taskComment' + taskId).val();

                                  $('.submitBtn').prop('disabled', true);

                                  $.ajax({
                                    url: "update_task.php",
                                    method: "POST",
                                    data: {
                                      taskId: taskId,
                                      status: newStatus,
                                      comment: comment
                                    },
                                    dataType: "json",
                                    success: function(data) {
                                      if (data.status === 'success') {
                                        $('#taskStatus' + taskId).text(newStatus);

                                      }
                                    }
                                  });
                                  $('#taskStatus' + taskId).text(newStatus);
                                });
                                $('.takeBtn').click(function() {
                                  var taskId = $(this).data('taskid');
                                  var newStatus = 'In progress';
                                  var comment = $('#taskComment' + taskId).val();

                                  $('.takeBtn').prop('disabled', true);

                                  $.ajax({
                                    url: "update_task.php",
                                    method: "POST",
                                    data: {
                                      taskId: taskId,
                                      status: newStatus,
                                      comment: comment
                                    },
                                    dataType: "json",
                                    success: function(data) {
                                      if (data.status === 'success') {
                                        $('#taskStatus' + taskId).text(newStatus);

                                      }
                                    }

                                  });

                                  $('#taskStatus' + taskId).text(newStatus);
                                });
                                $('.submitCommentBtn').off().click(function() {
                                  var taskId = $(this).data('taskid');
                                  var comment = $('#taskComment' + taskId).val();


                                  $.ajax({
                                    url: "submit_comment.php",
                                    method: "POST",
                                    data: {
                                      taskId: taskId,
                                      comment: comment,
                                      userId: <?= $currentuser['userid'] ?>,
                                    },
                                    dataType: "json",
                                    success: function(data) {
                                      if (data.status === 'success') {
                                        $('#commentTable' + taskId + ' tbody').append('<tr><td><?= $currentuser['userid'] ?></td><td>Department Head</td><td>' + comment + '</td></tr>');
                                        $('#taskComment' + taskId).val('');
                                      }
                                    }
                                  });

                                });
                              });
                            </script>
            </div>

          <?php
                  }
          ?>

          </table>
          </div>
        </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
      <script type="text/javascript"></script>

  </section>
</body>