<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
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
<body class="ecommerce">
	<?php 
		include '../menu.php'; //NavBar
		require '../connect.php';

		$sql = "select * from sneakers";
		$result = mysqli_query($connect,$sql); 
	?>
	<main>
		<div class="wrapper">
			<div class="container">
				<div style="height: 90px;" class="col-12">
					
				</div>

				<div class="row">
					<div class="col-md-3 col-sm-12">
						Filter(update soon)
					</div>
					<div class="col-md-9 col-sm-12">
						
							<div class="row">
								<?php foreach ($result as $each): ?>
									<div class="col-md-4 col-sm-6">
										<div class="card card-plain product ">
											<div class="card-image">
												<a href="view_details.php?id=<?php echo $each['id']; ?>"><img src="<?php echo $each['image_1']; ?>"></a>
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
							<div class="row">
								
							</div>
					</div>
				</div>
			</div>
		</div>
	</main>
		<?php include '../footer.php';?>	
	</body>
<?php mysqli_close($connect); ?>
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
	</html>