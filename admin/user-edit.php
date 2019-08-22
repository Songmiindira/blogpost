<?php 
require_once 'includes/init.php';
require_once 'includes/user-check.php';
require_once 'includes/db_con.php';

$title = 'Edit User';
require_once 'includes/header.php';

$u = $_GET['u'];
$sql="SELECT * FROM users WHERE username='{$u}'";
$result = db_query($con, $sql);
if($result && db_num_rows($result)> 0):
	?>

<div class="container-fluid">
	<div class="row">
	 	<?php require_once 'includes/side-nav.php'; ?>
	<div class="col content-holder">
		<?php require_once 'includes/top-bar.php'; ?>
		<?php require_once 'includes/messages.php';	?>
	<div class="col-12 content-body my-3">
		<div class="row">
			<div class="col-12">
				<h1><i class="zmdi zmdi-account"></i> <?php echo $title; ?></h1>
			</div>
			<div class="col-6 mx-auto">
				<?php $user = db_fetch_assoc($result); ?>
				<form method="post" action="<?php echo url('admin/user-save.php')?>">
					<input type="hidden" name="id" value="<?php echo $user['id']; ?>">
					<div class="form-group">
						<label for="first_name">First Name</label>
						<input type="text" name="first_name" id="first_name" class="form-control" value="<?php echo $user['first_name']; ?>" required>
					</div>
					<div class="form-group">
						<label for="middle_name">Middle Name(Optional)</label>
						<input type="text" name="middle_name" id="middle_name" class="form-control value="<?php echo $user['middle_name']; ?>"">
					</div>
					<div class="form-group">
						<label for="last_name">Last Name</label>
						<input type="text" name="last_name" id="last_name" class="form-control" value="<?php echo $user['last_name']; ?>" required>
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" name="email" id="email" class="form-control" value="<?php echo $user['email']; ?>" required>
					</div>
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" name="username" id="username" class="form-control" value="<?php echo $user['username']; ?>" required>
					</div>
					<div class="form-group">
						<label for="o_password">Old Password</label>
						<input type="password" name="o_password" id="o_password" class="form-control" >
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" name="password" id="password" class="form-control" >
					</div>
					<div class="form-group">
						<label for="c_password">Confirm password</label>
						<input type="password" name="c_password" id="c_password" class="form-control">
					</div>
					<div class="form-group">
						<label for="address">Address</label>
						<textarea name="address" id="address" class="form-control" required><?php echo $user['address']; ?></textarea>
					</div>
					<div class="form-group">
						<label for="contact">Contact</label>
						<input type="contact" name="contact" id="contact" class="form-control" value="<?php echo $user['contact']; ?>" required>
					</div>
					<div class="form-group">
						<label for="type">Type</label>
						<select name="type" id="type" class="form-control"> 
						<option value="">Select User Type</option>
						<option value="ADMIN" <?php echo $user['type'] =='ADMIN' ? 'selected':''; ?>>Admin</option>
						<option value="AUTHOR" <?php echo $user['type'] =='AUTHOR' ? 'selected':''; ?>>Author</option>
						</select>
					</div>
					<div class="form-group">
						<label for="status">Status</label>
						<select name="status" id="status" class="form-control"> 
						<option value="">Select Status</option>
						<option value="INACTIVE" <?php echo $user['status'] =='INACTIVE' ? 'selected':''; ?>>Inactive</option>
						<option value="ACTIVE" <?php echo $user['status'] =='ACTIVE' ? 'selected':''; ?>>Active</option>
						</select>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success"><i class="zmdi zmdi-floppy"></i> Save</button>
					</div>

				</form>
			</div>
		</div>
	</div>	
</div>
</div>
</div>
<?php endif; ?>

<?php require_once 'includes/footer.php'; ?>

