<?php 
    include './pages/header.php'; 
?>

<style><?php include './css/styles.css'; ?></style>

<h1 id="h1login">Login page</h1>

<section id="login">
  <h2 >Welcome</h2>
  <div>  
    <form action="<?php echo $baseName.'./server/login.php'; ?>" method="post">
      <h4>Select Role</h4>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="role" id="admin">
        <label class="form-check-label" for="admin">
          Admin
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="role" id="teacher">
        <label class="form-check-label" for="teacher">
          Teacher
        </label>
      </div>
      <div class="form-check">
          <input class="form-check-input" type="radio" name="role" id="student">
          <label class="form-check-label" for="student">
              Student
          </label>
      </div>
      
      <div class="form-floating mb-3" >
          <input
          type="email"
          class="form-control" name="email" id="email" placeholder="email" required>
          <label for="email">email</label>
      </div>
      <div class="form-floating mb-3" >
          <input
          type="password"
          class="form-control" name="password" id="password" placeholder="password" required>
          <label for="password">password</label>
      </div>
      <button type="submit" class="btn btn-primary">Login</button>
      <p>Not our member?
          <a href="./register.php">Register</a>
      </p>

    </form>

  </div>

</section>
<?php include './pages/footer.php'; ?>
