<?php $aws_server = $this->SiteModel->aws_server(); ?>
<!doctype html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
		<?php include("inc/form_layout.php"); ?>
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
							<a href="<?= base_url('admin_panel/'); ?>">
								<i class="mdi mdi-home text-muted hover-cursor"></i>
						    </a>
						    <a href="<?= base_url('admin_panel/AllCourses'); ?>">
								<p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;All Course&nbsp;/&nbsp;</p>
							</a>
							<a href="<?= base_url('admin_panel/ChapterContent/index/'.$this->uri->segment(4)); ?>">
								<p class="text-muted mb-0 hover-cursor">Chapter Content&nbsp;/&nbsp;</p>
						    </a>
							<p class="text-primary mb-0 hover-cursor">Add Content - <?= urldecode($this->uri->segment(5)); ?></p>

						</div>
					</div>
					
				</div>
				<!-- breadcrumb -->

				<!-- row -->
				<div class="row justify-content-center">
					<div class="col-md-6">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Upload Video - <?= urldecode($this->uri->segment(5)); ?></h3>
							</div>
							<div class="card-body">
								<?php if($this->uri->segment(3)=="addContent"){ ?>
								<form action="<?= base_url('admin_panel/ChapterContent/addFirstStep'); ?>" method="post">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Title</label>
												<input type="text" name="title" class="form-control" required="required">
											</div>
											<div class="form-group">
												<label>Description</label>
												<textarea name="desc" class="form-control" required="required"></textarea>
											</div>
											
											<input type="hidden" name="vidId" value="<?= mt_rand(00000000,99999999); ?>">
											<input type="hidden" name="chapId" value="<?= $this->uri->segment(4); ?>">
											<div class="form-group text-right">
												<button class="btn btn-primary">Next</button>
											</div>
										</div>
									</div>
								</form>
								<?php } ?>
								<?php if($this->uri->segment(3)=="stepNext"){ ?>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Upload Video Type</label><br>
												
												<input type="radio" name="video_type" required="required" value="file"> <label>Upload Video File</label>
												
												<input type="radio" name="video_type" required="required" value="link"  checked="checked"> <label>Upload Video Link</label>
											</div>
										</div>
									</div>
								<div id="uploadFile">
								<form action="<?= base_url('admin_panel/ChapterContent/addNextStep'); ?>" method="post" enctype="multipart/form-data">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group"> 
												<label>Thumbnail Image</label>
												<input type="file" name="thumbs" class="dropify" data-height="200" />
											</div>
											<div id="ifrm" class="form-group">
												<iframe src="<?= $aws_server['serverUrl']; ?>" style="border: none; width: 100%" ></iframe>
											</div>
											<div id="fileNamesd">
											<div class="form-group vidupl">
												<label>Paste Video File Name</label><br>
												
												<input type="text" id="vidFiles" name="vidfile"  required="required" class="form-control" />
											</div>
											<div class="vidDone">
												<i class="fas fa-file-video text-warning"></i>
												<i class="fas fa-check text-success"></i>
											</div>
											<input type="hidden" name="vidId" value="<?= $this->uri->segment(4); ?>">
											<div class="form-group text-right">
												<button class="btn btn-primary">Next</button>
											</div>
										</div>
									</div>
									</div>
								</form>
							    </div>
							    <div id="uploadLink">
							    	<form action="<?= base_url('admin_panel/ChapterContent/uplLink'); ?>" method="post" enctype="multipart/form-data">
							    		<div class="form-group">
												<label>Thumbnail Image</label>
												<input type="file" name="thumbs" class="dropify" data-height="200" />
											</div>

							    	<div class="form-group">
										<label>Video Link</label>
										<input type="text" name="video_link" class="form-control" placeholder="Youtube video ID"  />
									</div>
									<input type="hidden" name="id" value="<?= $this->uri->segment(4); ?>">
									<div class="form-group text-right">
										<button class="btn btn-primary">Next</button>
									</div>
									</form>
							    </div>
								<?php } ?>
								<?php if($this->uri->segment(3)=="addpreview"){ ?>
									<h5>Upload Preview Video - <?= urldecode($this->uri->segment(5)); ?></h5>
									<div class="form-group">
												<label>Upload Video Type</label><br>
												
												<input type="radio" name="preview_type" required="required" value="file"> <label>Upload Video File</label>
												
												<input type="radio" name="preview_type" required="required" value="link"> <label>Upload Video Link</label>
											</div>
							<div id="pewviewLink">
								<form action="<?= base_url('admin_panel/ChapterContent/uplLinkPreview'); ?>" method="post" enctype="multipart/form-data">
							    		<div class="form-group">
												<label>Thumbnail Image</label>
												<input type="file" name="thumbs" class="dropify" data-height="200" />
											</div>
							    	<div class="form-group">
										<label>Video Link</label>
										<input type="text" name="preview_link" class="form-control" placeholder="Youtube video ID"  />
									</div>
									<input type="hidden" name="id" value="<?= $this->uri->segment(4); ?>">
									<div class="form-group text-right">
										<button class="btn btn-primary">Next</button>
									</div>
									</form>
							</div>
							<div id="previewFile">
								<form action="<?= base_url('admin_panel/ChapterContent/uplPreview'); ?>" method="post" enctype="multipart/form-data">
									<div class="row">
										<div class="col-md-12">
											
											<div class="form-group">
												<label>Thumbnail Image</label>
												<input type="file" name="thumbs" class="dropify" data-height="200" />
											</div>
											<div id="ifrm" class="form-group">
												<iframe src="<?= $aws_server['serverUrl']; ?>" style="border: none; width: 100%" ></iframe>
											</div>
											<div class="form-group vidupl">
												<label>Paste Video File Name Here</label><br>
												
												<input type="text" id="vidFile" name="vidfile"  required="required" class="form-control" />
											</div>
											<div class="vidDone">
												<i class="fas fa-file-video text-warning"></i>
												<i class="fas fa-check text-success"></i>
											</div>
											<input type="hidden" name="id" value="<?= $this->uri->segment(4); ?>">
											<div class="form-group text-right">
												<button class="btn btn-primary">Save</button>
											</div>
										</div>
									</div>
								</form>
								<?php } ?>
							</div>
						</div>
						</div>
					</div>
				</div>
				<?php if($feed=$this->session->flashdata("Feed")){ ?>
					<div class="flashd"><?= $feed; ?></div>
				<?php } ?>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<?php include("inc/rightmenu.php"); ?>
		<?php include("inc/footer.php"); ?>
		<?php include("inc/form_js.php"); ?>
		<script type="text/javascript">
			$(document).ready(function(){
				$("#uploadLink").show();
				$("#previewFile").hide();
				$("#pewviewLink").hide();
				$("#uploadFile").hide();
				$("#fileNames").hide();

				$(".flashd").fadeOut(5000);
				$("#vidFile").change(function(){
					$(".vidupl").hide();
					$(".vidDone").show();
					
					
				});
				$("input[name='video_type']").click(function(){
					var vidType = $("input[name='video_type']:checked").val();
					if(vidType =="file")
					{
						$("#uploadFile").show();
						$("#uploadLink").hide();
					}
					else
					{
						$("#uploadFile").hide();
						$("#uploadLink").show();
					}
				})

				$("input[name='preview_type']").click(function(){
					var vidType = $("input[name='preview_type']:checked").val();
					if(vidType =="file")
					{
						$("#previewFile").show();
						$("#pewviewLink").hide();
					}
					else
					{
						$("#previewFile").hide();
						$("#pewviewLink").show();
					}
				})
				
			});
		</script>
	</body>
</html>