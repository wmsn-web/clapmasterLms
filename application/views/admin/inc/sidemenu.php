<?php
 $user = $this->session->userdata("UserAdmin");
 $gtAdmin = $this->AdminModel->getUser($user);
 $rro = $gtAdmin->row();	
 ?>	

		<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
		<aside class="app-sidebar sidebar-scroll ">
			<div class="main-sidebar-header">
				<a class=" desktop-logo logo-light" href="<?= base_url(); ?>/admin_panel/"><img src="<?= base_url(); ?>admin_assets/img/brand/smallLogo.png" class="main-logo" alt="logo"></a>
				<a class=" desktop-logo logo-dark" href="<?= base_url(); ?>/admin_panel/"><img src="<?= base_url(); ?>admin_assets/img/brand/smallLogo.png" class="main-logo dark-theme" alt="logo"></a>
				<a class="logo-icon mobile-logo icon-light" href="<?= base_url(); ?>/admin_panel/"><img src="<?= base_url(); ?>admin_assets/img/brand/smallLogo.png" class="logo-icon" alt="logo"></a>
				<a class="logo-icon mobile-logo icon-dark" href="<?= base_url(); ?>/admin_panel/"><img src="<?= base_url(); ?>admin_assets/img/brand/smallLogo.png" class="logo-icon dark-theme" alt="logo"></a>
			</div>
			<div class="main-sidebar-body circle-animation ">

				<ul class="side-menu circle">
					<li><h3 class="">Dashboard</h3></li>
					<li class="slide">
						<a class="side-menu__item" href="<?= base_url(); ?>/admin_panel/"><i class="side-menu__icon ti-desktop"></i><span class="side-menu__label">Dashboard</span></a>
					</li>
					<li><h3>Category & Courses</h3></li>
					
					
					<li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon ti-briefcase"></i><span class="side-menu__label">Courses</span><i class="angle fe fe-chevron-down"></i></a>
						<ul class="slide-menu">
							<li><a class="slide-item" href="<?= base_url('admin_panel/AddCourse'); ?>">Add Courses</a></li>
							<li><a class="slide-item" href="<?= base_url('admin_panel/AllCourses'); ?>">View All Courses</a></li>
							<li><a class="slide-item" href="<?= base_url('admin_panel/MoreAboutCourses'); ?>">More About Course</a></li>
							
							
						</ul>
					</li>
					
					<li class="slide">
						<a class="side-menu__item"  href="<?= base_url('admin_panel/Pricing'); ?>"><i class="side-menu__icon ti-money menu-icon"></i><span class="side-menu__label">Level & Pricing</span></a>
						
					</li>
					<li class="slide">
						<a class="side-menu__item"  href="<?= base_url('admin_panel/VideoAnalytics'); ?>"><i class="side-menu__icon ti-help-alt menu-icon"></i><span class="side-menu__label">Video Analytics</span></a>
						
					</li>
					<?php if($rro->type == "Admin"){ ?>
					<li><h3>Purchased Courses</h3></li>
					<li class="slide">
						<a class="side-menu__item"  href="<?= base_url('admin_panel/PurchasedCourses'); ?>"><i class="side-menu__icon ti-layers menu-icon"></i><span class="side-menu__label">Purchased Courses </span></a>
					</li>

					
					<li><h3>Users Management</h3></li>
					<li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon ti-user menu-icon"></i><span class="side-menu__label">Users Profile</span><i class="angle fe fe-chevron-down"></i></a>
						<ul class="slide-menu">
							<li><a class="slide-item" href="<?= base_url('admin_panel/Users'); ?>">All Users</a></li>
							<li><a class="slide-item" href="<?= base_url('admin_panel/SuperAdmins'); ?>">Super Admin</a></li>
						</ul>
					</li>
					
					<li><h3>Settings</h3></li>
					<li class="slide">
						<a class="side-menu__item"  href="<?= base_url('admin_panel/Coupons'); ?>"><i class="side-menu__icon ti-gift menu-icon"></i><span class="side-menu__label">Coupons</span></a>
					</li>

						<li class="slide">
						<a class="side-menu__item"  href="<?= base_url('admin_panel/GstSetup'); ?>"><i class="side-menu__icon ti-credit-card menu-icon"></i><span class="side-menu__label">GST Setup</span></a>
					</li>
					
					<li class="slide">
						<a class="side-menu__item"  href="<?= base_url('admin_panel/ChangePassword'); ?>"><i class="side-menu__icon ti-key menu-icon"></i><span class="side-menu__label">Change Password</span></a>
					</li>
					<?php } ?>
					<?= br(5); ?>
					
				</ul>
			</div>
		</aside>