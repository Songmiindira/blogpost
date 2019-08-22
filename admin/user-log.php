<?php 
require_once 'includes/init.php';
require_once 'includes/user-check.php';
require_once 'includes/db_con.php';

$u = $_GET['u'];
$sql = "SELECT * FROM users WHERE username = '{$u}'";
$result = db_query($con, $sql);
$user = db_fetch_assoc($result);

$title = $user['first_name'].' -Users login logs';
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
				<h1><i class="zmdi zmdi-time"></i><?php echo $title; ?></h1>
			</div>
			<div class="col-12">
				<table class="table table-stripped table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>IP ADDRESS</th>
							<th>Logged in at</th>
						</tr>
					</thead>
					<tbody>
						<?php

						$sql="SELECT COUNT(*) AS total FROM login_logs WHERE user_id ='{$user['$id']}' ORDER BY created_at DESC";
						$result = db_query($con, $sql);
						$data = db_fetch_assoc($result);
						$total = $data['total'];

						$limit = 10;

						$pages = ceil($total/$limit);

						if(isset($_GET['p']) && !empty($_GET['p'])){
							if($page_no <= $pages){
							$page_no = $_GET['p'];
						}
						else{
							$page_no = $pages;
						}
					} 
					else{
						$page_no = 1;
					}

					$offset = ($limit * $page_no)-$limit;

						$sql="SELECT * FROM login_logs WHERE user_id ='{$user['$id']}' ORDER BY created_at DESC LIMIT {'$offset'},{'$limit'}";

						$result=db_query($con,$sql);
						$n=1;
						if($result && db_num_rows($result)>0):
						?>
						<?php while($log =db_fetch_assoc($result)): ?>
							<tr>
								<td><?php echo $n; $n++; ?></td>
								<td><?php echo $log['ip_address'] ?></td>
								<td><?php echo date('j M Y H:i:s', strtotime($log['created_at'])); ?></td>
							</tr>
					<?php endwhile; ?>
					<?php endif; ?>
					</tbody>
				</table>
			</div>

			<div class="col-12">
					<nav>
  						<ul class="pagination">
  							<?php if($page_no >1 ): ?>
    						<li class="page-item">
    						<a class="page-link" href="#"><i class="zmdi zmdi-chevron-left"></i></a>
    						</li>
    					<?php endif; ?>

    						<li class="page-item"><a class="page-link" href="#">1</a></li>
    						<li class="page-item active">
      						<span class="page-link">
       						 2
        						<span class="sr-only">(current)</span>
      						</span>
    						</li>
    						<li class="page-item"><a class="page-link" href="#">3</a></li>
    						<li class="page-item">
      						<a class="page-link" href="#">Next</a>
    						</li>
  						</ul>
						</nav>		
									
			</div>
				</div>
					</div>	
				  		</div>
							</div>
								</div>
<?php require_once 'includes/footer.php'; ?>

