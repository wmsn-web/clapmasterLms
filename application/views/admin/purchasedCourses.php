<!doctype html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<?php include("inc/table_layout.php"); ?>
		<title>Purchased Courses - Admin Panel</title>
	</head>
	<body class="main-body app sidebar-mini Light-mode">
		
		<?php include("inc/sidemenu.php"); ?>
		<div class="main-content app-content">
			<?php include("inc/header.php"); ?>
			<div class="container-fluid">

				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<a href="<?= base_url('admin_panel/'); ?>">
								<i class="mdi mdi-home text-muted hover-cursor"></i>
						    </a>
						    
								<p class="text-primary mb-0 hover-cursor">&nbsp;/&nbsp;Purchased Course&nbsp;/&nbsp;</p>
						</div>
					</div>
					
				</div>
				<!-- breadcrumb -->

				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-bordered" id="example1">
										<thead>
											<tr>
												<th>Date</th>
												<th>Order ID</th>
												<th>User</th>
												<th>Plan</th>
												<th>Course/level/Videos</th>
												<th>Payment</th>
												<th>TXNID</th>
											</tr>
										</thead>
										<tbody>
											<?php if(!empty($data)){ ?>
												<?php foreach($data as $key){ ?>
													<tr>
														<td><?= $key['date']; ?></td>
														<td><?= $key['orderId']; ?></td>
														<td data-placement="top" data-toggle="tooltip" title="Mobile: <?= $key['mobile']." Email:".$key['email']; ?>">
															<?= $key['user']; ?>
														</td>
														<td><?= $key['plan']; ?></td>
														<td>
															<?php
															if($key['plan']=="basic"){
															 foreach($key['course'] as $crs): echo $crs." | "; 
															 endforeach;
															}elseif($key['plan']=="level"){ ?>
															 	<?= $key['course'][0]; ?>
															 <?php }else{ ?>
															 	<?php print_r($key['course']); ?>
															 <?php } ?>
															 </td>
															
														<td>Success</td>
														<td><?= $key['txnId']; ?></td>
													</tr>
												<?php } ?>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<?php include("inc/rightmenu.php"); ?>
		<?php include("inc/footer.php"); ?>
		<?php include("inc/table_js.php"); ?>
	</body>
</html>