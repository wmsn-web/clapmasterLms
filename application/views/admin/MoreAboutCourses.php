<!doctype html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
		<?php include("inc/form_layout.php"); ?>
		<title>More About Course- Admin Panel</title>
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
							<h4 class="content-title mb-0 my-auto">More About Course</h4>
						</div>
					</div>
					
				</div>
				<!-- breadcrumb -->

				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Select Course</h4>
								<?php if(!empty($data)){ ?>
									<?php foreach ($data as $key):
										if($this->uri->segment(5) == $key['crsId']):
											$class = "btn btn-primary"; else:
											$class = "btn btn-outline-primary"; endif;
									 ?>
										<a href="<?= base_url('admin_panel/MoreAboutCourses/index/edit/'.$key['crsId']); ?>">
											<button class="<?= $class; ?>"><?= $key['course_name']; ?></button>
										</a>
									<?php endforeach ?>
								<?php } ?>
							</div>
							<div class="card-body">
								<?php if($this->uri->segment(4)=="edit"): ?>
								<button id="wl" class="btn btn-danger">What you Will Learn</button>
								<button id="fq" class="btn btn-danger">FAQ</button>
								<button id="Incl" class="btn btn-danger">Course Included</button>
								<button id="imgg" class="btn btn-danger">Add Course Image</button>
								<button id="teas" class="btn btn-danger">Teaser Videos</button>
								<?= br(3); ?>
								<div id="wht">
									<h3>What you’ll learn?</h3>
									
										<form action="<?= base_url('admin_panel/MoreAboutCourses/setWht'); ?>" method="post">
											<div class="form-group">
												<textarea name="wht" id="editor_1"><?= $wht['what_learn']; ?></textarea>
											</div>
											<input type="hidden" name="crs_id" value="<?= $this->uri->segment(5); ?>">
											<div class="form-group">
												<button class="btn btn-primary">Save</button>
											</div>
										</form>
									
							    </div>
							    <div id="faq">
							    	<div class="row">
							    		<div class="col-md-6">
							    			<form action="<?= base_url('admin_panel/MoreAboutCourses/setFaq'); ?>" method="post">
							    				<h3>FAQ Setup</h3>
							    				<div class="form-group">
							    					<label>Question</label>
							    					<input type="text" name="qstn" class="form-control" placeholder="Question ?" required="required" />
							    				</div>
							    				<div class="form-group">
							    					<textarea name="answr" class="form-control" placeholder="Answer" required="required"></textarea>
							    				</div>
							    				<input type="hidden" name="crs_id" value="<?= $this->uri->segment(5); ?>">
							    				<div class="form-group">
													<button class="btn btn-primary">Save</button>
												</div>
							    			</form>
							    		</div>
							    		<div class="col-md-6 left-seperator">
							    			<h3>Frequently Asked Questions</h3>
							    			<div class="ht-380">
							    				<?php if(!empty($faq)){ ?>
							    					<?php foreach ($faq as $key): ?>
							    						<span class="qn"><?= $key['qstion']; ?></span>
									    				<span class="an">
									    					<a class="text-danger" href="<?= base_url('admin_panel/MoreAboutCourses/delFaq/'.$key['id']); ?>">
									    					<i class="fas fa-times cls"></i></a>
									    					<p><?= $key['answr']; ?></p>
									    				</span>
							    					<?php endforeach ?>
								    			<?php } ?>
							    			</div>
							    		</div>
							    	</div>
							    </div>
							    <div id="crsIncl">
							    	<form action="<?= base_url('admin_panel/MoreAboutCourses/incl'); ?>" method="post">
							    		<div class="form-group">
							    			<label>Course Included</label> (<small class="text-danger">Comma seperated Value. Eg. Example1, Example2, Example3</small>)
							    			<input type="text" name="crsIncl" class="form-control" required="required" value="<?= $incl['incldt']; ?>">
							    		</div>
							    		<input type="hidden" name="crs_id" value="<?= $this->uri->segment(5); ?>" >
							    		<div class="form-group">
							    			<button class="btn btn-primary">Save</button>
							    		</div>
							    	</form>
							    </div>
							    <div id="setImg">
							    	<div class="row justify-content-center">
							    		<div class="col-md-4">
							    			<form action="<?= base_url('admin_panel/MoreAboutCourses/setImg'); ?>" method="post" enctype="multipart/form-data">
								    		<div class="form-group">
												<label>Course Image</label>
												<input type="file" name="thumbs" class="dropify" data-height="200" data-default-file="<?= base_url('uploads/videos/'.$incl['crs_img']); ?>" />
											</div>
											<input type="hidden" name="crs_id" value="<?= $this->uri->segment(5); ?>" >
											<div class="form-group">
							    				<button class="btn btn-primary">Save</button>
							    			</div>
							    		</form>
										</div>
									</div>
							    </div>
							    <div id="teaserVid">
							    	<?php if(!empty($getTsr)): $formclas = "updt"; ?>
							    		<button id="showUpdt" class="btn btn-warning">Change Video</button>
							    		<div id="vidSec">
							    			<div class="row justify-content-center">
							    				<div class="col-md-6">
							    					<video controls="controls" width="100%">
							    						<source src="https://goibooking.in/uploads/videos/<?= $getTsr['vid_file']; ?>" type="">
							    					</video>
							    				</div>
							    			</div>
							    		</div>
							    	<?php else: $formclas = ""; ?>
							    	<?php endif; ?>
							    	<form class="<?= $formclas; ?>" action="<?= base_url('admin_panel/MoreAboutCourses/teaservid'); ?>" method="post" enctype="multipart/form-data">
							    	<div class="row">
							    		<div class="col-md-6">
							    			<div class="form-group">
												<label>Thumbnail Image</label>
												<input type="file" name="thumbs" class="dropify" data-height="200" />
											</div>
							    		</div>
							    		<div class="col-md-6">
							    			<div id="ifrm" class="form-group">
												<iframe src="https://goibooking.in/" style="border: none; width: 100%" ></iframe>
											</div>
											<div class="form-group vidupl">
												<label>Paste Video File Name Here</label><br>
												
												<input type="text" id="vidFile" name="vidfile"  required="required" class="form-control" placeholder="Paste Video Filename Here" />
											</div>
											<input type="hidden" name="crs_id" value="<?= $this->uri->segment(5); ?>" >
							    		</div>
							    		<div class="col-md-12">
							    			<button type="submit" class="btn btn-outline-primary">Save</button>
							    		</div>
							    	</div>
							    </form>
								
							    </div>
							    <?php endif; ?>
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
		<?php include("inc/form_js.php"); ?>
		<script type="text/javascript">
			$(document).ready(function(){
				$("#wht").hide();
				$("#faq").hide();
				$("#crsIncl").hide();
				$("#teaserVid").hide();
				$(".updt").hide();
				$("#wl").click(function(){
					$("#wht").show();
					$("#faq").hide();
					$("#crsIncl").hide();
					$("#setImg").hide();
					$("#teaserVid").hide();
				});
				$("#fq").click(function(){
					$("#wht").hide();
					$("#faq").show();
					$("#crsIncl").hide();
					$("#setImg").hide();
					$("#teaserVid").hide();
				});
				$("#Incl").click(function(){
					$("#wht").hide();
					$("#faq").hide();
					$("#crsIncl").show();
					$("#setImg").hide();
					$("#teaserVid").hide();
				});
				$("#imgg").click(function(){
					$("#wht").hide();
					$("#faq").hide();
					$("#crsIncl").hide();
					$("#setImg").show();
					$("#teaserVid").hide();
				});
				$("#teas").click(function(){
					$("#wht").hide();
					$("#faq").hide();
					$("#crsIncl").hide();
					$("#setImg").hide();
					$("#teaserVid").show();
				});

				$("#showUpdt").click(function(){
					$(".updt").toggle();
					$("#vidSec").toggle();
				});

			});
		</script>
		<script src="<?= base_url('ckeditor/ckeditor.js'); ?>"></script>
		<script>
CKEDITOR.replace('editor_1');
CKEDITOR.config.height="350px";

</script>
	</body>
</html>