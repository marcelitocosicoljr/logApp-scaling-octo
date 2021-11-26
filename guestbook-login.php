<?php
  require('config/config.php');
	require('config/db.php');
  
  if(isset($_POST['submit']))
	{
		$un= $_POST['username'];
		$pw= $_POST['password'];
		$result= $conn->query("SELECT * FROM account WHERE username='$un' AND password='$pw'") or die('Cannot login:'.mysqli_error()); 

		$row= $result ->Fetch_array();
		$nr= $result->num_rows;
		if($nr> 0)
		{
			session_start();
			$_SESSION['aid']= $row['id'];
			header("location: guestbook-list.php");	
		}else
		{ $errMSG="Invalid Username or Password! <br> Please try again!";}

	}
?>
<?php include('inc/header.php'); ?>
  <br/>
  <div style="width:30%; margin: auto; text-align: center;">
    <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" class="form-signin">
      <img class="mb-4" src="img/bootstrap.svg" alt="" width="100" height="100">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputEmail" class="sr-only">Username</label>
      <input type="text" id="username" name="username" class="form-control" placeholder="Username" required="" autofocus="">
      <br/><label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="">
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button type="submit" name="submit" value="Submit" class="btn btn-lg btn-primary btn-block">Sign in</button>

    </form>
  </div>
<?php include('inc/footer.php'); ?>