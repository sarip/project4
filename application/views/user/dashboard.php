<!-- Slider Area -->
<section class="home-slider">
	<div class="slider-active">
		<!-- Single Slider -->
		<div class="single-slider overlay" style="background-image:url('<?= base_url('assets/frontend/') ?>images/slider/slider-bg1.jpg')">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-md-8 col-12">
						<div class="slider-text">
							<h1>Perfect Template for <span>Education</span> & Courses Website</h1>
							<p>Our mission is to empower clients, colleagues, and communities to achieve aspirations while building lasting, caring relationships.</p>
							<div class="button">
								<a href="courses.html" class="btn primary">Our Courses</a>
								<a href="about.html" class="btn">About Learnedu</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/ End Single Slider -->
		<!-- Single Slider -->
		<div class="single-slider overlay" style="background-image:url('<?= base_url('assets/frontend/') ?>images/slider/slider-bg2.jpg')">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-12">
						<div class="slider-text text-center">
							<h1>Creative Template for <span>Education</span> & Courses Website</h1>
							<p>Our mission is to empower clients, colleagues, and communities to achieve aspirations while building lasting, caring relationships.</p>
							<div class="button">
								<a href="courses.html" class="btn primary">Our Courses</a>
								<a href="about.html" class="btn">About Learnedu</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/ End Single Slider -->
		<!-- Single Slider -->
		<div class="single-slider overlay" style="background-image:url('<?= base_url('assets/frontend/') ?>images/slider/slider-bg3.jpg')">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 offset-lg-4 col-md-8 offset-md-4 col-12">
						<div class="slider-text text-right">
							<h1>Responsive Template for <span>Education</span> & Courses Website</h1>
							<p>Our mission is to empower clients, colleagues, and communities to achieve aspirations while building lasting, caring relationships.</p>
							<div class="button">
								<a href="courses.html" class="btn primary">Our Courses</a>
								<a href="about.html" class="btn">About Learnedu</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/ End Single Slider -->
	</div>
</section>
<!--/ End Slider Area -->

<!-- Features -->
<section class="our-features section">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-title">
					<h2>We Provide <span>Educational</span> Solutions</h2>
					<p>Mauris at varius orci. Vestibulum interdum felis eu nisl pulvinar, quis ultricies nibh. Sed ultricies ante vitae laoreet sagittis. In pellentesque viverra purus. Sed risus est, molestie nec hendrerit hendreri </p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4 col-md-4 col-12">
				<!-- Single Feature -->
				<div class="single-feature">
					<div class="feature-head">
						<img src="<?= base_url('assets/frontend/') ?>images/feature1.jpg" alt="#">
					</div>
					<h2>Online Courses Facilities</h2>
					<p>Vivamus volutpat eros pulvinar velit laoreet, sit amet egestas erat dignissim</p>	
				</div>
				<!--/ End Single Feature -->
			</div>
			<div class="col-lg-4 col-md-4 col-12">
				<!-- Single Feature -->
				<div class="single-feature">
					<div class="feature-head">
						<img src="<?= base_url('assets/frontend/') ?>images/feature2.jpg" alt="#">
					</div>
					<h2>Student Admin Panel</h2>
					<p>Vivamus volutpat eros pulvinar velit laoreet, sit amet egestas erat dignissim</p>	
				</div>
				<!--/ End Single Feature -->
			</div>
			<div class="col-lg-4 col-md-4 col-12">
				<!-- Single Feature -->
				<div class="single-feature">
					<div class="feature-head">
						<img src="<?= base_url('assets/frontend/') ?>images/feature3.jpg" alt="#">
					</div>
					<h2>Perfect Guidelines</h2>
					<p>Vivamus volutpat eros pulvinar velit laoreet, sit amet egestas erat dignissim</p>	
				</div>
				<!--/ End Single Feature -->
			</div>
		</div>
	</div>
</section>
<!-- End Features -->

<!-- Team -->
<section class="team section">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-title">
					<h2>Our Awesome <span>Teachers</span></h2>
					<p>Mauris at varius orci. Vestibulum interdum felis eu nisl pulvinar, quis ultricies nibh. Sed ultricies ante vitae laoreet sagittis. In pellentesque viverra purus. Sed risus est, molestie nec hendrerit hendreri </p>
				</div>
			</div>
		</div>
		<div class="row">

			<?php foreach ($guru as $key): ?>
			<div class="col-lg-3 col-md-6 col-12">
				<!-- Single Team -->
				<div class="single-team">
					<img src="<?= base_url('assets/guru/').$key->foto ?>">
					<div class="team-hover">
						<h4 class="name"><?= $key->nama_guru ?><span><?= $key->alamat ?></span></h4>
						<p>cumque nihil impedit quo minusid quod maxime placeat facere possimus</p>
						<ul class="social">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
							<li><a href="#"><i class="fa fa-youtube"></i></a></li>
						</ul>
					</div>
				</div>
				<!--/ End Single Team -->
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<!--/ End Team -->

