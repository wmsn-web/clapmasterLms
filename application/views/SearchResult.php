<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!doctype html>
<html lang="en">
  	<head>
    	<title>About Us - Clap Master</title>
    	<?php include('inc/layout.php'); ?> 
        <link href="<?= base_url('assets/videojs/video.js/video-js.css'); ?>" rel="stylesheet">
  <link href="<?= base_url('assets/videojs/videojs.watermark.css'); ?>" rel="stylesheet">
  <script src="<?= base_url('assets/videojs/video.js/video.js'); ?>"></script>
        <script src="?= base_url('assets/videojs/src/videojs.watermark.js"></script>
	</head>
	<body>
		<div class="wrapers">
			<?php include('inc/menu.php'); ?> 
			<section class="hero_area themeColor">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <h2 class="text-white"><?= $data['crsName']; ?> - <?= $data['chap_name']; ?>(Preview Video)</h2>
                        <?php if($data['preview_type']=="files"){ ?>
                            <video   id="video_1" class="vidframe video-js vjs-default-skin" width='740' height='285' controls="" autoplay="on" poster="<?= base_url('uploads/videos/'.$data['thumb']); ?>">
                                <source src="<?= base_url('uploads/videos/'.$data['preview']); ?>" type="video/mp4">
                            </video>
                        <?php }else{ ?>
                            <iframe width="100%" height="315"
                        src="https://www.youtube.com/embed/$data['preview_link']; ?>/?rel=0">
                        </iframe>
                        <?php } ?>
                        <br><br><br>
                        <h5 class="text-white"><?= $data['title']; ?></h5>
                        <p class="text-white"><?= $data['descr']; ?></p>
                        <?php if($this->session->userdata('ClientId')){ ?>
                            <a href="<?= base_url('SearchResult/adcart/'.$this->uri->segment(3).'/'.$data['price'].'/'.$data['crsName'].'/'.$data['chap_name']); ?>">
                        <button class="btn btn-light">&#8377; <?= number_format($data['price'],2); ?>/- Buy Now</button></a>
                    <?php } else{ ?>
                        <button data-toggle="modal" data-target="#signsIn" class="btn btn-light">&#8377; <?= number_format($data['price'],2); ?>/- Buy Now</button>
                    <?php } ?>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <span><a href="<?= base_url('MyCourses'); ?>"><i class="fa fa-arrow-left"></i> See Full Course</a></span><br><br><br>
                                <h5 class="text-dark">Related Videos</h5>
                                <div class="side-player">
                                    <?php if(!empty($data['simData'])){ ?>
                                    <?php foreach($data['simData'] as $key){
                                        $link = base_url('SearchResult/index/'.$key['vid_id']);
                                     ?>
                                        <div  class="row similrFrame" onclick="location.href='<?= $link; ?>'">

                                            <div class="col-4">
                                                <div style="background: url('<?= base_url('uploads/videos/'.$key['thumb']); ?>'); background-size: cover;" class="vidbox">
                                                    <span><i class="fa fa-play playHome2"></i></span>
                                                </div>
                                            </div>
                                            <div class="col-8">
                                                
                                                <span class="title"><?= $key['title']; ?></span>
                                                <p><?= $key['descr']; ?></p>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
		<?php include('inc/footer.php'); ?>
		</div>
		<?php include('inc/modal.php'); ?>
		<?php include('inc/js.php'); ?>
        <script type="text/javascript">
            $(document).ready(function(){
                $("#alrt").fadeOut(5000);
            });
        var my_video_id = videojs('video_1');
        $('#video_1').bind('contextmenu',function() { return false; });
// Set value to the plugin
my_video_id.watermark({
  file: 'smlogo.png',
  xpos: 0,
  ypos: 0,
  xrepeat: 0,
  opacity: 1
  });

    var vid = document.getElementById("video_1"); 
function playVid() { 
vid.play(); 
window.setTimeout(pauseVid, 3000); 
}
function play()
{ vid.play(); } 
function pauseVid() 
{ 
vid.pause();
window.setTimeout(play, 5000);
}
        </script>
        