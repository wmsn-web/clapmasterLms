<?php
$getCourse = $this->SiteModel->getCourse();
$getCourseOne = $this->SiteModel->getCourseOne(); 
if($this->session->userdata("ClientId"))
{
    $userId = $this->session->userdata("ClientId");
    $getCart = $this->SiteModel->getCartNum($userId);
    $getUser = $this->SiteModel->getUserDetails($userId); 
}
?>
        <header class="headerArea desk-view">
            <div class="container">
                <div class="maunMenu">
                    <div class="menuLeft">
                        <a href="<?= base_url(); ?>" class="smallLogo"><img src="<?= base_url(); ?>assets/img/logo.jpg" alt=""></a>
                        <span id="mMenu" class="catagoryIcon"><img src="<?= base_url(); ?>assets/img/catagory.png" alt="">Categories</span>
                    </div> <!-- /.menuLeft -->
                    <div class="middleLogo">
                        <?php if($this->uri->segment(1)==""){ ?>
                            <img src="<?= base_url(); ?>assets/img/textLogo.png" alt="">
                        <?php }elseif($this->uri->segment(1)=="Home"){ ?>
                            <img src="<?= base_url(); ?>assets/img/textLogo.png" alt="">
                        <?php }elseif($this->uri->segment(1)=="MyCourses"){ ?>
                            <img src="<?= base_url(); ?>assets/img/mycourse.png" alt="">
                        <?php }else{ ?>
                            <img src="<?= base_url(); ?>assets/img/textLogo.png" alt="">
                        <?php } ?>

                    </div>
                    <div class="menuRight">

                        <a href="<?= base_url('MyCart'); ?>" class="cart"><img src="<?= base_url(); ?>assets/img/cart.png" style="padding-left: 20px" alt="">
                            <span class="bullet"><?= $getCart; ?></span>
                        </a>
                        <?= nbs(10); ?>
                        <?php if(!$this->session->userdata("ClientId")){ ?>
                            <a href="#" data-toggle="modal" data-target="#signsIn" class="login">Log in</a>
                            <a href="#" data-toggle="modal" data-target="#signs" class="signUp">Sign up</a>
                        <?php }else{ ?>
                            <!--a href="<?= base_url('Logout/index'); ?>"  class="signUp">Logout</a-->
                            <div class="dropdown">
                                  <span class="dropbtn"><i class="fa fa-user"></i></span>
                                  <div class="dropdown-content">
                                    <a href="<?= base_url('MyProfile'); ?>"><i class="fa fa-user"></i> My Profile</a>
                                        <a href="<?= base_url('MyCart'); ?>"><i class="fa fa-shopping-cart"></i> My Cart</a>
                                        <a href="<?= base_url('MyCourses'); ?>"><i class="fa fa-file"></i> My Courses</a>
                                        <a href="<?= base_url('Logout/index'); ?>"><i class="fa fa-power-off "></i> Log Out</a>
                                  </div>
                                  <?= $getUser['name']; ?>
                            </div>
                        <?php } ?>
                    </div> <!-- /.menuRight -->
                </div> <!-- /.maunMenu -->
            </div> <!-- /.container -->
        </header> <!-- /.headerArea -->
        <div class="desk-menu">
            <div class="desk-menu-padding">
                <div class="row">
                    <div class="col-md-3">
                        <div class="menu-box">
                            <?php if(!empty($getCourse)){ ?>
                                <?php foreach ($getCourse as $key) { ?>
                            <div class="cat-box">
                                <div id="<?= $key['crsId']; ?>" class="cat-title">
                                    <?= $key['course_name']; ?> <span class="cat-arrow"><i class="fas fa-angle-right"></i></span>
                                </div>
                                <div class="cat-content">
                                    <?= substr($key['descr'],0,50); ?>
                                </div>
                                <div class="read">
                                    <a href="<?= base_url("Course/viewCourse/".$key['crsId']); ?>">
                                        <button  class="cat-read">Read More</button>
                                    </a>
                                </div>
                            </div>
                            <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <span class="menuClose"><i class="fas fa-times"></i></span>
                        <div class="box-content">
                            <br><h3 id="crsName" class="text-white"><?= $getCourseOne['course_name']; ?></h3><br>
                            <div class="showCased"></div>
                            <div style="width:380px">
                                <img src="<?= base_url('uploads/videos/'.$getCourseOne['crsImg']); ?>" class="img-responsive"  style="width:380px">
                            </div><br>
                            <span id="descr" class="texts">
                                <?= $getCourseOne['descr']; ?>
                            </span>
                            <div class="sub-cat">
                                <ul id="bnnt">
                                    <?php if(!empty($getCourseOne['chapData'])){ ?>
                                        <?php foreach ($getCourseOne['chapData'] as $datas) { ?>
                                            <li  id="" class="ctt">
                                                <button onclick="newfunction('<?= $datas['id']; ?>')" class="cat-read"><?= $datas['chapName']; ?></button>
                                            </li>
                                        <?php } ?>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
                <div class="bx-footer">
                    <div class="row">
                        <div class="col-sm-4 oth-menu">
                            <a href="<?= base_url('Pages/Career'); ?>" class="text-white">
                                <i class="fas fa-briefcase" aria-hidden="true"></i> Career
                                <span><i class="fas fa-angle-right"></i></span>
                            </a>
                        </div>
                        <div class="col-sm-4 oth-menu">
                            <a href="<?= base_url('Pages/AboutUs'); ?>" class="text-white">
                                <i class="fas fa-users" aria-hidden="true"></i> About Us
                                <span><i class="fas fa-angle-right"></i></span>
                            </a>
                        </div>
                        <div class="col-sm-4 oth-menu">
                            <a href="<?= base_url('Pages/Affiliate'); ?>" class="text-white">
                                <i class="fas fa-users" aria-hidden="true"></i> Affiliate
                                <span><i class="fas fa-angle-right"></i></span>
                            </a>
                        </div>
                        <div class="col-sm-4 oth-menu">
                            <a href="<?= base_url('Pages/ContactUs'); ?>" class="text-white">
                                <i class="fas fa-envelope" aria-hidden="true"></i> Contact Us
                                <span><i class="fas fa-angle-right"></i></span>
                            </a>
                        </div>
                        <div class="col-sm-4 oth-menu">
                            <a href="<?= base_url('Pages/Privacy'); ?>" class="text-white">
                                <i class="fas fa-user-secret" aria-hidden="true"></i> Privacy Policy
                                <span><i class="fas fa-angle-right"></i></span>
                            </a>
                        </div>
                        <div class="col-sm-4 oth-menu">
                            <a href="<?= base_url('Pages/Help'); ?>" class="text-white">
                                <i class="fas fa-comments" aria-hidden="true"></i> Help & Support
                                <span><i class="fas fa-angle-right"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
        </div>
        <div class="mob-view">
            <div class="menubar">
                <div class="row">
                    <div class="menubtn" id="mobmn"><i id="icn" class="fas fa-bars"></i></div>
                    <div class="brndLogo">
                        <a href="<?= base_url(); ?>">
                            <img src="<?= base_url(); ?>assets/img/smlogo.png" alt=""> Master Clap</a>
                            <?php if(!$this->session->userdata("ClientId")){ ?>
                            <span data-toggle="modal" data-target="#modal2"><i class="fas fa-user-circle"></i></span>
                        <?php }else{ ?>

                                  <span class="dropbtn2"><i class="fa fa-user-circle"></i></span>
                                  <div class="dropdown-content2">
                                    <a href="<?= base_url('MyProfile'); ?>"><i class="fa fa-user"></i> My Profile</a>
                                        <a href="<?= base_url('MyCart'); ?>"><i class="fa fa-shopping-cart"></i> My Cart</a>
                                        <a href="<?= base_url('MyCourses'); ?>"><i class="fa fa-file"></i> My Courses</a>
                                        <a href="<?= base_url('Logout/index'); ?>"><i class="fa fa-power-off "></i> Log Out</a>
                                  </div>
                                  
                            
                        <?php } ?>
                        
                    </div>

                </div>
            </div>
            <div id="mySidenav" class="sidenav sdmenu">
                <h3>Categories</h3>
              <div class="menu-box">
                            <?php if(!empty($getCourse)){ ?>
                                <?php foreach ($getCourse as $key) { ?>
                            <div class="cat-box">
                                <div class="cat-title">
                                    <?= $key['course_name']; ?> <span class="cat-arrow"><i class="fas fa-angle-right"></i></span>
                                </div>
                                <div class="cat-content">
                                    <?= substr($key['descr'],0,50); ?>
                                </div>
                                <div class="read">
                                    <a href="<?= base_url("Course/viewCourse/".$key['crsId']); ?>">
                                        <button class="cat-read">Read More</button>
                                    </a>
                                </div>
                            </div>
                            <?php } ?>
                            <?php } ?>
                            
                            
                            
                        </div>
                        <div class="last-menu">
                        <div class="oth-menu">
                            <i class="fas fa-briefcase" aria-hidden="true"></i> Career
                            <span><i class="fas fa-angle-right"></i></span>
                        </div>
                        <div class="oth-menu">
                            <i class="fas fa-users" aria-hidden="true"></i> Affiliate
                            <span><i class="fas fa-angle-right"></i></span>
                        </div>
                        <div class="oth-menu">
                            <i class="fas fa-users" aria-hidden="true"></i> Affiliate
                            <span><i class="fas fa-angle-right"></i></span>
                        </div>
                        <div class="oth-menu">
                            <i class="fas fa-envelope" aria-hidden="true"></i> Contact Us
                            <span><i class="fas fa-angle-right"></i></span>
                        </div>
                        <div class="oth-menu">
                            <i class="fas fa-user-secret" aria-hidden="true"></i> Privacy Policy
                            <span><i class="fas fa-angle-right"></i></span>
                        </div>
                        <div class="oth-menu">
                            <i class="fas fa-comments" aria-hidden="true"></i> Help & Support
                            <span><i class="fas fa-angle-right"></i></span>
                        </div>
                    </div>
            </div>
        </div>