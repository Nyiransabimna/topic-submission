<?php
session_start();
$error = "";
$msg = "";


//include fil used to create db connection
include('db.php');
error_reporting(0);
if (strlen($_SESSION['userID']) == 0) {
    header('location: index.php');
} else {

?>

<?php require 'header2.php'; ?><br>
<?php require 'header3.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
    <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>TopicName</th>
                                          
                                            <th>Message Feedback</th>
                                            
                                        </tr>
                                    </thead>

                                    <?php
require 'db.php';
$sql= 'SELECT * from student';
$statement = $connection->prepare($sql);
$statement->execute();
$people = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>


<?php foreach($people as $person): ?>
          <tr>
            <td><?= $person->topicname; ?></td>
            <td><?= $person->message; ?></td>
        </tr>
          <?php endforeach; ?>
           
          
                                    
  </div>
</div>
     
