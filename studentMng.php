<?php
  include './pages/header.php';
  include './services/dbservices.php';

  $dbSrv = new dbServices($hostName,$userName,$password,$dbName);

  if($dbSrv->dbConnect()){
    echo "connected";

  }else{
    echo "problem";
    exit();
  }


?>
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
                    <th>password</th>
                    <th>fullname</th>
                    <th>course_id</th>
                    <th>teacher_id</th>
                    <th>address</th>
                    <th>birthday</th>
                    <th>edit</th>
                </tr>
            </thead>
            <tbody>

            <?php

              $result = $dbSrv->selectAll("student_tb");

              if ($result->num_rows > 0) {
                // output data of each row

                while($row = $result->fetch_assoc()) {
                  echo "<tr>";

                  foreach ($row as $value) {
                    echo "<td>$value</td>";
                  }
                  echo "<td><a class='btn btn-primary' href=".$_SERVER['PHP_SELF']."?student_id="." role='button'>Edit</a></td>";
                  echo "</tr>";
                }

              } else {
                echo "0 results";
              }
            ?>
                <tr>
                    <td>11</td>
                    <td>austyn@mail.com</td>
                    <td>test</td>
                    <td>Austyn You</td>
                    <td>1001</td>
                    <td>$85000</td>
                    <td>889, W Pender St</td>
                    <td>2003/07/22</td>
                    <td>
                        <a class="btn btn-primary" href="<?php echo $_SERVER['PHP_SELF']."?student_id=" ?>" role="button">Edit</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width: 800px;">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      <div class="form-floating mb-3">
          <input
            type="number"
            class="form-control" name="student_id" id="student_id" placeholder="student_id" required>
          <label for="student_id">student_id</label>
        </div>
        <div class="form-floating mb-3">
          <input
            type="text"
            class="form-control" name="email" id="email" placeholder="email" required>
          <label for="email">email</label>
        </div>
        <div class="form-floating mb-3">
          <input
            type="password"
            class="form-control" name="password" id="password" placeholder="password" required>
          <label for="password">password</label>
        </div>
        <div class="form-floating mb-3">
          <input
            type="text"
            class="form-control" name="username" id="username" placeholder="username" required>
          <label for="username">fullname</label>
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
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
    
<?php include './pages/footer.php'; ?>


<?php 
    if($_SERVER['REQUEST_METHOD']=="GET") {

        
    }

?>