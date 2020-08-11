<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!doctype html>
<html lang="en">
  	<head>
    	<title>MY Cart - Clap Master</title>
    	<?php include('inc/layout.php'); ?> 
        <style type="text/css">
            /*-- rating--*/
.rating-stars {
  width: 100%;
  text-align: center; }
  .rating-stars .rating-stars-container {
    font-size: 0px; }
    .rating-stars .rating-stars-container .rating-star {
      display: inline-block;
      font-size: 30px;
      cursor: pointer;
      padding: 4px 8px;
      color: #edecf3; }
      .rating-stars .rating-stars-container .rating-star.is--active .fa-heart, .rating-stars .rating-stars-container .rating-star.is--hover .fa-heart {
        color: #fb0d00; }
      .rating-stars .rating-stars-container .rating-star.sm {
        display: inline-block;
        font-size: 14px;
        color: #eaedf1;
        cursor: pointer;
        padding: 5px; }
      .rating-stars .rating-stars-container .rating-star.is--active, .rating-stars .rating-stars-container .rating-star.is--hover {
        color: #f1c40f; }
      .rating-stars .rating-stars-container .rating-star.is--no-hover, .rating-stars .rating-stars-container .rating-star .fa-heart .is--no-hover {
        color: #f1f1f9; }
      .rating-stars .rating-stars-container .rating-star.is--active, .rating-stars .rating-stars-container .rating-star.is--hover {
        color: #f1c40f; }
        </style>
        <link href="<?= base_url('assets/videojs/video.js/video-js.css'); ?>" rel="stylesheet">
  <link href="<?= base_url('assets/videojs/videojs.watermark.css'); ?>" rel="stylesheet">
  <script src="<?= base_url('assets/videojs/video.js/video.js'); ?>"></script>
        <script src="?= base_url('assets/videojs/src/videojs.watermark.js"></script>
	</head>
	<body>
		<div class="wrapers">
			<?php include('inc/menu.php'); ?> 
            
			<section class="hero_area themeColor">
            <div class="container-fluidx">
                <div class="row">
                    <div class="col-md-8">
                        <h5><?= $mnVid['title']; ?></h5>
                        <?php if($mnVid['video_type']=="file"){ ?>
                        <video  id="video_1" class="vidframe video-js vjs-default-skin" width='740' height='285' poster="<?= base_url('uploads/videos/'.$mnVid['thumb']); ?>" controls controlsList="nodownload">
                            <source src="<?= base_url('uploads/videos/'.$mnVid['video_file']); ?>"  type="video/mp4">
                            Your browser does not support HTML video.
                        </video>
                    <?php }else{ ?>
                        <iframe width="100%" height="315"
                        src="https://www.youtube.com/embed/<?= $mnVid['video_link']; ?>/?rel=0">
                        </iframe>
                    <?php } ?>

                        <div class="card">
                            <div class="card-body">
                                <ul class="likebox">
                                    <li><i <?= $mnVid['likebtn']; ?> id="thu" class="fa fa-thumbs-up"> <?= $mnVid['likes']; ?></i> </li>
                                    <li><i <?= $mnVid['disbtn']; ?> id="thd" class="fa fa-thumbs-down"> <?= $mnVid['dislikes']; ?></i></li>
                                    <li><i id="cmnt" class="fa fa-comments"> <?= $mnVid['totComments']; ?></i> </li>
                                </ul>
                                <?= $mnVid['msg']; ?>
                                <h4>Description</h4>
                                <p><?= $mnVid['descr']; ?></p>
                                <br><p>&nbsp;</p>
                                <div id="adcmnt">
                                    <h5 class="text-dark">Add Your Reviews</h5>
                                    <div class="rating-stars block" id="rating">
                                    <input type="hidden" readonly="readonly" class="rating-value" name="rating-stars-value" id="rating-stars-value" value="1">
                                    <div class="rating-stars-container">
                                        <div class="rating-star">
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="rating-star">
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="rating-star">
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="rating-star">
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="rating-star">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="pro-pics">S</div>
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <textarea id="textCom" class="form-control" placeholder="Add Comment"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <button id="setCom" class="btn btn-warning">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="comment-box">
                                    <?php if(!empty($comData)){ ?>
                                        <?php foreach($comData as $coment){ ?>
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <div class="pro-pic">
                                                        <?= $coment['title']; ?>
                                                    </div>
                                                </div>
                                                <div class="col-sm-10">
                                                    <div class="comments-text">
                                                        <h3><?= $coment['name']; ?> - <small>User</small>
                                                            <br><?php include("inc/rates.php"); ?>
                                                        </h3>

                                                        <p><?= $coment['comments']; ?><br>
                                                            <small><?= $coment['date']; ?></small>
                                                        </p>
                                                    </div>
                                                    <?php if(!empty($coment['replyData'])){ ?>
                                                    <hr>
                                                    <?php foreach($coment['replyData'] as $repData){ ?>
                                                    <div class="reply">
                                                        <span class="small-pic">A</span>
                                                        <span>Administrator - <small>Master Clap </small></span>
                                                        <p><?= $repData['comments']; ?></p>
                                                    </div>
                                                <?php } ?>
                                                <?php } ?>
                                                </div>
                                            </div>
                                            <hr>
                                        <?php } ?>
                                    <?php } ?>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <h5>All Videos</h5>
                        <div class="card">
                            <div class="card-body">
                                <span><a href="<?= base_url('MyCourses'); ?>"><i class="fa fa-arrow-left"></i> Back to My Course</a></span>
                                <div class="side-player">
                                    <?php if(!empty($similrData)){ ?>
                                    <?php foreach($similrData as $key){
                                        
                                     ?>
                                        <div <?= $key['style']; ?>  class="row similrFrame" onclick="<?= $key['link']; ?>">

                                            <div class="col-4">
                                                <div style="background: url('<?= base_url('uploads/videos/'.$key['thumb']); ?>'); background-size: cover;" class="vidbox">
                                                    <span><i class="fa fa-play"></i></span>
                                                </div>
                                            </div>
                                            <div class="col-8">
                                                <?= $key['msg']; ?><br>
                                                <span class="title"><?= $key['title']; ?></span>
                                                <p><?= substr($key['descr'],0,50); ?></p>
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
                // ______________ RATING STAR
    var ratingOptions = {
        selectors: {
            starsSelector: '.rating-stars',
            starSelector: '.rating-star',
            starActiveClass: 'is--active',
            starHoverClass: 'is--hover',
            starNoHoverClass: 'is--no-hover',
            targetFormElementSelector: '.rating-value'
        }
    };
    $(".rating-stars").ratingStars(ratingOptions); 
                setTimeout(function(){ 
                    var vidId = "<?= $this->uri->segment(4); ?>";
                    $.post("<?= base_url('PlayVideo/viewers'); ?>",
                    {
                        vid_id: vidId
                    },
                    function(response,status)
                    {
                        //alert(response);
                    }
                    )
                    
                }, 30000);
              $("#thu").click(function(){
                var thu = $("#thu").html();
                var newthu = parseInt(thu)+1;
                var vid_id = "<?= $this->uri->segment(4); ?>";
                $.post("<?= base_url('PlayVideo/likes'); ?>",
                {
                    vid_id: vid_id
                },
                function(response,status)
                {
                    if(response=="done")
                    {
                        $("#thu").css("color","#8501DA");
                        $("#thd").css("color","#B4B4B4");
                        $.post("<?= base_url('PlayVideo/getLikes'); ?>",
                            {
                    vid_id: vid_id
                },
                function(response,status){
                    var obj = JSON.parse(response);
                    $("#thu").html(" "+obj.likes);
                    $("#thd").html(" "+obj.dislikes);
                    $("#cmnt").html(" "+obj.totComments);
                })
                    }
                }
                )
                
              });
              $("#thd").click(function(){
                var vid_id = "<?= $this->uri->segment(4); ?>";
                $.post("<?= base_url('PlayVideo/setDisLikes'); ?>",
                            {
                    vid_id: vid_id
                },
                function(response,status)
                {
                    if(response=="done")
                    {
                        $("#thd").css("color","#8501DA");
                        $("#thu").css("color","#B4B4B4");
                        $.post("<?= base_url('PlayVideo/getLikes'); ?>",
                            {
                    vid_id: vid_id
                },
                function(response,status){
                    var obj = JSON.parse(response);
                    $("#thu").html(" "+obj.likes);
                    $("#thd").html(" "+obj.dislikes);
                    $("#cmnt").html(" "+obj.totComments);
                })
                    }
                }
                )
              });
              $("#setCom").click(function(){
                var textCom = $("#textCom").val();
                var vid_id = "<?= $this->uri->segment(4); ?>";
                var rates = $("#rating-stars-value").val();
                if(textCom == "")
                {
                    return false;
                }
                $.post("<?= base_url('PlayVideo/postComments'); ?>",
                {
                    vid_id: vid_id,
                    textCom: textCom,
                    rates: rates
                },
                function(response,status)
                {
                    if(response == "done")
                    {
                        $("#textCom").val("");
                    }
                }
                )
              });
            });

 function analysFunction(){
    // do whatever you like here
            var vid_id = "<?= $this->uri->segment(4); ?>";
           $.post("<?= base_url('PlayVideo/updAnalysis'); ?>",
                {
                    sec :1,
                    vid_id:vid_id
                },
                function (response,status)
                {
                    //alert(response);
                }
            )
    setTimeout(analysFunction, 1000);
}

analysFunction();


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


      

        </script>
        