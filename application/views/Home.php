<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!doctype html>
<html lang="en">
  	<head>
    	<title>Home - Master Clap</title>
    	<?php include('inc/layout.php'); ?> 
	</head>
	<body>
		<div class="wrapers">
			<?php include('inc/menu.php'); ?>
		<section class="topArea">	
            <div class="banar-area">
                <div class="container">
                    <div class="banar-content">
                        <div class="row">
                            <div class="col-lg-8 col-md-12">
                                <div class="banar-left">
                                    <div class="banarImg">
                                        <img src="<?= base_url(); ?>assets/img/banarImg.png" alt="">
                                    </div>
                                    <div class="catagoryList">
                                        <div id="owl-example" class="owl-carousel">
                                            <?php if(!empty($getCourse)){ ?>
                                            <?php foreach ($getCourse as $key) {
                                                if(strlen($key['course_name']) >10)
                                                {
                                                    $course_name = "<b style='font-size:10px'>".$key['course_name']."</b>";
                                                }
                                                else
                                                {
                                                    $course_name = "<b style='font-size:12px'>".$key['course_name']."</b>";
                                                }
                                             ?> 
                                            <div class="singlecataGoryItem" id="<?= $key['crsId']; ?>">
                                                <div class="catagoryImg" style="background: url('<?= base_url('uploads/videos/'.$key['crsImg']); ?>'); background-size: cover; height: 105px; text-align: center;">
                                                    <div class="vdbbx">
                                                        <i class="fas fa-play playHome"></i>
                                                    </div>
                                                </div>
                                                <a href="<?= base_url("Course/viewCourse/".$key['crsId']); ?>" class="catagoryBtn"><?= $course_name; ?> <span><i class="fas fa-chevron-right"></i></span></a>
                                                <div class="btm-desc">
                                                    <p><?= substr($key['descr'],0,20); ?></p>
                                                </div>
                                                <a href="<?= base_url("Course/viewCourse/".$key['crsId']); ?>" class="readMore">Read More</a>
                                            </div>
                                            <?php } ?>
                                            <?php } ?> 
                                        </div> <!-- /.row -->
                                    </div> <!-- /.catagoryList -->
                                </div> <!-- /.banar-left -->
                            </div> <!-- /.col-lg-8 col-md-12 -->
                            <div class="col-lg-4 col-md12">
                                <div class="banarSearch">
                                    <form action="#" class="banarSearchForm">
                                        <input id="ssrcc" type="search" placeholder="Search for course" autocomplete="off">
                                        <button type="submit"><i class="fas fa-search"></i></button>
                                    </form>
                                    <div id="src-res" class="search-result">
                                    </div>
                                    <div class="searchSliderImg owl-carousel">
                                        <div class="sliderImg">
                                            <img src="<?= base_url(); ?>assets/img/slider/11.png" alt="">
                                        </div>
                                        <div class="sliderImg">
                                            <img src="<?= base_url(); ?>assets/img/slider/22.png" alt="">
                                        </div>
                                        <div class="sliderImg">
                                            <img src="<?= base_url(); ?>assets/img/slider/33.png" alt="">
                                        </div>
                                        <div class="sliderImg">
                                            <img src="<?= base_url(); ?>assets/img/slider/44.png" alt="">
                                        </div>
                                        <div class="sliderImg">
                                            <img src="<?= base_url(); ?>assets/img/slider/55.png" alt="">
                                        </div>
                                    </div> <!-- /.searchSliderImg -->
                                </div>
                            </div> <!-- /.col-lg-4 col-md12 -->
                        </div> <!-- /.row -->
                    </div> <!-- /.banar-content -->
                </div> <!-- /.container -->
            </div> <!-- /.banar-area -->
             <!-- /.aboutContents -->
        </section>
        <section class="profileSliderArea">
            <div class="container">
                <div class="profileSlider owl-carousel">
                    <div class="profileSliderItem">
                        <div class="profileImg">
                            <img src="<?= base_url(); ?>assets/img/profileimg-1.png" alt="">
                        </div>
                        <div class="testim">
                            <h3 class="proName">Mr. Rohan mehran</h3>
                            <p>I just wanted to say that your acting course has made a world of difference in my professional life.  Since taking it, I'm getting called back so much more and I'm booking a ton -- in fact, my first commercial as a lead will start airing soon.  I look at myself a year ago and I can't believe how far your class has helped me come. Thank you so much!     </p>
                            <div class="prRating">
                                <span class="view"><i class="fas fa-eye"></i> 15</span>
                                <span class="like"><i class="fas fa-comments"></i>14</span>
                                <ul class="rationg">
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                       
                    </div> <!-- /.profileSliderItem -->
                    <div class="profileSliderItem">
                        <div class="profileImg">
                            <img src="<?= base_url(); ?>assets/img/profileimg-2.png" alt="">
                        </div>
                        <div class="testim">
                            <h3 class="proName">Mr. Ahmend khan</h3>
                            <p>I just finished the DJ course and am so happy with all the "gems" I took away. Never too seasoned to learn more!!!!! GREAT COURSE. </p>
                            <div class="prRating">
                                <span class="view"><i class="fas fa-eye"></i> 15</span>
                                <span class="like"><i class="fas fa-comments"></i>14</span>
                                <ul class="rationg">
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                        
                    </div> <!-- /.profileSliderItem -->
                    <div class="profileSliderItem">
                        <div class="profileImg">
                            <img src="<?= base_url(); ?>assets/img/profileimg-3.png" alt="">
                        </div>
                        <div class="testim">
                            <h3 class="proName">Mr.Pulkit Yadav</h3>
                            <p>“THANK YOU so much for your beautiful energy, support, creativity, guidance, talent and directing skills, not only in the 2 classes I've had the privilege of taking with you, but in life in general. Your unconditional support and desire for everyone to succeed is so inspiring not only to receive but to witness. You truly are a gift on both sides of the camera and I really cannot thank you enough for all that you do. This last class was beyond all expectations and I look forward to taking more with you in the future! I have recommended you to all that I know and reviewed you on all platforms and have meant every word I have said. You really take care of us actors and your expertise and experience and overall heart shine through in all that you do.” –</p>
                            <div class="prRating">
                                <span class="view"><i class="fas fa-eye"></i> 15</span>
                                <span class="like"><i class="fas fa-comments"></i>14</span>
                                <ul class="rationg">
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                        
                    </div> <!-- /.profileSliderItem -->
                    <div class="profileSliderItem">
                        <div class="profileImg">
                            <img src="<?= base_url(); ?>assets/img/profileimg-4.png" alt="">
                        </div>
                        <div class="testim">
                            <h3 class="proName">Mr. Ruhaan shaikh</h3>
                            <p>Love your energy and  positive approach to helping singing breakdown commercial copy.  . This last class was beyond all expectations and I look forward to taking more with you in the future!Will be back for the ongoing workout, soon!!!     </p>
                            <div class="prRating">
                                <span class="view"><i class="fas fa-eye"></i> 15</span>
                                <span class="like"><i class="fas fa-comments"></i>14</span>
                                <ul class="rationg">
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                        
                    </div> <!-- /.profileSliderItem -->
                     <!-- /.profileSliderItem -->
                     
                </div> <!-- /.profileSlider -->
            </div> <!-- /.container -->
        </section>
        <section class="howWorkArea">
            <div class="container">
                <h1 class="workTitle">How It Works ?</h1>
                <div class="work-ProcesBox">
                    <div class="row">
                        <div class="col-md-6 order-1 order-md-0">
                            <?= br(2); ?>
                            <div class="workimg">
                                <iframe width="100%" height="315" src="https://www.youtube.com/embed/7dFwZMoI8iQ?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope;" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="workContentff">
                                <h4>Easily find quality matches</h4>
                                <p>Its simple and easy to access our online course. Learn from the best anytime, anywhere from the mobile, desktop and raise your skills in singing,dj,acting and many more.This guide is all about passion. Your passion for your course, and for your future career. Because the secret to happiness is being able to love whatever it is you do in life.Kindly, go along with following steps:</p>

                                <div class="timeline">
                                  <div class="cont left">
                                    <div class="contents">
                                      Please select or choose a course
                                    </div>
                                  </div>
                                  <div class="cont right">
                                    <div class="contents">
                                      Add it in your cart
                                    </div>
                                  </div>
                                  <div class="cont left">
                                    <div class="contents">
                                      Login into account.
                                    </div>
                                  </div>
                                  <div class="cont right">
                                    <div class="contents">
                                      Make the payment
                                    </div>
                                  </div>
                                  <div class="cont left">
                                    <div class="contents">
                                      View in my course
                                    </div>
                                  </div>
                                  <div class="cont right">
                                    <div class="contents">
                                      Finalize the course
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- /.row -->
                </div> <!-- /.work-ProcesBox -->
                 <!-- /.work-ProcesBox -->
                 <!-- /.work-ProcesBox -->
            </div> <!-- /.container -->
        </section>
        <section class="informationTab">
            <div class="inofTab">
                <div class="container">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Career</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link  active" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">About us</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact us</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact-2" role="tab" aria-controls="pills-contact-2" aria-selected="false">Help & Support </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact-3" role="tab" aria-controls="pills-contact-3" aria-selected="false">Terms & Condition</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact-4" role="tab" aria-controls="pills-contact-4" aria-selected="false">Privacy Policy</a>
                      </li>
                    </ul>
                </div>
            </div> <!-- /.inofTab -->
            <div class="infoContainer">
                <div class="container">
                    <div class="">
                        <div class="tab-content" id="pills-tabContent">
                          <div class="tab-pane fade show" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="bx-full bx-brd">
                                <div class="bx-white">
                                    <h3>Career</h3>
                                    <p>
                                        MasterClap is transforming online education by enabling anyone in the world to learn from the very best. Our trainers include best minds who are passionate about their art and want to share their knowledge. We are unravelling what makes an actor able to cry on demand, how a singer able to bring soul to music , and what it takes to snap a best view. Our online learning content is available to students anywhere anytime, which supports our mission to ignite the greatness in others. We will provide you with a Certificate.
                                    </p>
                                    <div class="bx-content">
                                        <form action="<?= base_url('Home/sendQuery'); ?>" method="post" class="border-form shaddow-form" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h4>Introduce yourself</h4>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Full Name</label>
                                                        <input type="text" name="name" class="form-control" required="required">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email Address</label>
                                                        <input type="text" name="email" class="form-control" required="required">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Mobile Number</label>
                                                        <input type="text" name="mobile" class="form-control" required="required">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Upload Resume</label>
                                                        <input type="file" name="cvfile" class="form-control-file" accept=
