<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Trang chủ</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/paper-kit.css">
	<link rel="stylesheet" type="text/css" href="assets/css/demo.css">

	<!-- icon & font -->
	<link rel="stylesheet" href="assets/css/nucleo-icons.css">
	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,300,700' rel='stylesheet' type='text/css'>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php 
require 'connect.php';

$sql = "SELECT * FROM `sneakers` order by RAND() limit 3";
$result = mysqli_query($connect,$sql);

?>
<body class="ecommerce">
	<nav class="navbar navbar-expand-lg fixed-top nav-transparent nav-down" >
		<div class="container-fluid">
			<div class="nav-logo col-3">
				<div class="nav-header ml-4">
					<a href="#">
						<img width="80" src="assets/img/icons/nike_logo_normal.png">
					</a>
				</div>
				<button class="navbar-toggler navbar-burger" type="button" data-toggler="collapse" data-target="#navbarToggler" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-bar"></span>
					<span class="navbar-toggler-bar"></span>
					<span class="navbar-toggler-bar"></span>
				</button>
			</div>

			<div class="collapse navbar-collapse col-6">
				<ul class="navbar-nav m-auto">
					<li class="nav-item">
						<a class="nav-link" href="#">News & Feature</a>
					</li>
					<li class="nav-item ">
						<a class="nav-link " href="#">Men</a>
					</li>
					<li class="nav-item ">
						<a class="nav-link " href="#">Women</a>
					</li>
					<li class="nav-item ">
						<a class="nav-link " href="#">Kid</a>
					</li>
					<li class="nav-item ">
						<a class="nav-link " href="#">Sale</a>
					</li>
					<li class="nav-item ">
						<a class="nav-link " href="#">SNKRS</a>
					</li>
				</ul>
			</div>

			<div class="nav-customer col-3 d-flex flex-row justify-content-end">
				<div id="search_box" >
					<div id="search_button">
						<img src="assets/img/icons/search.png" class="icon">
					</div>
					<input type="text" placeholder="Search" id="input_search">
				</div>
				<div class="customer-use">
					<a href="#">
						<img src="assets/img/icons/white_heart.png" class="icon_nho">
					</a>
					<a href="#">
						<img src="assets/img/icons/buy_cart.png" class="icon_nho">
					</a>
				</div>

			</div>
		</div>
	</nav>
	<div class="page-header" style="background-image: url(https://static.nike.com/a/images/f_auto/dpr_1.0,cs_srgb/w_1255,c_limit/adfadc0d-031d-4c8d-8567-13e931d45d52/nike-just-do-it.jpg);">
		<div class="filter"></div>
		<div class="content-center">
			<div class="container text-center">
				<h3>New Nike United Pack</h3>
				<h1>Unity Forever</h1>
				<h3>It's a new dawn for football</h3>
			</div>
		</div>
	</div>

	<div class="wrapper">
		<div class="section latest-offers">
			<div class="container">
				<h3 class="section-title">Gợi ý cho bạn</h3>
				<div class="row">
					<?php foreach ($result as $each): ?>
						<div class="col-md-4">
							<div class="card card-product card-plain">
								<div class="card-image">
									<a href="#"><img class="img-rounded img-responsive" src="<?php echo $each['image_1']; ?>" ></a>
								</div>
								<div class="card-body">
									<div class="card-description">
										<h5 class="card-title"><?php echo $each['name']; ?></h5>
										<p class="card-description short-descript"><?php echo $each['description']; ?></p>
									</div>
									<div class="price">
										<span>
											<?php
											$money = $each['price'];
											$formatter =new Numberformatter('vi-VN',NumberFormatter::CURRENCY); 
											echo $formatter->formatCurrency($money,'VND'),PHP_EOL ;  
											?>
										</span>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach ?>
				</div>	
			</div>
		</div> <!-- section-product -->

		<div class="section section-gray">
			<div class="container">
				<h3 class="section-title">Chúng tôi có thứ bạn tìm</h3>
				<div class="row">
					<?php include 'filter_sneaker.php'; ?>
					<div class="col-md-9 mt-5">
						<div class="product">
							<div class="row">
								<?php 
								$sql = "select * from sneakers limit 6";
								$result_filter = mysqli_query($connect,$sql);
								?>
								<?php foreach ($result_filter as $each): ?>
									<div class="col-md-4 col-sm-4">
										<div class="card card-product card-plain">
											<div class="card-image">
												<a href="#"><img class="img-rounded img-responsive" src="<?php echo $each['image_1']; ?>" ></a>
											</div>
											<div class="card-body">
												<div class="card-description">
													<h5 class="card-title"><?php echo $each['name']; ?></h5>
													<p class="card-description short-descript"><?php echo $each['description']; ?></p>
												</div>
												<div class="price">
													<span>
														<?php
														$money = $each['price'];
														$formatter =new Numberformatter('vi-VN',NumberFormatter::CURRENCY); 
														echo $formatter->formatCurrency($money,'VND'),PHP_EOL ;  
														?>
													</span>
												</div>
											</div>
										</div>
									</div>
								<?php endforeach ?>

								<div class="col-md-3 offset-md-4">
									<button rel="tooltip" title="This is a morphing button" class="btn btn-round btn-outline-default" id="successBtn" data-toggle="morphing" data-rotation-color="gray">Load more...</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><!-- section -->

		<footer class="footer footer-big">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-9">
						<div class="links">
							<ul class="uppercase-links">
								<li>
									<a href="#paper-kit">
										Home
									</a>
								</li>
								<li>
									<a href="#paper-kit">
										Company
									</a>
								</li>
								<li>
									<a href="#paper-kit">
										Portfolio
									</a>
								</li>
								<li>
									<a href="#paper-kit">
										Team
									</a>
								</li>
								<li>
									<a href="#paper-kit">
										Blog
									</a>
								</li>
								<li>
									<a href="#paper-kit">
										Contact
									</a>
								</li>


							</ul>
							<hr />

							<div class="copyright">
								© <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by Creative Tim
							</div>
						</div>
					</div>

					<div class="col-md-4 ml-auto col-sm-2">
						<div class="social-area">
							<a href="#facebook" class="btn btn-neutral btn-round btn-just-icon btn-facebook">
								<i class="fa fa-facebook" aria-hidden="true"></i>
							</a>
							<a href="#twitter" class="btn btn-neutral btn-just-icon btn-round btn-twitter">
								<i class="fa fa-twitter" aria-hidden="true"></i>
							</a>
							<a href="#google" class="btn btn-neutral btn-just-icon btn-round btn-google">
								<i class="fa fa-google-plus" aria-hidden="true"></i>
							</a>
							<a href="#pin" class="btn btn-neutral btn-just-icon btn-round btn-pinterest">
								<i class="fa fa-pinterest-p" aria-hidden="true"></i>
							</a>
						</div>
					</div>

				</div>
			</div>
		</footer>
	</div><!-- wrapper -->
</body>
<!-- core js -->
<script src="assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/jquery-ui-1.12.1.custom.min.js" type="text/javascript"></script>
<script src="assets/js/popper.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

<!-- Plugin for Switches -->
<script src="assets/js/bootstrap-switch.min.js"></script>

<!--  Plugins for Slider -->
<script src="assets/js/nouislider.js"></script>

<!--  Plugins for Select -->
<script src="assets/js/bootstrap-select.js"></script>

<!-- Control Center for Paper Kit: parallax effects, scripts for the example pages etc -->
<script src="assets/js/paper-kit.js?v=2.1.0"></script>

<?php mysqli_close($connect); ?>
</html>