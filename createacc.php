<?php
require 'db.php';
$message = '';
if (isset ($_POST['firstname'])  && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['regno']) && isset($_POST['username']) && isset($_POST['password']) ) {
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $regno = $_POST['regno'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $sql = 'INSERT INTO student(firstname, lastname, email, regno, username, password) VALUES(:firstname, :lastname, :email, :regno, :username, :password)';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':firstname' => $firstname, ':lastname' => $lastname, ':email' => $email, ':regno' => $regno, ':username' => $username, ':password' => $password])) {
    $message = 'new account is  successfully';
  }



}


 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Create New Account</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="name">FIRSTNAME</label>
          <input type="text" name="firstname" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">lASTNAME</label>
          <input type="text" name="lastname" id="email" class="form-control">
        </div>
        <div class="form-group">
          <label for="name">REGNUMBER</label>
          <input type="text" name="regno" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">USERNAME</label>
          <input type="text" name="username" id="email" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">PASSWORD</label>
          <input type="password" name="password" id="email" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Create a person</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
