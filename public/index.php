<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Trang chủ</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/paper-kit.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/demo.css">

	<!-- icon & font -->
	<link rel="stylesheet" href="../assets/css/nucleo-icons.css">
	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,300,700' rel='stylesheet' type='text/css'>
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<?php 
require '../connect.php';

$sql = "SELECT * FROM `sneakers` order by RAND() limit 3";
$result = mysqli_query($connect,$sql);

?>
<body class="ecommerce">
	
	<?php include '../menu.php';?>
	
	
	<div class="slider bg-light text-center">
		Hello Nike App
		<br>
		Download the app to access everything Nike. <a href="#">Get Your Great</a>
	</div>
	<div class="container w-75">
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
									<a href="view_details.php?id=<?php echo $each['id']; ?>"><img class="img-rounded img-responsive" src="<?php echo $each['image_1']; ?>" ></a>
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
					<?php include '../filter_sneaker.php'; ?>
					<div class="col-md-9 mt-5">
						<div class="product pb-2">
							<div class="row">
								<?php 
								$sql = "select * from sneakers limit 6";
								$result_filter = mysqli_query($connect,$sql);
								?>
								<?php foreach ($result_filter as $each): ?>
									<div class="col-md-4 col-sm-4">
										<div class="card card-product card-plain">
											<div class="card-image">
												<a href="view_details.php?id=<?php echo $each['id']; ?>"><img class="img-rounded img-responsive" src="<?php echo $each['image_1']; ?>" ></a>
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

		<?php include '../footer.php'; ?>
	</div><!-- wrapper -->
</body>
<!-- core js -->
<script src="../assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/jquery-ui-1.12.1.custom.min.js" type="text/javascript"></script>
<script src="../assets/js/popper.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>

<!-- Plugin for Switches -->
<script src="../assets/js/bootstrap-switch.min.js"></script>

<!--  Plugins for Slider -->
<script src="../assets/js/nouislider.js"></script>

<!--  Plugins for Select -->
<script src="../assets/js/bootstrap-select.js"></script>

<!-- Control Center for Paper Kit: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/paper-kit.js?v=2.1.0"></script>

<?php mysqli_close($connect); ?>
</html>