<!doctype html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<?php include("inc/dash_layout.php"); ?>
		<title> Admin Panel</title>
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
							<h4 class="content-title mb-0 my-auto">GST Setup</h4>
						</div>
					</div>
					
				</div>
				<!-- breadcrumb -->

				<!-- row -->
				<div class="row justify-content-center">
					<div class="col-md-6">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">
									GST Setup
								</h4>
							</div>
							<div class="card-body">
								<form action="<?= base_url('admin_panel/GstSetup/updateGst'); ?>" method="post">
									<div class="form-group">
										<label>Company Name</label>
										<input type="text" name="comp" class="form-control" value="<?= $data['comp']; ?>">
									</div>
									<div class="form-group">
										<label>Company Address</label>
										<textarea name="address" class="form-control"><?= $data['address']; ?></textarea>
									</div>
									<div class="form-group">
										<label>GSTIN</label>
										<input type="text" name="gstin" class="form-control" value="<?= $data['gstin']; ?>">
									</div>
									<div class="form-group">
										<label>GST (%)</label>
										<input type="text" name="prcnt" class="form-control" value="<?= $data['percents']; ?>">
									</div>
									<div class="form-group">
										<button class="btn btn-primary">Save</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				
				<!-- row closed -->
				<?php if($feed = $this->session->flashdata("Feed")){ ?>
					<div class="flashd"><?= $feed; ?></div>
				<?php } ?>
			</div>
			<!-- Container closed -->
		</div>
		<?php include("inc/rightmenu.php"); ?>
		<?php include("inc/footer.php"); ?>
		<?php include("inc/dash_js.php"); ?>
	</body>
</html>