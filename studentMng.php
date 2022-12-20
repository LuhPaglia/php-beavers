<?php
  include './pages/header.php';
  include './services/dbservices.php';

  $dbSrv = new dbServices($hostName,$userName,$password,$dbName);

  if($dbSrv->dbConnect()){
  }else{
    echo "DB connection problem";
  }
?>

<!-- Alert -->
<div class="alert alert-<?php if($_GET['msg']==1) echo "success"; elseif($_GET['msg']==2) echo "danger"; ?>
 alert-dismissible fade show" role="alert" style="display: <?php
    if(isset($_GET['msg'])) echo "block";
    else echo "none";
?> ;">
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  <strong>Alert </strong><?php if($_GET['msg']==1) echo "Registered Successfully"; elseif($_GET['msg']==2) echo "Registration Failed" ?>
</div>

<script>
  var alertList = document.querySelectorAll('.alert');
  alertList.forEach(function (alert) {
    new bootstrap.Alert(alert)
  })
</script>


<div style="display:flex; justify-content:space-between; padding:3% 0;">
    <h1>Student Management</h1>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
      Add
    </button>
</div>

<div class="table-responsive">
    <table class="table table-primary">
        <thead>
            <tr>
                <th>student_id</th>
                <th>email</th>
                <th>fullname</th>
                <th>password</th>
                <th>course_id</th>
                <th>course_name</th>
                <th>teacher_id</th>
                <!-- <th>teacher_name</th> -->
                <th>address</th>
                <th>birthday</th>
                <th>edit</th>
            </tr>
        </thead>
        <tbody>

        <?php
          // if(teacher login) { changing query}

          // $sqlCommand = "SELECT * FROM student_tb";
          
          $sqlCommand = "SELECT `student_id`, `email`, `user_name`, `password`, student_tb.course_id, course_tb.course_name, `teacher_id`, `address`, `birthday` FROM student_tb CROSS JOIN course_tb WHERE student_tb.course_id=course_tb.course_id ORDER BY `student_id`;";

          // $sqlCommand = "SELECT `student_id`, a.email, a.user_name, a.password, a.course_id, a.course_name, a.teacher_id, teacher_tb.user_name, a.address, a.birthday FROM (SELECT `student_id`, `email`, `user_name`, `password`, student_tb.course_id, course_tb.course_name, `teacher_id`, `address`, `birthday` FROM student_tb CROSS JOIN course_tb WHERE student_tb.course_id=course_tb.course_id ) AS a CROSS JOIN teacher_tb WHERE a.teacher_id=teacher_tb.teacher_id ORDER BY `student_id`;";

          $result = $dbSrv->dbcon->query($sqlCommand);


          if ($result->num_rows > 0) {
            // output data of each row

            while($row = $result->fetch_assoc()) {
              echo "<tr>";

              foreach ($row as $value) {
                echo "<td>$value</td>";
              }
              echo "<td><a class='btn btn-primary' href=".$_SERVER['PHP_SELF']."?student_id=".$row['student_id']." role='button' data-bs-toggle='modal' data-bs-target='#exampleModal'>Edit</a></td>";
              // echo "<td><button class='btn btn-primary' data-id=".$row['student_id']." type='button' data-bs-toggle='modal' data-bs-target='#exampleModal'>Edit</button></td>";
              echo "</tr>";
            }

          } else {
            echo "0 results";
          }
        ?>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width: 800px;">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">
          <?php
            if (isset($_GET['student_id'])) echo "Student Edit";
            else echo "Add New Student";
          ?>
        </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="<?php echo $baseName?>studentAdd.php" method="POST">
        <div class="modal-body">
          <div class="form-floating mb-3">
            <input
              type="text"
              class="form-control" name="email" id="email" placeholder="email" required>
            <label for="email">email</label>
          </div>
          <div class="form-floating mb-3">
            <input
              type="text"
              class="form-control" name="user_name" id="user_name" placeholder="user_name" required>
            <label for="user_name">fullname</label>
          </div>
          <div class="form-floating mb-3">
            <input
              type="password"
              class="form-control" name="password" id="password" placeholder="password" required>
            <label for="password">password</label>
          </div>
          <div class="form-floating mb-3">
            <input
              type="number"
              class="form-control" name="course_id" id="course_id" placeholder="course_id" required>
            <label for="course_id">course_id</label>
          </div>
          <div class="form-floating mb-3">
            <input
              type="text"
              class="form-control" name="teacher_id" id="teacher_id" placeholder="teacher_id" required>
            <label for="teacher_id">teacher_id</label>
          </div>
          <div class="form-floating mb-3">
            <input
              type="text"
              class="form-control" name="address" id="address" placeholder="address">
            <label for="address">address</label>
          </div>
          <div class="form-floating mb-3">
            <input
              type="date"
              class="form-control" name="birthday" id="birthday" placeholder="birthday">
            <label for="birthday">birthday</label>
          </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary" value="Save changes">
          </div>
      </form>
      
    </div>
  </div>
</div>
    
<?php include './pages/footer.php'; ?>


<?php 
    
  if($_SERVER['REQUEST_METHOD']=="GET") {

      
  }

  $dbSrv->closeDb();
?>