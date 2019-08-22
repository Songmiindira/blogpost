<?php 
require_once 'includes/init.php';

$title = 'Login';
require_once 'includes/header.php';
 ?>

<div class="container-fluid">
	<div class="row">
	<div class="col content-holder">
		<?php require_once 'includes/messages.php';	?>
	<div class="col-4 mx-auto content-body my-3">
			<div class="row">
				
				<div class="col-12 text-center">
					<h1><?php echo $title; ?></h1>
				</div>
				<div class="col-12">
					<form method="post" action="login-exec.php">
						<div class="form-group">
							<label>Username/Email</label>
							<input type="text" name="username" id="username" class="form-control" required>
						</div>

						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" id="password" class="form-control" required>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-outline-primary">Login</button>
						</div>
					</form>
				</div>
			</div>

						</div>	
				</div>
			</div>
	</div>


<?php require_once 'includes/footer.php'; ?>
