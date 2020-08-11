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
							<h4 class="content-title mb-0 my-auto">Coupons</h4>
						</div>
					</div>
					
				</div>
				<!-- breadcrumb -->

				<!-- row -->
				<div class="row">
					<div class="col-md-4">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Add Coupons</h4>
							</div>
							<div class="card-body">
								<form action="<?= base_url('admin_panel/Coupons/addCpn'); ?>" method="post">
									<div class="form-group">
										<label>Coupon Code</label>
										<input type="text" id="code" name="coupon" class="form-control" required="required">
										<a id="grnr" href="#">Generate Code</a>
									</div>
									<div class="form-group">
										<label>Discount(%)</label>
										<input type="number" name="discount" class="form-control" required="required">
									</div>
									<div class="form-group">
										<label>Valid for(Days)</label>
										<input type="number" name="valid" class="form-control" required="required">
									</div>
									<div class="form-group">
										<button class="btn btn-primary">Save</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="col-md-8">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">
									All Coupons
								</h4>
							</div>
							<div class="card-body">
								<table class="table table-bordered">
									<tr>
										<th>Coupon Code</th>
										<th>Discount</th>
										<th>Valid For</th>
										<th>Started From</th>
										<th>Action</th>
									</tr>
									<?php if(!empty($data)){ ?>
										<?php foreach ($data as $key) { ?>
											<tr>
												<td><?= $key['coupon_code']; ?></td>
												<td><?= $key['discount']; ?>%</td>
												<td><?= $key['valid_for']; ?> Days</td>
												<td><?= $key['date']; ?></td>
												<td><a href="<?= base_url('admin_panel/Coupons/delCpn/'.$key['id']); ?>" class="text-danger" >Delete</a></td>
											</tr>
										<?php } ?>
									<?php } ?>
								</table>
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
		<script type="text/javascript">
			$("#grnr").click(function() {
		var randomString = function(length) {
			
			var text = "";
		
			var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
			
			for(var i = 0; i < length; i++) {
			
				text += possible.charAt(Math.floor(Math.random() * possible.length));
			
			}
			
			return text;
		}

		// random string length
		var random = randomString(8);
		
		// insert random string to the field
		var elem = document.getElementById("code").value = random;
		
	})();

	
		</script>
	</body>
</html>