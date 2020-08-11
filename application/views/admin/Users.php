<!doctype html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<?php include("inc/table_layout.php"); ?>
		<title> All Users</title>
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
						    
								<p class="text-primary mb-0 hover-cursor">&nbsp;/&nbsp;All Users&nbsp;/&nbsp;</p>
						</div>
					</div>
					
				</div>
				<!-- breadcrumb -->

				<!-- row -->
				<div class="row justify-content-center">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">All Users</h3>
							</div>
							<div class="card-body">
								<table class="table table-bordered" id="example2">
									<thead>
										<tr>
											<th>Name</th>
											<th class="bg-primary text-white">Email</th>
											<th class="bg-warning text-white">Mobile</th>
											<th class="bg-primary text-white">Details</th>
										</tr>
									</thead>
									<tbody>
										<?php if(!empty($allData)){ ?>
											<?php $s =1; foreach ($allData as $key) { ?>
												<tr>
													<td><?= $key['name']; ?></td>
													<td><b><?= $key['email']; ?></b>
													</td>
													<td><?= $key['mobile']; ?></td>
													<td><a  href="<?= base_url('admin_panel/Users/userDetails/'.$key['user_id']); ?>">View Details</a></td>
												</tr>
											<?php } ?>
									    <?php } ?>
									</tbody>
								</table>
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
		<?php include("inc/table_js.php"); ?>
		<script type="text/javascript">
					
			
		</script>
	</body>
</html>