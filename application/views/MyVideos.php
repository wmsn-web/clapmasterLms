<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!doctype html>
<html lang="en">
  	<head>
    	<title>MY Cart - Clap Master</title>
    	<?php include('inc/layout.php'); ?> 
	</head>
	<body>
		<div class="wrapers">
			<?php include('inc/menu.php'); ?> 
            
			<section class="hero_area themeColor">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="text-white">
                            My Courses
                        </h3>
                        
                    </div>
                </div>
                <ul id="nav">
                    <li <?php if($this->uri->segment(2)==""){ echo "class='active'"; }else{ echo "class=''";} ?>>
                        <a href="<?= base_url('MyCourses'); ?>">Single Videos</a>
                    </li>
                    <li <?php if($this->uri->segment(2)=="levelVideos"){ echo "class='active'"; }else{ echo "class=''";} ?>>
                        <a href="javascript:void(0)">Level Videos</a>
                        <ul>
                            <?php if(!empty($allData)){ ?>
                                <?php foreach ($allData['levelPlan'] as $key1) { ?>
                                    <li><a href="<?= base_url('MyCourses/levelVideos/'.$key1['planId']); ?>"><?= $key1['Title']; ?> (<?= $key1['course_name']; ?>)</a></li>
                                <?php } ?>
                            <?php } ?>
                        </ul>
                    </li>
                    <li <?php if($this->uri->segment(2)=="courseVideos"){ echo "class='active'"; }else{ echo "class=''";} ?>>
                        <a href="<?= base_url('MyCourses/index/levels'); ?>">Course Videos</a>
                        
                    </li>
                    
                </ul>
            </div>
           
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <?php if($this->uri->segment(2)==""){ ?>
                                <?php if(!empty($allData)){ ?>
                                    <?php foreach ($allData['basicPlan'] as $keys) { ?>
                                        <div class="col-md-3">
                                            <div class="singlecataGoryItem">
                                                <div class="catagoryImg2">
                                                    <img src="<?= base_url('uploads/videos/'.$keys['thumb']); ?>" alt="">
                                                </div>
                                                <a href="#" class="catagoryBtn"><?= $keys['Title']; ?> <span><i class="fas fa-chevron-right"></i></span></a>
                                                <span class="progressbars">
                                                    <span class="progresss"></span>
                                                </span>
                                                <span class="txt-11 color-drk">60% Completed</span>
                                                <span class="pl-15"><?= nbs(5); ?>
                                                    <span class="badge badge-warning">
                                                        4.5
                                                    </span>
                                                    <i class="fa fa-star  color-drk txt-11"></i>
                                                    <i class="fa fa-star  color-drk txt-11"></i>
                                                    <i class="fa fa-star  color-drk txt-11"></i>
                                                    <i class="fa fa-star  color-drk txt-11"></i>
                                                    <i class="fa fa-star  color-drk txt-11"></i>
                                                </span>
                                                    <a href="<?= base_url("PlayVideo/play/basic_plan/".$keys['vidId']); ?>" class="readMore">Play Video</a>
                                            </div>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            <?php } ?>
                            <?php if($this->uri->segment(2)=="levelVideos"){ ?>
                                <?php if(!empty($vidData)){ ?>
                                    <?php foreach ($vidData as $key) { ?>
                                        <div class="col-md-3">
                                            <div class="singlecataGoryItem">
                                                <div class="catagoryImg2">
                                                    <img src="<?= base_url('uploads/videos/'.$key['thumb']); ?>" alt="">
                                                </div>
                                                <a href="#" class="catagoryBtn"><?= $key['title']; ?> <span><i class="fas fa-chevron-right"></i></span></a>
                                                <span class="progressbars">
                                                    <span class="progresss"></span>
                                                </span>
                                                <span class="txt-11 color-drk">60% Completed</span>
                                                <span class="pl-15"><?= nbs(5); ?>
                                                    <span class="badge badge-warning">
                                                        4.5
                                                    </span>
                                                    <i class="fa fa-star  color-drk txt-11"></i>
                                                    <i class="fa fa-star  color-drk txt-11"></i>
                                                    <i class="fa fa-star  color-drk txt-11"></i>
                                                    <i class="fa fa-star  color-drk txt-11"></i>
                                                    <i class="fa fa-star  color-drk txt-11"></i>
                                                </span>
                                                    <a href="<?= base_url("PlayVideo/play/level_plan/".$key['vidId']); ?>" class="readMore">Play Video</a>
                                            </div>
                                        </div>
                                    <?php } ?>  
                                <?php } ?>
                            <?php } ?>
                            <?php if($this->uri->segment(2)=="courseVideos"){ ?>
                                <?php if(!empty($vidData)){ ?>
                                    <?php foreach ($vidData as $key) { ?>
                                        <div class="col-md-3">
                                            <div class="singlecataGoryItem">
                                                <div class="catagoryImg2">
                                                    <img src="<?= base_url('uploads/videos/'.$key['thumb']); ?>" alt="">
                                                </div>
                                                <a href="#" class="catagoryBtn"><?= $key['title']; ?> <span><i class="fas fa-chevron-right"></i></span></a>
                                                <span class="progressbars">
                                                    <span class="progresss"></span>
                                                </span>
                                                <span class="txt-11 color-drk">60% Completed</span>
                                                <span class="pl-15"><?= nbs(5); ?>
                                                    <span class="badge badge-warning">
                                                        4.5
                                                    </span>
                                                    <i class="fa fa-star  color-drk txt-11"></i>
                                                    <i class="fa fa-star  color-drk txt-11"></i>
                                                    <i class="fa fa-star  color-drk txt-11"></i>
                                                    <i class="fa fa-star  color-drk txt-11"></i>
                                                    <i class="fa fa-star  color-drk txt-11"></i>
                                                </span>
                                                    <a href="<?= base_url("PlayVideo/play/level_plan/".$key['vidId']); ?>" class="readMore">Play Video</a>
                                            </div>
                                        </div>
                                    <?php } ?>  
                                <?php } ?>
                            <?php } ?>
                            <?php if($this->uri->segment(3)=="levels"){ ?>
                                <div class="row">
                                <?php foreach ($allData['crsPlan'] as $keyplan) { ?>
                                    <div class="col-md-12">
                                        <h4><u><?= $keyplan['Title']; ?></u></h4>
                                        <div class="row">
                                            <?php foreach ($keyplan['levels'] as $keylvl) { ?>
                                                <?php if($keyplan['crsId'] == $keylvl['crsId']){
                                                    $disp = "style='display:block'";
                                                }
                                                else
                                                {
                                                    $disp = "style='display:none'";
                                                } ?>
                                                <div class="col-md-3" <?= $disp; ?>>
                                                    
                                                    <div class="singlecataGoryItem">
                                                        <div class="catagoryImg2">
                                                            <img src="<?= base_url('uploads/videos/'.$keylvl['thumb']); ?>" alt="">
                                                        </div>
                                                        <a href="<?= base_url('MyCourses/courseVideos/'.$keylvl['chapId']); ?>" class="catagoryBtn"><?= $keylvl['chapName']; ?> <span><i class="fas fa-chevron-right"></i></span></a>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                       </div>
                                    </div>
                               <?php } ?>
                               </div>
                            <?php } ?>
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
        
        </script>
        