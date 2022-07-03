	<!DOCTYPE html>
	<html lang="zxx" class="no-js">

	<head>
		<?php $this->load->view('header'); ?>
	</head>

	<body>
		<header id="header" id="home">
			<div class="header-top">
				<div class="container">
					<?php $this->load->view('media_sosial'); ?>
				</div>
			</div>
			<div class="container main-menu">
				<div class="row align-items-center justify-content-between d-flex">
					<div id="logo">
						<a href="<?php echo base_url() ?>user"><img src="<?php echo base_url() ?>images/logo mekar.png" width="80" title="" /></a>
					</div>
					<nav id="nav-menu-container">
						<?php $this->load->view('menu_user'); ?>
					</nav><!-- #nav-menu-container -->
				</div>
			</div>
		</header><!-- #header -->

		<!-- start banner Area -->
		<section class="banner-area relative" id="home" style="background: url(<?php echo base_url() ?>assets_user/img/bk1.jpeg);">
			<div class="overlay overlay-bg"></div>
			<div class="container">
				<div class="row fullscreen d-flex align-items-center justify-content-between">
					<div class="banner-content col-lg-9 col-md-12">
						<h3 class="text-uppercase" style="color: white">Kontak</h3>
						<h1 class="text-uppercase">
							IPMK YOGYAKARTA
						</h1>
						<p class="pt-10 pb-10">
							Geser Ke Bawah
						</p>
					</div>
				</div>
			</div>
		</section>
		<!-- End banner Area -->

		<!-- Start popular-course Area -->
		<section class="popular-course-area section-gap">
			<div class="container">
				<div class="title text-center">
					<h1 class="mb-10">Kontak</h1>
					<p>IPMK YOGYAKARTA</p><br><br>
				</div>
				<h4>No. Telp :</h4> <P> 0896-0241-6089 (Rafli. A)<br>
									0813-2491-3193 (Ghofur. C)</P>
				<h4>Email :</h4> <p>ipmkjogja@gmail.com</P>
				<h4>Facebook :</h4> <P>IPMK Yogyakarta</p>
				<h4>Twitter :</h4> <P>@ipmkjogja</p>
				<h4>Instagram :</h4> <P>@ipmkjogja</p><br>
				<h4>Alamat :</h4><br>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1976.4161295319846!2d110.38464467751659!3d-7.807575287315396!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a57772d7031f1%3A0xe79fbb959998534b!2sAsrama%20IPMK%20Yogyakarta!5e0!3m2!1sid!2sid!4v1617384946280!5m2!1sid!2sid" 
				width="100%" height="450" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
			</div>
		</section>
		<!-- End popular-course Area -->



		<!-- start footer Area -->
		<footer class="footer-area section-gap">
			<div class="container">
				<div class="row">
				</div>
				<div class="footer-bottom row align-items-center justify-content-between">
					<p class="footer-text m-0 col-lg-6 col-md-12">
						Copyright &copy;<script>
							document.write(new Date().getFullYear());
						</script> Kerja Praktek | Informatika</p>
				</div>
			</div>
		</footer>
		<!-- End footer Area -->


		<script src="<?php echo base_url() ?>assets_user/js/vendor/jquery-2.2.4.min.js"></script>
		<script src="<?php echo base_url() ?>assets_user/https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="<?php echo base_url() ?>assets_user/js/vendor/bootstrap.min.js"></script>
		<script src="<?php echo base_url() ?>assets_user/https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
		<script src="<?php echo base_url() ?>assets_user/js/easing.min.js"></script>
		<script src="<?php echo base_url() ?>assets_user/js/hoverIntent.js"></script>
		<script src="<?php echo base_url() ?>assets_user/js/superfish.min.js"></script>
		<script src="<?php echo base_url() ?>assets_user/js/jquery.ajaxchimp.min.js"></script>
		<script src="<?php echo base_url() ?>assets_user/js/jquery.magnific-popup.min.js"></script>
		<script src="<?php echo base_url() ?>assets_user/js/jquery.tabs.min.js"></script>
		<script src="<?php echo base_url() ?>assets_user/js/jquery.nice-select.min.js"></script>
		<script src="<?php echo base_url() ?>assets_user/js/owl.carousel.min.js"></script>
		<script src="<?php echo base_url() ?>assets_user/js/mail-script.js"></script>
		<script src="<?php echo base_url() ?>assets_user/js/main.js"></script>
	</body>

	</html>