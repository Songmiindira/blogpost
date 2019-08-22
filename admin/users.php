<?php 
require_once 'includes/init.php';
require_once 'includes/user-check.php';
require_once 'includes/db_con.php';

$title = 'Users';
require_once 'includes/header.php';
 ?>

<div class="container-fluid">
	<div class="row">
	 	<?php require_once 'includes/side-nav.php'; ?>
	<div class="col content-holder">
		<?php require_once 'includes/top-bar.php'; ?>
		<?php require_once 'includes/messages.php';	?>

	<div class="col-12 content-body my-3">
		<div class="row">
			<div class="col">
				<h1><i class="zmdi zmdi-account"></i><?php echo $title; ?></h1>
			</div>
			<div class="col-2 my-2 text-right">
				<a href="<?php echo url('admin/user-add.php')?>" class="btn btn-primary"><i class="zmdi zmdi-plus"></i> Add User</a>
			</div>
			<div class="col-12">
				<table class="table table-stripped table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Email</th>
							<th>Username</th>
							<th>Address</th>
							<th>Contact</th>
							<th>Type</th>
							<th>Status</th>
							<th>Created at</th>
							<th>Updated at</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$sql="SELECT * FROM users";
						$result=db_query($con,$sql);
						$n=1;
						if($result && db_num_rows($result)>0):
						?>
						<?php while($user =db_fetch_assoc($result)): ?>
							<tr>
								<td><?php echo $n; $n++; ?></td>
								<td><?php echo $user['first_name'].' '.$user['middle_name'].' '.$user['last_name'];?></td>
								<td><?php echo $user['email']; ?></td>
								<td><?php echo $user['username']; ?></td>
								<td><?php echo $user['address']; ?></td>
								<td><?php echo $user['contact']; ?></td>
								<td><?php echo fcapital($user['type']); ?></td>
								<td><?php echo fcapital($user['status']); ?></td>
								<td><?php echo date('j M Y H:i:s', strtotime($user['created_at'])); ?></td>
								<td><?php echo date('j M Y H:i:s', strtotime($user['updated_at'])); ?></td>
								<td>
									<a href="<?php echo url('admin/user-edit.php?u='.$user['username']); ?>" title="Edit this item." class="mr-3" ><i class="zmdi zmdi-edit"></i></a>
									<a href="<?php echo url('admin/user-delete.php?u='.$user['username']); ?>" title="Delete this item." class= "delete mr-3"><i class = "zmdi zmdi-delete"></i></a>
									<a href="<?php echo url('admin/user-log.php?u='.$user['username']); ?>" title = "User login logs."><i class="zmdi zmdi-time"></i></a>
								</td>

							</tr>
					<?php endwhile; ?>
					<?php endif; ?>
					</tbody>
				</table>
			</div>
				</div>
					</div>	
				  		</div>
							</div>
								</div>
<?php require_once 'includes/footer.php'; ?>

