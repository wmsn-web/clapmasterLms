<!doctype html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<?php include("inc/tree_layout.php"); ?>
		
		<title>User Details</title>
		
	</head>
	<body class="main-body app sidebar-mini Light-mode">
		<div id="global-loader" class="light-loader">
			<img src="<?= base_url(); ?>admin_assets/img/loaders/loader.svg" class="loader-img" alt="Loader">
		</div>
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
						    <a href="<?= base_url('admin_panel/Users'); ?>">
						    	<p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;All Users&nbsp;/&nbsp;</p>
						    </a>
								<p class="text-primary mb-0 hover-cursor">User Details - <?= $gtUser['name']; ?></p>
						</div>
					</div>
					
				</div>
				<!-- breadcrumb -->

				<!-- row -->
				<div class="row">
					<div class="col-md-4">
						<div class="card   ht-380">
							<div class="card-header">
								<h3 class="card-title">User Details</h3>
							</div>
							<div class="card-body">
								<span>Name: <?= $gtUser['name']; ?></span><br>
								<span>Email: <?= $gtUser['email']; ?></span><br>
								<span>Mobile: <?= $gtUser['mobile']; ?></span><br>
							</div>
						</div>
					</div>
					<div class="col-md-8">
						<div class="card ht-380">
							<div class="card-header">
								<h3 class="card-title">Purchased Courses</h3>
							</div>
							<div class="card-body">
								<ul id="tree2">
									<?php foreach ($prchsData as $key) { ?>
										<td>
										<li><a href="#"><?= $key['purchesed']; ?></a>
											<ul>
												<li>
													<span>
														<b>Purchse Date:</b> <?= $key['date']; ?><br>
														<b>Order Id:</b> <?= $key['order_id']; ?><br>
														<b>TXN ID:</b> <?= $key['txnId']; ?><br>
														<b>Status:</b> <?= $key['status']; ?><br>
													</span>
												</li>
												<?php if(empty($key['crs_lvl'])){ ?>
													<ul>
														<li>
															<?php if(empty($key['snglVids'])){ ?>
																<?php foreach ($key['basic_vid'] as $keybs) { ?>
																	<li>
																		<a target="_blank" href="<?= base_url('admin_panel/VideoPlay/index/'.$keybs['vid_id']); ?>">
																		<img src="<?= base_url('uploads/videos/'.$keybs['thumb']); ?>" width="35">
																		<?= $keybs['title']; ?><br>
																		<b>Watched: <?= $keybs['watch_time']; ?></b></a>
																	</li>

																	<?php } ?>
															    <?php }else{  ?>
																<?php foreach ($key['snglVids'] as $keynv) { ?>
																	<li>
																		<a target="_blank" href="<?= base_url('admin_panel/VideoPlay/index/'.$keynv['vid_id']); ?>">
																		<img src="<?= base_url('uploads/videos/'.$keynv['thumb']); ?>" width="35">
																		<?= $keynv['title']; ?><br>
																		<b>Watched: <?= $keynv['watch_time']; ?></b></a>
																	</li>
																<?php } ?>
															<?php } ?>
														</li>
													</ul>
												<?php }else{ ?>
												<?php foreach ($key['crs_lvl'] as $keyl) { ?>
													<li><a href="#"><?= $keyl['chap_name']; ?></a>
														<ul>
															<?php foreach ($keyl['vids'] as $keyV): ?>
																<li>
																	<a target="_blank" href="<?= base_url('admin_panel/VideoPlay/index/'.$keyV['vid_id']); ?>">
																	<img src="<?= base_url('uploads/videos/'.$keyV['thumb']); ?>" width="35">
																	<?= $keyV['title']; ?><br>
																		<b>Watched: <?= $keyV['watch_time']; ?></b></a>
																</li>
															<?php endforeach ?>
															
														</ul>
													</li>
												<?php } ?>
												<?php } ?>
										    </ul>
										</li>
									</td>
									<?php } ?>		
								</ul>
							</div>
						</div>
					</div>
					
					
				</div>
				
				<!-- row closed -->
			</div>
			<?php if($feed = $this->session->flashdata("Feed")){ ?>
					<div class="flashd"><?= $feed; ?></div>
				<?php } ?>
			<!-- Container closed -->
		</div>
		<div class="modal" id="modaldemo3">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">Analytics Details</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<div id="bd">

					</div>
					<div class="modal-footer">
						<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
					</div>
				</div>
			</div>
		</div>
		<?php include("inc/rightmenu.php"); ?>
		<?php include("inc/footer.php"); ?>
		<?php include("inc/tree_js.php"); ?>
		<script type="text/javascript">
					
			
		</script>
	</body>
</html>