<?php include './pages/header.php'; ?>
<main>
    <div style="display:flex; justify-content:space-between; padding:3% 0;">
        <h1>Grade Management</h1>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Add
        </button>
    </div>

    <div class="table-responsive">
        <table class="table table-success">
            <thead>
                <tr>
                    <th>grade_id</th>
                    <th>classwork_name</th>
                    <th>student_id</th>
                    <th>teacher_id</th>
                    <th>course_id</th>
                    <th>mark</th>
                    <th>date</th>
                    <th>feedback</th>
                    <th>edit</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>10001</td>
                    <td>CourseWork#3</td>
                    <td>101</td>
                    <td>11</td>
                    <td>1001</td>
                    <td>12</td>
                    <td>2022/12/19</td>
                    <td>
                        <p>
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consequatur perspiciatis est quam nostrum repellat magni dignissimos inventore impedit officiis. Minus vero laudantium incidunt quisquam cumque accusantium! Quasi, quis expedita? Nobis.
                        </p>
                    </td>
                    <td>
                        <button class="btn btn-success">Edit</button>
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
            class="form-control" name="grade_id" id="grade_id" placeholder="grade_id">
          <label for="grade_id">grade_id</label>
        </div>
        <div class="form-floating mb-3">
          <input
            type="text"
            class="form-control" name="classwork_name" id="classwork_name" placeholder="classwork_name">
          <label for="classwork_name">classwork_name</label>
        </div>
        <div class="form-floating mb-3">
          <input
            type="number"
            class="form-control" name="student_id" id="student_id" placeholder="student_id">
          <label for="student_id">student_id</label>
        </div>
        <div class="form-floating mb-3">
          <input
            type="number"
            class="form-control" name="teacher_id" id="teacher_id" placeholder="teacher_id">
          <label for="teacher_id">teacher_id</label>
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
            class="form-control" name="mark" id="mark" placeholder="mark">
          <label for="mark">mark</label>
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
            class="form-control" name="date" id="date" placeholder="date">
          <label for="date">date</label>
        </div>
        <div class="form-floating mb-3">
          <input
            type="text"
            class="form-control" name="feedback" id="feedback" placeholder="feedback">
          <label for="feedback">feedback</label>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success">Save changes</button>
      </div>
    </div>
  </div>
</div>
    
</main>
<?php include './pages/footer.php'; ?>