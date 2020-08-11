<?php $getFooterCourse = $this->SiteModel->getFooterCourse(); ?>
<footer class="footerArea">
            <div class="container">
                <div class="footerTopContetn">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-12">
                            <div class="singleWidget footMenu">
                                <h4 class="menuTitle">COURSES</h4>
                                <ul class="footmenuList">
                                    <?php if(!empty($getFooterCourse)){ ?>
                                        <?php foreach($getFooterCourse as $course){ ?>
                                            <li><a href="<?= base_url('Course/viewCourse/'.$course['crsId']); ?>"><?= $course['course_name']; ?></a></li>
                                        <?php } ?>
                                    <?php } ?>
                                    
                                </ul>
                            </div> <!-- /.singleWidget -->
                        </div> <!-- /.col-md-4 col-sm-6 col-12 -->
                        <div class="col-md-4 col-sm-6 col-12">
                            <div class="singleWidget footMenu">
                                <h4 class="menuTitle">COMPANY</h4>
                                <ul class="footmenuList">
                                    <li><a href="<?= base_url('Pages/AboutUs'); ?>">About Us</a></li>
                                    <li><a href="<?= base_url('Pages/ContactUs'); ?>">Contact Us</a></li>
                                    <li><a href="<?= base_url('Pages/Career'); ?>">Career</a></li>
                                    <li><a href="<?= base_url('Pages/Privacy'); ?>">Privacy Policy</a></li>
                                    <li><a href="<?= base_url('Pages/Terms_conditions'); ?>">Terms & Condition</a></li>
                                </ul>
                            </div> <!-- /.singleWidget -->
                        </div> <!-- /.col-md-4 col-sm-6 col-12 -->
                        <div class="col-md-4 col-sm-6 col-12">
                            <div class="singleWidget footMenu">
                                <h4 class="menuTitle">HELPFUL LINKS</h4>
                                <ul class="footmenuList">
                                    
                                    <li><a href="<?= base_url('Pages/Terms_conditions'); ?>">Terms & Conditions</a></li>
                                    
                                    <li><a href="<?= base_url('Pages/ContactUs'); ?>">Help & Support</a></li>
                                   
                                </ul>
                            </div> <!-- /.singleWidget -->
                        </div> <!-- /.col-md-4 col-sm-6 col-12 -->
                    </div> <!-- /.row -->
                </div> <!-- /.footerTopContetn -->
                <div class="footerBottom">
                    <div class="subscrib">
                        Sign up for Master Clap Emails 
                        <form action="#" class="subscribForm">
                            <input type="email" placeholder="Email Address">
                            <button type="submit"><i class="fas fa-caret-square-right"></i></button>
                        </form>
                    </div> <!-- /.subscrib -->
                    
                    <ul class="flowUsOn">
                        <li><a target="_blank" href="https://www.facebook.com/112535730511932/posts/118324056599766/?substory_index=0"><i class="fab fa-facebook"></i></a></li>
                        <li><a target="_blank" href="https://www.linkedin.com/in/master-clap-6060311b1"><i class="fab fa-linkedin "></i></a></li>
                        <li><a target="_blank" href="https://twitter.com/MasterClap1"><i class="fab fa-twitter"></i></a></li>
                        <li><a target="_blank" href="https://www.instagram.com/masterclap.inc/"><i class="fab fa-instagram
"></i></a></li>
                        <li><a target="_blank" href="https://in.pinterest.com/masterclap/"><i class="fab fa-pinterest-square"></i></a></li>
                    </ul>
                    <a href="#" class="donloadApp"><img src="<?= base_url(); ?>assets/img/play.png" alt=""></a>
                </div> <!-- /.footerBottom -->
                <div class="copyright">
                    <img src="<?= base_url(); ?>assets/img/logo.jpg" alt="">
                    <p>copyright &copy; 2020 master Clap India, Inc. All rights reserved. Terms of Use | Privacy Policy</p>
                </div>
            </div> <!-- /.container -->

        </footer>