<!-- Testimonials -->
<section class="testimonials overlay section" data-stellar-background-ratio="0.5">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="testimonial-slider">
					<!-- Single Testimonial -->
					<div class="single-testimonial">
						<img src="<?= base_url('assets/frontend/') ?>images/testimonial1.jpg" alt="#">
						<div class="main-content">
							<h4 class="name">Sanavce Faglane</h4>
							<p>Nulla cursus a metus vel placerat. Fusce malesuada volutpat pretium. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus velit libero, viverra quis euismod vel pellentesque at tortor. Donec</p>
						</div>
					</div>
					<!--/ End Single Testimonial -->
					<!-- Single Testimonial -->
					<div class="single-testimonial">
						<img src="<?= base_url('assets/frontend/') ?>images/testimonial2.jpg" alt="#">
						<div class="main-content">
							<h4 class="name">Jansan Kate</h4>
							<p>Nulla cursus a metus vel placerat. Fusce malesuada volutpat pretium. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus velit libero, viverra quis euismod vel pellentesque at tortor. Donec</p>
						</div>
					</div>
					<!--/ End Single Testimonial -->
					<!-- Single Testimonial -->
					<div class="single-testimonial">
						<img src="<?= base_url('assets/frontend/') ?>images/testimonial3.jpg" alt="#">
						<div class="main-content">
							<h4 class="name">Sanavce Faglane</h4>
							<p>Nulla cursus a metus vel placerat. Fusce malesuada volutpat pretium. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus velit libero, viverra quis euismod vel pellentesque at tortor. Donec</p>
						</div>
					</div>
					<!--/ End Single Testimonial -->
					<!-- Single Testimonial -->
					<div class="single-testimonial">
						<img src="<?= base_url('assets/frontend/') ?>images/testimonial4.jpg" alt="#">
						<div class="main-content">
							<h4 class="name">Jansan Kate</h4>
							<p>Nulla cursus a metus vel placerat. Fusce malesuada volutpat pretium. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus velit libero, viverra quis euismod vel pellentesque at tortor. Donec</p>
						</div>
					</div>
					<!--/ End Single Testimonial -->
				</div>
			</div>
		</div>
	</div>
</section>
<!--/ End Testimonials -->

<!-- Events -->
<section class="events section">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-title">
					<h2>Upcoming <span>Events</span></h2>
					<p>Mauris at varius orci. Vestibulum interdum felis eu nisl pulvinar, quis ultricies nibh. Sed ultricies ante vitae laoreet sagittis. In pellentesque viverra purus. Sed risus est, molestie nec hendrerit hendreri </p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="event-slider">
					<!-- Single Event -->
					<div class="single-event">
						<div class="head overlay">
							<img src="<?= base_url('assets/frontend/') ?>images/events/event1.jpg" alt="#">
							<a href="images/events/event1.jpg" data-fancybox="photo" class="btn"><i class="fa fa-search"></i></a>
						</div>
						<div class="event-content">
							<div class="meta"> 
								<span><i class="fa fa-calendar"></i>05 June 2018</span>
								<span><i class="fa fa-clock-o"></i>12.00-5.00PM</span>
							</div>
							<h4><a href="event-single.html">Freshers Day Reception 2018</a></h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipi sicing elit, sed do eiusmod tempor incididunt</p>
							<div class="button">
								<a href="event-single.html" class="btn">Join Event</a>
							</div>
						</div>
					</div>
					<!--/ End Single Event -->
					<!-- Single Event -->
					<div class="single-event">
						<div class="head overlay">
							<img src="<?= base_url('assets/frontend/') ?>images/events/event2.jpg" alt="#">
							<a href="images/events/event2.jpg" data-fancybox="photo" class="btn"><i class="fa fa-search"></i></a>
						</div>
						<div class="event-content">
							<div class="meta">
								<span><i class="fa fa-calendar"></i>03 July 2018</span>
								<span><i class="fa fa-clock-o"></i>03.20-5.20PM</span>
							</div>
							<h4><a href="event-single.html">Best Student Award 2018</a></h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipi sicing elit, sed do eiusmod tempor incididunt</p>
							<div class="button">
								<a href="event-single.html" class="btn">Join Event</a>
							</div>
						</div>
					</div>
					<!--/ End Single Event -->
					<!-- Single Event -->
					<div class="single-event">
						<div class="head overlay">
							<img src="<?= base_url('assets/frontend/') ?>images/events/event3.jpg" alt="#">
							<a href="images/events/event3.jpg" data-fancybox="photo" class="btn"><i class="fa fa-search"></i></a>
						</div>
						<div class="event-content">
							<div class="meta">
								<span><i class="fa fa-calendar"></i>15 Dec 2018</span>
								<span><i class="fa fa-clock-o"></i>12.30-5.30PM</span>
							</div>
							<div class="title">
								<h4><a href="event-single.html">Student Workshop</a></h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipi sicing elit, sed do eiusmod tempor incididunt</p>
							</div>
							<div class="button">
								<a href="event-single.html" class="btn">Join Event</a>
							</div>
						</div>
					</div>
					<!--/ End Single Event -->
				</div>
			</div>
		</div>
	</div>