"application/pdf,application/msword,
  application/vnd.openxmlformats-officedocument.wordprocessingml.document, image/*" required="required">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Something About You</label>
                                                        <textarea name="mssg" class="form-control" required="required" placeholder="Write Something About You"></textarea>
                                                        <br>
                                                        <button class="btn btn-primary">Send</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                             </div>
                          </div>
                          <div class="tab-pane fade show  active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="bx-full bx-brd">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="aboutcontent">
                                                <h2 class="aboutTitle">ABOUT US <span>MASTER CLAP </span></h2>
                                                <p>We are a Delhi based company that wants to create a platform for students across India to follow their passion by learning directly from Elite. Our team shares love of learning and creating opportunity for passionate individuals.
                MasterClap shoots the courses directly with the trainers so they can teach their exact techniques, exercises, practical tips and secrets. Our role is a helping hand in your performance and achievement. We believe in just one thing - Do what you love, and you will find the way to get it out to the world.
                </p>
                                            </div>
                                        </div> <!-- /.col-md-6 -->
                                        <div class="col-md-6">
                                            <div class="aboutImg">
                                                <iframe width="100%" height="315" src="https://www.youtube.com/embed/7dFwZMoI8iQ?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope;" allowfullscreen></iframe>
                                            </div>
                                        </div> <!-- /.col-md-6 -->
                                        <div class="col-md-2">&nbsp;</div>
                                        <div class="col-md-8">
                                            <div align="center"><?= br(2); ?>
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-2">&nbsp;</div>
                                    </div> <!-- /.row -->
                                </div>
                            </div>
                          </div>
                          <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                              <div class="bx-full bx-brd">
                                    <div class="bx-content bx-white">
                                      <div class="row">
                                          <div class="col-md-5">
                                              <h5 class="">Contact Person</h5>
                                                <span class="">
                                                    <b><i class="fa fa-user"></i> Name-</b> ANSH NAGPAL<br>
                                                    <b><i class="fa fa-phone"></i> Contact no-</b> +91 9650 744 530<br>
                                                    <b><i class="fa fa-envelope"></i> Email-</b> info@masterclap.in<br>
                                                    <b><i class="fa fa-envelope"></i> Email-</b> masterclap.in@gmail.com<br>
                                                </span> 
                                                <img src="<?= base_url('assets/img/aboutImg.png'); ?>" class="img-responsive" />
                                                <ul class="followContact">
                        <li><a target="_blank" href="https://www.facebook.com/112535730511932/posts/118324056599766/?substory_index=0"><i class="fab fa-facebook"></i></a></li>
                        <li><a target="_blank" href="https://www.linkedin.com/in/master-clap-6060311b1"><i class="fab fa-linkedin "></i></a></li>
                        <li><a target="_blank" href="https://twitter.com/MasterClap1"><i class="fab fa-twitter"></i></a></li>
                        <li><a target="_blank" href="https://www.instagram.com/masterclap.inc/"><i class="fab fa-instagram
"></i></a></li>
                        <li><a target="_blank" href="https://in.pinterest.com/masterclap/"><i class="fab fa-pinterest-square"></i></a></li>
                    </ul> 
                                          </div>
                                          <div class="col-md-7">
                                              <form action="<?= base_url('Home/sendContact'); ?>" method="post" class="border-form shaddow-form">
                                                  <h5>Send Us your query</h5>
                                                  <div class="form-group">
                                                        <label>Full Name</label>
                                                        <input type="text" name="name" class="form-control" required="required">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email Address</label>
                                                        <input type="text" name="email" class="form-control" required="required">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Mobile Number</label>
                                                        <input type="text" name="mobile" class="form-control" required="required">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Message</label>
                                                        <textarea name="mssg" class="form-control" required="required" placeholder="Write your query"></textarea>
                                                        <br>
                                                        <button class="btn btn-primary">Send</button>
                                                    </div>
                                              </form>
                                          </div>
                                      </div>
                                    </div>
                                </div>
                          </div>
                          <div class="tab-pane fade" id="pills-contact-2" role="tabpanel" aria-labelledby="pills-contact-tab">
                              <div class="inofContents">
                                  <h3>Help & Support</h3>
                                  <p>We're here to answer any questions you have about masterclap or our courses.<br>
Contact us: support@masterclap.in
</p>

                             </div>
                          </div>
                          <div class="tab-pane fade" id="pills-contact-3" role="tabpanel" aria-labelledby="pills-contact-tab">
                              <div class="inofContents">
                                  
                                          <h4>1. Introduction</h4>
<p>Welcome to Masterclap
These Terms of Service govern your use of our website located at www.masterclap.in operated by Masterclap.
Our Privacy Policy also governs your use of our Service and explains how we collect, safeguard and disclose information that results from your use of our web pages.
Your agreement with us includes these Terms and our Privacy Policy (“Agreements”). You acknowledge that you have read and understood Agreements, and agree to be bound of them.
If you do not agree with (or cannot comply with) Agreements, then you may not use the Service, but please let us know by emailing at @masterclap.in so we can try to find a solution. These Terms apply to all visitors, users and others who wish to access or use Service.....<a target="_blank" href="<?= base_url('Pages/Terms_conditions'); ?>">Read More</a></p>

                                      
                             </div>
                          </div>
                          <div class="tab-pane fade" id="pills-contact-4" role="tabpanel" aria-labelledby="pills-contact-tab">
                              <div class="inofContents">
                                  <h3>Privacy Policy</h3>
                                  <p>We value your trust. In order to honour that trust, Masterclap adheres to ethical standards in gathering, using, and safeguarding any information you provide. Think and Learn Private Limited Masterclap, is a company, incorporated in India, for imparting learning. This privacy policy governs your use of the application www.masterclap.in('Website') and the other associated applications, products, websites and services managed by the Company. Please read this privacy policy ('Policy') carefully before using the Application, Website, our services and products, along with the Terms of Use ('ToU') provided on the Application and the Website. Your use of the Website, Application, or services in connection with the Application, Website or products ('Services'), or registrations with us through any modes or usage of any products including through SD cards, tablets or other storage/transmitting device shall signify your acceptance of this Policy and your agreement to be legally bound by the same. If you do not agree with the terms of this Policy, do not use the Website, Application our products or avail any of our Servicess.</p>
                             </div>
                          </div>
                        </div>
                    </div>
                </div> <!-- /.container -->
            </div> <!-- /.infoContainer -->
        </section>
        <section class="feedbackArea">
            <div class="container">
                <div class="feedbackContainer">
                    <h2>Feedback</h2>
                    <div class="row">
                <?php 
                    //$this->db->distinct();
                    //$this->db->select("user_id");
                    $this->db->order_by("id","DESC");
                    $this->db->limit(4);
                    $getReviews = $this->db->get("video_likes");
                    if($getReviews->num_rows()==0)
                    {
                        $dataReview = array();
                    }
                    else
                    {
                        $row = $getReviews->result();
                        foreach ($row as $keyR) {
                        $this->db->where("id",$keyR->user_id);
                        $getUser = $this->db->get("users_profile")->row();
                           $dataReview[] = array
                                                (
                                                    "user_id"=>$keyR->user_id,
                                                    "name"=>$getUser->name,
                                                    "comments"=>$keyR->comments,
                                                    "dates"=>$keyR->date
                                                );
                        }
                        
                    }
                ?>
                <?php if(!empty($dataReview)){ ?>
                    <?php foreach($dataReview as $rev){
                        $expl = explode(" ",$rev['name']);
                        $fl = substr(@$expl[0], 0,1);
                        $ll = substr(@$expl[1], 0,1);
                        $dt = date_create($rev['dates']);
                        $newDate = date_format($dt,'F')." ".date_format($dt,'d').", ".date_format($dt,'Y');
                     ?>
                     <?php /*
                    <div class="singleFeedbackBox">
                        <div class="feedProfile">
                            <div class="feedImgDiv"><?= strtoupper($fl.$ll); ?></div>
                            <div class="feedUser">
                                <a href="#" class="name"><?= $rev['name']; ?></a>
                                <span><?= $newDate; ?></span>
                            </div>
                        </div> <!-- /.feedProfile -->
                        <ul class="rating">
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                        </ul>
                        <p><?= $rev['comments']; ?></p>
                        <div class="likeFeed">
                            
                        </div>
                    </div> <!-- /.singleFeedbackBox -->
                     <!-- /.singleFeedbackBox -->
                 
                 */ ?>

                 <div class="col-md-6 mb-3">
                             <div class="card  ht-320">
                                 <div class="card-body">
                                     <div class="feedProfile">
                                        <div class="feedImgDiv"><?= strtoupper($fl.$ll); ?></div>
                                        <div class="feedUser">
                                            <a href="#" class="name"><?= $rev['name']; ?></a>
                                            <ul class="rating">
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                            </ul>
                                            <span><?= $newDate; ?></span>
                                        </div>
                                    </div> <!-- /.feedProfile -->
                                    <p><?= $rev['comments']; ?></p>
                                 </div>
                             </div>
                         </div>
                 <?php } ?>
                 <?php } ?>
                     
                        
                     </div>
                </div> <!-- /.feedbackContainer -->
            </div>
            <?php if($this->session->flashdata("send"))
            {
                echo "<script>
                swal({
      type: 'success',
      text: 'Your request has been submitted successfully!',
      timer: 3000,
      onOpen: function(){
      swal.showLoading()
      }
      }).then(function(){
      window.open('Home','_self');
});
</script>
";
            } ?>
        </section>
        <?php include("inc/popHandler.php"); ?>
        <?php include('inc/footer.php'); ?>
		</div>
		<?php include('inc/modal.php'); ?>
		<?php include('inc/js.php'); ?>
        <script type="text/javascript">
		$(document).ready(function() {

           var wt = $(window).width();
           if(wt <= 600)
           {
          $("#owl-example").owlCarousel({
            items : 2, //10 items above 1000px browser width
            loop:true,
            mouseDrag:true,
            nav:false,
            navText:['','<img src="<?= base_url(); ?>assets/img/arrowRight.png" alt="">'],
            autoplay:true,
            autoplayTimeout:3000,
            smartSpeed:1000,
            });
         }
         else{
            $("#owl-example").owlCarousel({
            items : 4, //10 items above 1000px browser width
            loop:true,
            mouseDrag:true,
            nav:false,
            navText:['','<img src="<?= base_url(); ?>assets/img/arrowRight.png" alt="">'],
            autoplay:true,
            autoplayTimeout:3000,
            smartSpeed:1000,
            });
         }

         $("#ssrcc").keyup(function(){
            var keyw = $("#ssrcc").val();
            if(keyw == "")
            {
                $("#src-res").hide();
            }
            else
            {
                $.post("<?= base_url('Home/search'); ?>",
                {
                    keyw: keyw
                },
                function(response,status)
                    {
                       
                            $("#src-res").show();
                             $("#src-res").html(response);
                        }
                       

                    
                )
            }
         });
         $(".singlecataGoryItem").css("cursor","pointer");
         $(".singlecataGoryItem").click(function(){
            id = this.id;
            $.post("<?= base_url('Home/getPopVid'); ?>",
                    {
                        id: id
                    },
                    function(response,status)
                    {
                        $("#vidTbl").html(response)
                    }
            )
            $("#vidMdl").show(200);
         });
         $("#modCl").click(function(){
            
             stop('.video');
            $("#vidMdl").hide(200);
         });
         
        });
        function slctCrs(val)
        {
            //var id = this.class;
            location.href="<?= base_url('Course/viewCourse/'); ?>"+val;

        }
        function slctVds(val)
        {
            //var id = this.class;
            location.href="<?= base_url('SearchResult/index/'); ?>"+val;

        }
        </script>
        <script>
     var video = document.getElementById("video");
     function stopVideo(){
          //video.pause();
          video.currentTime = 0;
     }

$(".bb").click(function(){
    swal({
      type: 'success',
      text: 'Your request has been submitted successfully!',
      timer: 3000,
      onOpen: function(){
      swal.showLoading()
      }
      }).then(function(){
      window.open('Home','_self');
});

  });
    
    

</script>
	</body>
</html>