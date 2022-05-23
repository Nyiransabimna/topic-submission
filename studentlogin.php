<?php
session_start();
$error = "";
$msg = "";
include('db.php');
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashespas = password_hash($password, PASSWORD_BCRYPT);

    $selectQuery = "SELECT * FROM student WHERE username=? and password=?";
    $loginStatement =$connection->prepare($selectQuery);
    $loginStatement ->execute([$username,$password]);
    if ($loginStatement->rowCount() == 1) {
     $one = $loginStatement->fetch(PDO::FETCH_OBJ);
     $_SESSION['userID'] = $one->student_id;
     $_SESSION['fname'] = $one->firstname;
     $_SESSION['lname'] = $one->lastname;
     header("location: submit.php");
       }
          }  else {
            // password does not match
            $error = "Password does not match with any of account , Please try again later!!";
        }
     
?>

<?php require 'header2.php'; ?><br>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Welcome to Student Login Form</h2>
      
    </div>
    <div class="card-body">
      
      <form method="post">
        <div class="form-group">
          <label for="name">Username</label>
          <input type="text" name="username" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Password</label>
          <input type="password" name="password" id="email" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info" name="login">Login</button>

        </div>
        <a href="createacc.php">create account</a>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
