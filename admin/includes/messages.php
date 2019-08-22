<?php if(isset($_GET['msg']) && !empty($_GET['msg'])): ?>

<div class="row">
			<div class="col-12">
				  <div class="alert alert-success mt-3 mb-0" role="alert">
					<?php echo $_GET['msg']; ?>
			     </div>
			</div>	
	   </div>
	<?php endif;  ?>



	<?php if(isset($_GET['error']) && !empty($_GET['error'])): ?>

<div class="row">
			<div class="col-12">
				  <div class="alert alert-danger mt-3 mb-0" role="alert">
					<?php echo $_GET['error']; ?>
			     </div>
			</div>	
	   </div>
	<?php endif;  ?>