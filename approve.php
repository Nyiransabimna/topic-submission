<?php
require 'db.php';
$id = $_GET['id'];
if (isset ($_POST['status']) ) {
  $status = $_POST['status'];

  $sql = "UPDATE to`student` SET `status`='2' WHERE student_id='"+id+"'";
  $statement = $connection->prepare($sql);
  if ($statement->execute([':student_id' => $id])) {
    header("Location: view.php");
  }



}


 ?>