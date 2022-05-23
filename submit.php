<?php
session_start();
$error = "";
$msg = "";

include('db.php');
error_reporting(0);
if (strlen($_SESSION['userID']) == 0) {
    header('location: index.php');
} else {

?>

<?php

require 'db.php';
$message = '';
if (isset ($_POST['topicname'])  && isset($_POST['description']) && isset($_POST['student_id']) ) {
  $topicname = $_POST['topicname'];
  $description = $_POST['description'];
  $student_id = $_POST['student_id'];
  $sql = 'INSERT INTO topic(topicname, description, student_id) VALUES(:topicname, :description, :student_id)';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':topicname' => $topicname, ':description' => $description, ':student_id' => $student_id])) {
    $message = 'Topic is submited successfully';
  }

}




 ?>
<?php require 'header2.php'; ?><br>
<?php require 'header3.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>submit topic</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        
        <div class="form-group">
          <label for="email">Enter Your topic Projectl</label>
          <input type="text" name="topicname" id="email" class="form-control">
        </div>
        
        <div class="form-group">
          <label for="email">Enter Your description</label>
          <textarea  name="description" id="email" class="form-control"></textarea>
        </div>
        
          <input type="hidden" name="student_id" value="<?php echo $_SESSION['userID'];?>" id="email" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Submit Topic</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php



 require 'footer.php';

   } 

 ?>
     