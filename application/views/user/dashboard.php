<!-- Slider Area -->
<section class="home-slider">
	<div class="slider-active">
		<!-- Single Slider -->
		<div class="single-slider overlay" style="background-image:url('<?= base_url('assets/frontend/') ?>images/slider/slider-bg1.jpg')">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 container">
						<div class="slider-text container">
							<h1>Visi <span>Sekolah</span></h1>
							<h3 style="color : white;">
								<?= $biodata->visi ?>
							</h3>
							<div class="button">
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/ End Single Slider -->
		<!-- Single Slider -->
		<div class="single-slider overlay" style="background-image:url('<?= base_url('assets/frontend/') ?>images/slider/slider-bg2.jpg')">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 container">
						<div class="slider-text container">
							<h1>Misi <span>Sekolah</span></h1>
							<h5 style="color: white;"><?= $biodata->misi ?></h5>
							<div class="button">
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

<!-- Blogs -->
<section class="blog section" id="keahlian">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-title">
					<h2><i class="fa fa-gear"></i> Program Keahlian</h2>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="blog-slider">
					<?php foreach ($keahlian as $key): ?>
					<!-- Single Blog -->
					<div class="single-blog">
						<div class="blog-head overlay">
							<img src="<?= base_url('assets/jurusan/' . $key->foto_jurusan) ?>" style="height: 200px;">
						</div>
						<div class="blog-content" style="height: 200px;">
							<h4 class="blog-title"><?= $key->nama_jurusan ?><hr>
							</h4>
							<div class="blog-info">
								
							</div>
							<p><?= $key->keterangan_jurusan ?></p>
							<div class="button">
								<br>
							</div>
						</div>
					</div>
					<!-- End Single Blog -->
				<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</section>
<!--/ End Blogs -->

<!-- Team -->
<section class="team section">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-title">
					<h2><i class="fa fa-user"></i> Wali Kelas</h2>
					
				</div>
			</div>
		</div>
		<div class="row">

			<?php foreach ($wali_kelas as $key): ?>
			<div class="col-lg-3 col-md-6 col-12">
				<!-- Single Team -->
				<div class="single-team">
					<img src="<?= base_url('assets/guru/').$key->foto ?>" style="height: 380px;">
					<div class="team-hover">
						<h4 class="name"><?= $key->nama_guru ?><span>
							<?= $key->alamat ?><br>
							<?= $key->tempat_lahir.', '.$this->mylibrary->date_indo($key->tanggal_lahir) ?><hr>
							<b><?= $key->nama_kelas ?><br> <?= $key->nama_jurusan ?></b>
							</span>
						</h4>
						<br><br>
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
				<div class="section-title">
					<h2><i class="fa fa-users"></i> Guru</h2>
				</div>
				<div class="testimonial-slider">
					<?php foreach ($guru as $guru): ?>
						<!-- Single Testimonial -->
						<div class="single-testimonial" style="min-height: 300px; background: rgba(225, 225, 225, 0.5); color: white; text-shadow: 1px 1px 5px black;">
							<img src="<?= base_url('assets/guru/').$guru->foto ?>" alt="#" class="img-responsive">
							<div class="main-content">
								<h4 class="name"><?= $guru->nama_guru ?></h4><hr>
								<p>
									<table>
									<?php foreach ($mengajar as $mengajar1): ?>
										<?php if ($guru->id_guru == $mengajar1->id_guru): ?>
											<tr>
												<td width="1%"><?= $mengajar1->nama_kelas ?></td>
												<td width="20%"><?= $mengajar1->nama_jurusan ?></td>
												<td width="20%"><i class="fa fa-arrow-right"></i> &nbsp;&nbsp;<?= $mengajar1->nama_pelajaran ?></td>
											</tr>
										<?php endif ?>
									<?php endforeach ?>
									</table>
								</p>
							</div>
						</div>
						<!--/ End Single Testimonial -->
					<?php endforeach ?>
					
				</div>
			</div>
		</div>
	</div>
</section>
<!--/ End Testimonials -->

<!-- Events -->
<section class="events section" id="Ekstrakulikuler">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-title">
					<h2><i class="fa fa-child"></i> Ekstrakulikuler</h2>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="event-slider">
					<?php foreach ($extra as $extra): ?>	
					<!-- Single Event -->
					<div class="single-event">
						<div class="head overlay">
							<img src="<?= base_url('assets/extra/').$extra->foto ?>" alt="#" style="height: 270px;">
							<a href="<?= base_url('assets/extra/').$extra->foto ?>" data-fancybox="photo" class="btn"><i class="fa fa-search"></i></a>
						</div>
						<div class="event-content">
							<div class="meta"> 
								<span><i class="fa fa-calendar"></i><?= $extra->hari ?></span>
								<span><i class="fa fa-clock-o"></i><?= strtoupper(date('H:m a', strtotime($extra->jam))) ?></span>
							</div>
							<h4><a><i class="fa fa-user"></i> <?= strtolower($extra->nama_pembimbing) ?></a></h4>
							<p><?= ucfirst($extra->keterangan) ?></p>
							<div class="button">
								<!-- <a href="event-single.html" class="btn">Join Event</a> -->
							</div>
						</div>
					</div>
					<!--/ End Single Event -->
					<?php endforeach ?>
				</div>
			</div>
		</div>
	</div>
</section>
<!--/ End Events -->

