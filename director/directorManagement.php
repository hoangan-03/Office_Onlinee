<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>director_Management</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet" />
  <link rel="stylesheet" href="../styles.css">
  <link rel="stylesheet" href="director.css">
  <link rel="stylesheet" href="../prestyles.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
  <?php include 'sidebar.php'; ?>
  <?php
  if (!isset($_SESSION['user'])) {
    header("Location: ../login/index.php");
    exit;
  }
  $currentuser = $_SESSION['user'];

  ?>
  <section class="w-screen h-screen pt-10 pl-10 flex flex-col justify-center items-center gap-2 bg-gray-200">
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
            if (cells.length < 6) continue;
            var departmentCell = cells[3];
            var statusCell = cells[5];
            var departmentMatch = currentDepartment === "" || departmentCell.textContent.trim() === currentDepartment;
            var statusMatch = currentStatus === "" || statusCell.textContent.trim() === currentStatus;
            rows[i].style.display = departmentMatch && statusMatch ? "" : "none";
          }
        }
      </script>


      <div class="dropdown">
        <button class="btn btn-primary backk dropdown-toggle" type="button" id="departmentDropdown" data-bs-toggle="dropdown" aria-expanded="false">
          All Departments
        </button>
        <ul class="dropdown-menu" aria-labelledby="departmentDropdown">
          <li><a class="dropdown-item" href="#" onclick="filterDepartment('')">All Departments</a></li>
          <?php foreach ($alldepartments as $department) : ?>
            <li><a class="dropdown-item" href="#" onclick="filterDepartment('<?php echo $department['departmentname']; ?>')"><?php echo $department['departmentname']; ?></a>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>

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
              if (cells.length > 0) { // Check if the row has at least one cell
                var cell = cells[0];
                var cellText = cell.textContent.toLowerCase().trim().replace(/\s\s+/g, ' ');
                var match = cellText.includes(searchTerm);
                rows[i].style.display = match ? "" : "none";
              }
            }
          }
        </script>

      </div>
      <button type="button" class="buttonn-74" data-bs-toggle="modal" data-bs-target="#createtaskModal">Create
        Task</button>

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
                    <th scope="col" style="width: 200px;">Assignee's ID</th>
                    <th scope="col" style="width: 170px;">Department</th>
                    <th scope="col" style="width: 220px;">Assignee's Role</th>
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
                  $query = 'SELECT * FROM roles';
                  $result = pg_query($dbconn, $query);
                  $allroles = pg_fetch_all($result);

                  $query = 'SELECT * FROM users';
                  $result = pg_query($dbconn, $query);
                  $allusers = pg_fetch_all($result);

                  $query = 'SELECT * FROM departments';
                  $result = pg_query($dbconn, $query);
                  $alldepartments = pg_fetch_all($result);




                  $query = 'SELECT tasks.taskid as id, tasks.title AS title, tasks.description AS description, tasks.deadline AS deadline, tasks.status AS status, tasks.responsibleuserid AS responsibleuserid, departments.departmentname AS departmentname, roles.rolename AS rolename
                  FROM tasks
                  INNER JOIN users ON tasks.responsibleuserid = users.userid
                  INNER JOIN departments ON users.departmentid = departments.departmentid
                  INNER JOIN roles ON users.roleid = roles.roleid'; // Join roles table and select rolename


                  $result = pg_query($dbconn, $query);
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
                      <td><?php echo $task['responsibleuserid']; ?></td>
                      <td><?php echo $task['departmentname']; ?></td>
                      <td><?php echo $task['rolename']; ?></td>
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
                              <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#deleteTaskModal<?= $task['id'] ?>">Delete Task</a>
                            </div>
                            <div class="modal fade" id="viewTaskModal<?= $task['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-xl" style="width:1450px; max-width: 1250px; overflow: auto; height: 600px;">
                                <div class="modal-content flex flex-row gap-2 h-full w-full">
                                  <div class="flex flex-col gap-2" style="width: 450px;">
                                    <div class="modal-header w-ful">
                                      <h5 class="modal-title" id="exampleModalLabel">View Task</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body w-full h-full justify-between flex items-center flex-col">
                                      <table class="tasktab w-full">
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
                                          <th>Responsible User ID</th>
                                          <td id="taskResponsibleUserId<?= $task['id'] ?>"></td>
                                        </tr>
                                        <tr>
                                          <th>Department Name</th>
                                          <td id="taskDepartmentName<?= $task['id'] ?>"></td>
                                        </tr>
                                      </table>

                                      <div class="flex flex-row gap-4 justify-center items-center" id="taskActions<?= $task['id'] ?>">
                                        <button type="button" class="btn btn-success acceptBtn" data-taskid="<?= $task['id'] ?>">Accept</button>
                                        <button type="button" class="btn btn-danger rejectBtn" data-taskid="<?= $task['id'] ?>">Reject</button>
                                      </div>
                                    </div>
                                  </div>


                                  <div id="taskCommentSection <?= $task['id'] ?>" class="flex flex-col items-center w-300 h-full" style="width: 750px; padding: 20px">
                                    <div class="commentTable justify-between flex flex-col h-full">
                                      <table id="commentTable<?= $task['id'] ?>">
                                        <thead>
                                          <tr>
                                            <th scope="col" style="width: 50px;" class="spaced">ID</th>
                                            <th scope="col" style="width: 220px;" class="spaced">Role</th>
                                            <th scope="col" style="width: 200px;" class="spaced">Comment</th>
                                            <th scope="col" style="width: auto;" class="spaced">Time</th>

                                          </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                      </table>
                                      <style>
                                        .tasktab {
                                          display: block;
                                          width: 100%;
                                          height:66%;
                                          overflow: auto;
                                        }

                                        .tasktab tbody {
                                          display: table;
                                          width: 100%; 
                                          height: 100%;
                                          table-layout: fixed !important;
                                        }
                                        .tasktab th {
                                          
                                          padding-top: 0px !important;
                                          padding-left: 0px !important;
                                          padding-bottom: 0px !important;
                                        }

                                        .tasktab td {
                                          white-space: normal;
                                          padding-left: 30px !important;
                                          padding-right: 0px !important;
                                          padding-top: 0px !important;
                                          padding-bottom: 0px !important;
                                        }

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
                  $('#taskResponsibleUserId' + taskId).text(data.responsibleuserid);
                  $('#taskDepartmentName' + taskId).text(data.departmentname);

                  if (data.status === 'Completed' && data.responsibleuserroleid == 3 ) {
                    $('#taskActions' + taskId).show();
                  } else {
                    $('#taskActions' + taskId).hide();
                  }

                  // Clear the comment table
                  $('#commentTable' + taskId + ' tbody').empty();

                  // Add each comment to the comment table
                  $.each(data.comments, function(i, comment) {
                    var timestamp = comment.timestampp.substring(0, 19);
                    $('#commentTable' + taskId + ' tbody').prepend('<tr><td>' + comment.userid + '</td><td>' + comment.rolename + '</td><td>' + comment.text + '</td><td>' + timestamp + '</td></tr>');
                  });
                }
              });
            });

            $('.acceptBtn, .rejectBtn').click(function() {
              var taskId = $(this).data('taskid');
              var newStatus = $(this).hasClass('acceptBtn') ? 'Accepted' : 'Rejected';
              var comment = $('#taskComment' + taskId).val();

              // Disable both buttons
              $('.acceptBtn, .rejectBtn').prop('disabled', true);

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
                    $('#taskActions' + taskId).hide();
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
                    
                    
                    $('#commentTable' + taskId + ' tbody').append('<tr><td><?= $currentuser['userid'] ?></td><td>Director</td><td>' + comment + '</td></tr>');
                    
                    $('#taskComment' + taskId).val('');
                  }
                }
              });
            });
          });
        </script>




      </div>
      <div class="modal fade" id="deleteTaskModal<?= $task['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

              <form id="deleteForm<?= $task['id'] ?>" action="delete_task.php" method="post">
                Are you sure you want to delete this task?
                <input type="hidden" name="taskId" value="<?= $task['id'] ?>">
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" onclick="document.getElementById('deleteForm<?= $task['id'] ?>').submit()">Confirm</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="createtaskModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Task for Head(s)</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body flex flex-col gap-2">
              <input type="text" id="newTaskTitle" class="form-control" placeholder="Task">
              <input type="text" id="newTaskDescription" class="form-control" placeholder="Description">

              <input type="date" id="newTaskDeadline" class="form-control" placeholder="Deadline">
              <select id="newTaskResponsibleUserId" class="form-control">
                <option disabled selected value="">Select responsible ID of Head</option>
                <?php
                    $conn_str = "postgresql://webdb_owner:htx50eprzaUA@ep-weathered-poetry-a129mhzu.ap-southeast-1.aws.neon.tech/webdb?options=endpoint%3Dep-weathered-poetry-a129mhzu&sslmode=require";
                    $dbconn = pg_connect($conn_str);
                    if (!$dbconn) {
                      die("Connection failed: " . pg_last_error());
                    }

                    $queryy = "SELECT userid FROM users WHERE roleid = 3";
                    $result = pg_query($dbconn, $queryy);

                    if (!$result) {
                      die("Error in SQL query: " . pg_last_error());
                    }

                    while ($row = pg_fetch_assoc($result)) {
                      echo "<option value='" . $row['userid'] . "'>" . $row['userid'] . "</option>";
                    }

                    pg_close($dbconn);
                ?>
              </select>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" onclick="addTask()">Create Task</button>
            </div>
          </div>
        </div>
      </div>

      <script>
        function addTask() {
          var xhr = new XMLHttpRequest();
          xhr.open("POST", "add_task.php", true);
          xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
          xhr.onreadystatechange = function() {
            if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
              alert("Task added successfully");
              location.reload();
            }
          }
          var title = document.getElementById('newTaskTitle').value;
          var description = document.getElementById('newTaskDescription').value;
          var deadline = document.getElementById('newTaskDeadline').value;
          var responsibleUserId = document.getElementById('newTaskResponsibleUserId').value;
          var creatorId = <?= $currentuser['userid'] ?>;
          var status = "Open";
          var params = "title=" + title + "&description=" + description + "&deadline=" + deadline + "&creatorId=" + creatorId + "&responsibleUserId=" + responsibleUserId + "&status=" + status;
          xhr.send(params);
        }
      </script>




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