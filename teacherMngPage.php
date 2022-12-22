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
<div class="alert alert-<?php 
  if(isset($_GET['msg'])){
    if($_GET['msg']==1) echo "success"; elseif($_GET['msg']==2) echo "danger"; 
  }
?>
 alert-dismissible fade show" role="alert" style="display: <?php
    if(isset($_GET['msg'])) echo "block";
    else echo "none";
?> ;">
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  <strong>Alert </strong><?php 
  if(isset($_GET['msg'])){
    if($_GET['msg']==1) echo "Registered Successfully"; elseif($_GET['msg']==2) echo "Registration Failed";
  } 
  ?>
</div>

<script>
  var alertList = document.querySelectorAll('.alert');
  alertList.forEach(function (alert) {
    new bootstrap.Alert(alert)
  })
</script>

<main>
    <div style="display:flex; justify-content:space-between; padding:3% 0;">
        <h1>Teacher Management</h1>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
          Add
        </button>
    </div>

    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th>teacher_id</th>
                    <th>user_name</th>
                    <th>password</th>
                    <th>email</th>
                    <th>course_id</th>
                    <th>salary</th>
                    <th>address</th>
                    <th>birthday</th>
                    <th>edit</th>
                </tr>
            </thead>
            <tbody>
              <?php
                // if(teacher login) { changing query}
                $sqlCommand = "SELECT * FROM teacher_tb";
                $result = $dbSrv->dbcon->query($sqlCommand);

                if ($result->num_rows > 0) {
                  // output data of each row
                
                  while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                  
                    foreach ($row as $key=>$value) {
                      if($key=="salary"){
                        if($value==null){
                          echo "<td>$value</td>";
                        } else {
                          echo "<td>$$value</td>";
                        }
                      } else {
                        echo "<td>$value</td>";
                      }
                    } 
                    // echo "<td><a class='btn btn-primary' href=".$_SERVER['PHP_SELF']."?teacher_id="." role='button'>Edit</a></td>";
                    echo "<td><button class='btn btn-primary' type='button' data-bs-toggle='modal' data-bs-target='#editModal' href=".$_SERVER['PHP_SELF']."?teacher_id="." role='button'>Edit</button></td>";
                    echo "</tr>";
                  }
                
                } else {
                  echo "0 results";
                }
              ?>
            </tbody>
        </table>
    </div>

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width: 800px;">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Modal</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      <form action="./teacherAdd.php" method="POST">
        <div class="form-floating mb-3">
          <input
            type="text"
            class="form-control" name="user_name" id="user_name" placeholder="user_name">
          <label for="user_name">user_name</label>
        </div>
        <div class="form-floating mb-3">
          <input
            type="password"
            class="form-control" name="password" id="password" placeholder="password">
          <label for="password">password</label>
        </div>
        <div class="form-floating mb-3">
          <input
            type="email"
            class="form-control" name="email" id="email" placeholder="email">
          <label for="email">email</label>
        </div>
        <div class="form-floating mb-3">
          <input
            type="number"
            class="form-control" name="course_id" id="course_id" placeholder="course_id">
          <label for="course_id">course_id</label>
        </div>
        <div class="form-floating mb-3">
          <input
            type="number"
            class="form-control" name="salary" id="salary" placeholder="salary">
          <label for="salary">salary</label>
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
        <!-- <button type="submit" class="btn btn-primary">Save changes</button> -->
        <input type="submit" class="btn btn-primary" value="Save changes">
      </div>
      </form>

    </div>
  </div>
</div>




<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width: 800px;">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Modal</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      <form action="./teacherEdit.php" method="POST">
        <div class="form-floating mb-3">
          <input
            type="text"
            class="form-control" name="user_name" id="user_name" placeholder="user_name">
          <label for="user_name">user_name</label>
        </div>
        <div class="form-floating mb-3">
          <input
            type="password"
            class="form-control" name="password" id="password" placeholder="password">
          <label for="password">password</label>
        </div>
        <div class="form-floating mb-3">
          <input
            type="email"
            class="form-control" name="email" id="email" placeholder="email">
          <label for="email">email</label>
        </div>
        <div class="form-floating mb-3">
          <input
            type="number"
            class="form-control" name="course_id" id="course_id" placeholder="course_id">
          <label for="course_id">course_id</label>
        </div>
        <div class="form-floating mb-3">
          <input
            type="number"
            class="form-control" name="salary" id="salary" placeholder="salary">
          <label for="salary">salary</label>
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
        <!-- <button type="submit" class="btn btn-primary">Save changes</button> -->
        <input type="submit" class="btn btn-primary" value="Save changes">
      </div>
      </form>

    </div>
  </div>
</div> 




    
</main>
<?php include './pages/footer.php'; ?>

<?php 
    if($_SERVER['REQUEST_METHOD']=="GET") {

        
    }

?>