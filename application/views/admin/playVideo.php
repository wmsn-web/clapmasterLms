<?php $aws_server = $this->SiteModel->aws_server(); ?>
<!doctype html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<?php include("inc/dash_layout.php"); ?>
		<title> Chapter Content - Admin Panel</title>
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
							<h4 class="content-title mb-0 my-auto">Chapter Content</h4>
						</div>
					</div>
					
				</div>
				<!-- breadcrumb -->

				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<?= $data['playTitle']; ?> 
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-md-8 seperator">
										<div class="playBox">
											<h3><?= $data['playTitle']; ?></h3>
											<?php if($data['video_type'] == "file"){ ?>
												<video preload="false" autoplay  muted controls="controls" width="100%">
													  <source
													    src="<?= $aws_server['serverUrl'].$aws_server['folders'].$data['playVid']; ?>"
													    type="video/mp4"
													  />
													</video>
													<b>Edit Video File Name</b><br>
												<input type="text" id="vid_name" value="<?= @$data['playVid']; ?>" class="b-brd"><i class="fas fa-pen"></i>
											<?php }else{  ?>
												<iframe width="100%" height="315"
												src="https://www.youtube.com/embed/<?= $data['video_link']; ?>?rel=0" allowfullscreen>
												</iframe>
											<?php } ?>
											<div class="descr">
												<p><?= html_entity_decode($data['playDescr']); ?></p>
												

											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="videoList">
											<h3>All Videos</h3>
											<?php if(!empty($data['allVideos'])){ ?>
												<?php foreach ($data['allVideos'] as $keyvid) {
												if($keyvid['disbl']=="disbl")
												{
													$opct = "style='opacity:0.35'";
													$lnks = "href='javascript:void(0)'";
												}
												else
												{
													$opct = "";
													$lnks = "href='".base_url('admin_panel/videoPlay/index/').$keyvid['vidId']."'";
												}

												 ?>
												
													
											<div <?= $opct; ?> class="vidList">
												<div class="row">
													<div style="background: url('<?= base_url('uploads/videos/'.$keyvid['thumb']); ?>'); background-position: center; background-size: cover;" class="vid-box">
														<i class="fas fa-play"></i>
													</div>
													<div class="vidText">
														<span class="cls">
															<a onclick="return confirm('Delete This Video ?');" class="text-danger" href="<?= base_url('admin_panel/ChapterContent/delVid/'.$keyvid['id'].'/'.$data['chapId']); ?>">
																<i class="fas fa-times"></i>
															</a>
															</span>
														<h5>
															<a  class="text-primary" <?= $lnks; ?>>
																<?= $keyvid['title']; ?>
															</a>
														</h5>
														<p><?= substr($keyvid['descr'],0,30); ?><br>
														<span><i class="fas fa-eye"></i> 50K <?= nbs(4); ?><i class="fas fa-thumbs-up"></i> 30K <?= nbs(4); ?><i class="fas fa-thumbs-down"></i> 30K</span>
															</p>
													</div>
												</div>
											</div>
											<?php } ?>
											<?php } ?>
											
											
											
											
										</div><!--List End-->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php if($feed = $this->session->flashdata("Feed")){ ?>
					<div class="flashd"><?= $feed; ?></div>
				<?php } ?>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<?php include("inc/rightmenu.php"); ?>
		<?php include("inc/footer.php"); ?>
		<?php include("inc/dash_js.php"); ?>
		<script type="text/javascript">
			$(document).ready(function(){
				$(".flashd").fadeOut(5000);

				$("#vid_name").blur(function(){
					var vid_name = $("#vid_name").val();
					var vid_id = "<?= $this->uri->segment(4); ?>";
					$.post("<?= base_url('admin_panel/ChapterContent/EditVidFile'); ?>",
					{
						vid_id: vid_id,
						vid_name: vid_name
					},
					function(response,status)
					{
						alert(response);
					}
					)
					
				})
			});
		</script>
	</body>
</html>