</section>
<!--/ End Events -->

<!-- Blogs -->
<section class="blog section">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-title">
					<h2>Latest <span>News</span></h2>
					<p>Mauris at varius orci. Vestibulum interdum felis eu nisl pulvinar, quis ultricies nibh. Sed ultricies ante vitae laoreet sagittis. In pellentesque viverra purus. Sed risus est, molestie nec hendrerit hendreri </p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="blog-slider">
					<!-- Single Blog -->
					<div class="single-blog">
						<div class="blog-head overlay">
							<div class="date">
								<h4>10<span>May</span></h4>
							</div>
							<img src="<?= base_url('assets/frontend/') ?>images/blog/blog1.jpg" alt="#">
						</div>
						<div class="blog-content">
							<h4 class="blog-title"><a href="blog-single.html">Our Student Have sit amet egestas</a></h4>
							<div class="blog-info">
								<a href="#"><i class="fa fa-user"></i>By: Admin</a>
								<a href="#"><i class="fa fa-list"></i>Learning</a>
								<a href="#"><i class="fa fa-heart-o"></i>53K</a>
							</div>
							<p>Vivamus volutpat eros pulvinar velit laoreet, sit amet egestas erat dignissim. Et harum quidem rerum facilis est et expedita distinctio</p>
							<div class="button">
								<a href="blog-single.html" class="btn">Read More<i class="fa fa-angle-double-right"></i></a>
							</div>
						</div>
					</div>
					<!-- End Single Blog -->
					<!-- Single Blog -->
					<div class="single-blog">
						<div class="blog-head overlay">
							<div class="date">
								<h4>05<span>May</span></h4>
							</div>
							<img src="<?= base_url('assets/frontend/') ?>images/blog/blog2.jpg" alt="#">
						</div>
						<div class="blog-content">
							<h4 class="blog-title"><a href="blog-single.html">Our teachers egestas erat dignissim</a></h4>
							<div class="blog-info">
								<a href="#"><i class="fa fa-user"></i>By: Admin</a>
								<a href="#"><i class="fa fa-list"></i>Academic</a>
								<a href="#"><i class="fa fa-heart-o"></i>33K</a>
							</div>
							<p>Vivamus volutpat eros pulvinar velit laoreet, sit amet egestas erat dignissim. Et harum quidem rerum facilis est et expedita distinctio</p>
							<div class="button">
								<a href="blog-single.html" class="btn">Read More<i class="fa fa-angle-double-right"></i></a>
							</div>
						</div>
					</div>
					<!-- End Single Blog -->
					<!-- Single Blog -->
					<div class="single-blog">
						<div class="blog-head overlay">
							<div class="date">
								<h4>15<span>Mar</span></h4>
							</div>
							<img src="<?= base_url('assets/frontend/') ?>images/blog/blog3.jpg" alt="#">
						</div>
						<div class="blog-content">
							<h4 class="blog-title"><a href="blog-single.html">We are Proffesional Have velit Landon</a></h4>
							<div class="blog-info">
								<a href="#"><i class="fa fa-user"></i>By: Admin</a>
								<a href="#"><i class="fa fa-list"></i>Knowledge</a>
								<a href="#"><i class="fa fa-heart-o"></i>11K</a>
							</div>
							<p>Vivamus volutpat eros pulvinar velit laoreet, sit amet egestas erat dignissim. Et harum quidem rerum facilis est et expedita distinctio</p>
							<div class="button">
								<a href="blog-single.html" class="btn">Read More<i class="fa fa-angle-double-right"></i></a>
							</div>
						</div>
					</div>
					<!-- End Single Blog -->
					<!-- Single Blog -->
					<div class="single-blog">
						<div class="blog-head overlay">
							<div class="date">
								<h4>10<span>Mar</span></h4>
							</div>
							<img src="<?= base_url('assets/frontend/') ?>images/blog/blog4.jpg" alt="#">
						</div>
						<div class="blog-content">
							<h4 class="blog-title"><a href="blog-single.html">Our Student Have sit amet egestas</a></h4>
							<div class="blog-info">
								<a href="#"><i class="fa fa-user"></i>By: Admin</a>
								<a href="#"><i class="fa fa-list"></i>Learning</a>
								<a href="#"><i class="fa fa-heart-o"></i>53K</a>
							</div>
							<p>Vivamus volutpat eros pulvinar velit laoreet, sit amet egestas erat dignissim. Et harum quidem rerum facilis est et expedita distinctio</p>
							<div class="button">
								<a href="blog-single.html" class="btn">Read More<i class="fa fa-angle-double-right"></i></a>
							</div>
						</div>
					</div>
					<!-- End Single Blog -->
					<!-- Single Blog -->
					<div class="single-blog">
						<div class="blog-head overlay">
							<div class="date">
								<h4>25<span>Feb</span></h4>
							</div>
							<img src="<?= base_url('assets/frontend/') ?>images/blog/blog2.jpg" alt="#">
						</div>
						<div class="blog-content">
							<h4 class="blog-title"><a href="blog-single.html">Our teachers egestas erat dignissim</a></h4>
							<div class="blog-info">
								<a href="#"><i class="fa fa-user"></i>By: Admin</a>
								<a href="#"><i class="fa fa-list"></i>Academic</a>
								<a href="#"><i class="fa fa-heart-o"></i>33K</a>
							</div>
							<p>Vivamus volutpat eros pulvinar velit laoreet, sit amet egestas erat dignissim. Et harum quidem rerum facilis est et expedita distinctio</p>
							<div class="button">
								<a href="blog-single.html" class="btn">Read More<i class="fa fa-angle-double-right"></i></a>
							</div>
						</div>
					</div>
					<!-- End Single Blog -->
					<!-- Single Blog -->
					<div class="single-blog">
						<div class="blog-head overlay">
							<div class="date">
								<h4>28<span>Feb</span></h4>
							</div>
							<img src="<?= base_url('assets/frontend/') ?>images/blog/blog3.jpg" alt="#">
						</div>
						<div class="blog-content">
							<h4 class="blog-title"><a href="blog-single.html">We are Proffesional Have velit Landon</a></h4>
							<div class="blog-info">
								<a href="#"><i class="fa fa-user"></i>By: Admin</a>
								<a href="#"><i class="fa fa-list"></i>Knowledge</a>
								<a href="#"><i class="fa fa-heart-o"></i>11K</a>
							</div>
							<p>Vivamus volutpat eros pulvinar velit laoreet, sit amet egestas erat dignissim. Et harum quidem rerum facilis est et expedita distinctio</p>
							<div class="button">
								<a href="blog-single.html" class="btn">Read More<i class="fa fa-angle-double-right"></i></a>
							</div>
						</div>
					</div>
					<!-- End Single Blog -->
					<!-- Single Blog -->
					<div class="single-blog">
						<div class="blog-head overlay">
							<div class="date">
								<h4>03<span>Jan</span></h4>
							</div>
							<img src="<?= base_url('assets/frontend/') ?>images/blog/blog4.jpg" alt="#">
						</div>
						<div class="blog-content">
							<h4 class="blog-title"><a href="blog-single.html">Our Student Have sit amet egestas</a></h4>
							<div class="blog-info">
								<a href="#"><i class="fa fa-user"></i>By: Admin</a>
								<a href="#"><i class="fa fa-list"></i>Learning</a>
								<a href="#"><i class="fa fa-heart-o"></i>53K</a>
							</div>
							<p>Vivamus volutpat eros pulvinar velit laoreet, sit amet egestas erat dignissim. Et harum quidem rerum facilis est et expedita distinctio</p>
							<div class="button">
								<a href="blog-single.html" class="btn">Read More<i class="fa fa-angle-double-right"></i></a>
							</div>
						</div>
					</div>
					<!-- End Single Blog -->
				</div>
			</div>
		</div>
	</div>
</section>
<!--/ End Blogs -->