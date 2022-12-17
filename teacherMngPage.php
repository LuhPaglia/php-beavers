<?php include './pages/header.php'; ?>
<main>
    <div style="display:flex; justify-content:space-between; padding:3% 0;">
        <h1>Teacher Management</h1>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Add
        </button>
    </div>

    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th>teacher_id</th>
                    <th>email</th>
                    <th>password</th>
                    <th>fullname</th>
                    <th>course_id</th>
                    <th>salary</th>
                    <th>address</th>
                    <th>birthday</th>
                    <th>edit</th>
                </tr>
            </thead>
            <tbody>
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
                        <button class="btn btn-primary">Edit</button>
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
            type="text"
            class="form-control" name="teacher_id" id="teacher_id" placeholder="teacher_id">
          <label for="teacher_id">teacher_id</label>
        </div>
        <div class="form-floating mb-3">
          <input
            type="text"
            class="form-control" name="email" id="email" placeholder="email">
          <label for="email">email</label>
        </div>
        <div class="form-floating mb-3">
          <input
            type="text"
            class="form-control" name="password" id="password" placeholder="password">
          <label for="password">password</label>
        </div>
        <div class="form-floating mb-3">
          <input
            type="text"
            class="form-control" name="fullname" id="fullname" placeholder="fullname">
          <label for="fullname">fullname</label>
        </div>
        <div class="form-floating mb-3">
          <input
            type="text"
            class="form-control" name="course_id" id="course_id" placeholder="course_id">
          <label for="course_id">course_id</label>
        </div>
        <div class="form-floating mb-3">
          <input
            type="text"
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
            type="text"
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
    
</main>
<?php include './pages/footer.php'; ?>
<script>
    const myModal = document.getElementById('myModal')
    const myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', () => {
      myInput.focus()
    })
</script>