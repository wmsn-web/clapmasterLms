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
							<h4 class="content-title mb-0 my-auto">Dashboard</h4>
						</div>
					</div>
					
				</div>
				<!-- breadcrumb -->

				<!-- row -->
				<div class="row">
					<div class="col-xl-12 col-md-12 col-lg-12">
						<h5>All Courses</h5>
						<div class=" overflow-hidden bg-transparent card-crypto-scroll shadow-none">
							<div class="js-conveyor-example">
								<ul class="news-crypto">
									<?php foreach ($data['crsData'] as $crs) { ?>
										
									<li>
										<a href="">
										<div class="crypto-card">
											<div class="row">
												<div class="d-flex">
													<div class="my-auto">
														<img src="<?= base_url(); ?>admin_assets/img/crypto-currencies/round-outline/waves.svg" class="w-6 h-6 mt-0" alt="">
													</div>
													<div class="ml-3">
														<p class="mb-1 tx-13"><?= $crs['course_name'] ?></p>
														<div class="m-0 tx-13 text-warning"> <span class="text-danger ml-2">Total Videos <?= $crs['totVids'] ?><i class="ion-arrow-down-c mr-1"></i>&nbsp;&nbsp;</span></div>
													</div>
												</div>
											</div>
										</div>
									    </a>
									</li>
									<?php } ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="row row-sm">
					<div class="col-md-12 col-xl-4 col-lg-12">
						<div class="card overflow-hidden recent-operations-card hts-520">
							<div class="card-body p-0">
								<div class="p-3 pb-0">
									<div class="d-flex justify-content-between">
										<h4 class="card-title mg-b-10">Registered Users</h4>
										<i class="mdi mdi-dots-horizontal text-gray"></i>
									</div>
									<p class="tx-12 tx-gray-500 mb-0">Registered Student Name and Student ID <a href=""></a></p>
								</div>
								<div class="transcation-scrolls">
									<ul class="list-unstyled mg-b-0 mt-2">

										<?php foreach ($data['usrData'] as $key2) { ?>
											
										<li class="list-item pl-3 pr-3 mb-0 pb-3">
											<div class="media align-items-center">
												<div class="wd-40 ht-40 bg-orange-transparent tx-orange rounded-circle align-items-center justify-content-center d-none d-sm-flex">
													<i class="fa fa-user wd-20 ht-20 text-center tx-20 "></i>
												</div>
												<div class="media-body mg-sm-l-15">
													<p class="tx-medium mg-b-3"><?= $key2['name']; ?></p>
													<p class="tx-11 mg-b-0 tx-gray-500">ID: <?= $key2['user_id']; ?></p>
												</div>
											</div>
											
											<div class="text-right ml-auto">
												<p class="mg-b-3  font-weight-semibold"><?= $key2['mobile']; ?></p>
												<p class="tx-11 mg-b-0  tx-gray-500"><span class="text-success"><?= $key2['email']; ?></span></p>
											</div>
										</li>
										<?php } ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-8 col-lg-12">
						<div class="row row-sm">
							
							<div class="col-lg-12">
								<div class="card overflow-hidden recent-operations-card hts-520">
							<div class="card-body p-0">
								<div class="p-3 pb-0">
									<div class="d-flex justify-content-between">
										<h4 class="card-title mg-b-10">Video Analysis</h4>
										<i class="mdi mdi-dots-horizontal text-gray"></i>
									</div>
									<p class="tx-12 tx-gray-500 mb-0">Video Watch time with User Details <a href=""></a></p>
								</div>
								<div class="transcation-scrolls">
									<table class="table table-bordered" id="example2">
									<thead>
										<tr>
											<th>Video Title</th>
											<th class="bg-primary text-white">Course Name</th>
											<th class="bg-warning text-white">Level</th>
											<th class="bg-danger text-white">Watch Time</th>
											<th class="bg-primary text-white">Details</th>
										</tr>
									</thead>
									<tbody>
										
										<?php if(!empty($data['allData'])){ ?>
											<?php $s =1; foreach ($data['allData'] as $key) { ?>
												<tr>
													<td><?= @$key['videoTitle']; ?></td>
													<td><b><?= @$key['course_name']; ?></b>
													</td>
													<td><?= @$key['chapName']; ?></td>
													<td><?= @$key['watch_time']; ?></td>
													<td><a id="vid_<?= @$key['vid_id']; ?>" href="#" data-target="#modaldemo3" data-toggle="modal" class="modl">View Details</a></td>
												</tr>
											<?php } ?>
									    <?php } ?>
									</tbody>
								</table>
								</div>
							</div>
						</div>
							</div>
							<!--Col-12 end-->
							
							<!--Col-12 end-->
						</div>
					</div>
				</div>
				
				<!-- row closed -->
			</div>
			<!-- Container closed -->
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
		</div>
		<?php include("inc/rightmenu.php"); ?>
		<?php include("inc/footer.php"); ?>
		<?php include("inc/dash_js.php"); ?>
		<script type="text/javascript">
			$(".modl").click(function(){
				var ids = this.id;
				var spl = ids.split("_");
				var id = spl[1];
				$.post("<?= base_url('admin_panel/VideoAnalytics/getDetails'); ?>",
							{
								vid_id: id
							},
							function(response,status)
							{
								$("#bd").html(response);
							}
					)
			})
		</script>
	</body>
</html>