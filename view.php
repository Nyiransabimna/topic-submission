<?php
require 'db.php';
$sql= 'SELECT * from student,topic where student.student_id = topic.student_id';
$statement = $connection->prepare($sql);
$statement->execute();
$people = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
<?php require 'header2.php'; ?><br>
<?php require 'header4.php';
    
?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>All people</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <th>Firstname</th>
          <th>Lastname</th>
          <th>email</th>
          <th>regno</th>
          <th>Topic name</th>
          <th>Description</th>
          <th>Action</th>
        </tr>
        <?php foreach($people as $person): ?>
          <tr>
            <td><?= $person->student_id; ?></td>
            <td><?= $person->firstname; ?></td>
            <td><?= $person->lastname; ?></td>
            <td><?= $person->email; ?></td>
            <td><?= $person->regno; ?></td>
            <td><?= $person->topicname; ?></td>
            <td><?= $person->description; ?></td>

            <td>
        
              <a onclick="return confirm('Are you sure you want to approve this entry?')" href="approve.php?id=<?= $person->student_id ?>" class='btn btn-success'>Approve</a><br>
              <a onclick="return confirm('Are you sure you want to Reject this entry?')" href="reject.php?id=<?= $person->student_id ?>" class='btn btn-danger'>Reject</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
