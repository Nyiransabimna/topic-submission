<?php
			require_once 'db.php';
			session_start();
			if(isset($_POST['login'])){
				$username= $_POST['username'];
				$password= $_POST['password'];
				if(empty($username)){
					$errorMsg[]= "Please Fill Username";
				}elseif(empty($password)){
					$errorMsg[]= "Please fill Password";
				}else{
					try{
						$sql=$connection->prepare("SELECT * FROM teacher WHERE username=:uname AND password=:upassword");
						$sql->execute(array(':uname'=>$username,':upassword'=>$password));
						$row= $sql->fetch(PDO:: FETCH_ASSOC);
						if($sql->rowCount() > 0){
							if($username==$row['username']){
								if($password==$row['password']){
									$_SESSION['user_login']= $row['id'];
									$loginMsg= "Successfully Login...";
									header("refresh:2; teacherhome.php");
								}else{
									$errorMsg[]= "Wrong Password";
								}
								}else{
									$errorMsg[]= "Wrong Username";
							}
						}
					}catch(PDOException $e){
						$e->getMessage();
					}
				}
			}
			?>

			<?php
			if(isset($errorMsg)){
				foreach($errorMsg as $error){
		
			?>
			<div class="errorMsg form-control">
				<strong><?php echo $error;?></strong>
			</div>
			<?php
				}
			}
			if(isset($loginMsg)){

			?>
			<div class="loginMsg form-control">
				<strong><?php echo $loginMsg;?></strong>
			</div>
			<?php
			}
			?>
<?php require 'header2.php'; ?><br>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Welcome to teacher Login Form</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="name">USERNAME</label>
          <input type="text" name="username" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">PASSWORD</label>
          <input type="password" name="password" id="email" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info" name="login">Login</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
