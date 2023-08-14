<?php
session_start(); 
$id = $_GET['id']; 
if (empty($id)) {
	header('location: all_products.php');
}
require '../connect.php';

$sql = "select * from sneakers where id = '$id'";
$result = mysqli_query($connect,$sql);
$each = mysqli_fetch_array($result);

$image_1 = $each['image_1'];
$image_2 = $each['image_2'];
$image_3 = $each['image_3'];
$image_4 = $each['image_4'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/paper-kit.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/demo.css">

	<!-- icon & font -->
	<link rel="stylesheet" href="../assets/css/nucleo-icons.css">
	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,300,700' rel='stylesheet' type='text/css'>
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="../style.css">

	<title><?php echo $each['name']; ?></title>

</head>
<body>
	<main>
		<?php  
		include '../menu.php'; //NavBar
		?>
		<div class="wrapper">
			<div class="container">
				<div class="product">
					<div class="row">
						<div style="height: 120px;" class="col-12">

						</div>
						<div class="col-8">
							<div class="image_product">
								<div class="left-column">
									<div style="background-image: url(<?php echo $each['image_1']; ?>);" class="image small-image active"data-index="1"></div>
									<div style="background-image: url(<?php echo $each['image_2']; ?>);" class="image small-image"data-index="2"></div>
									<div style="background-image:  url(<?php echo $each['image_3']; ?>);" class="image small-image" data-index="3"></div>
									<div style="background-image:  url(<?php echo $each['image_4']; ?>);" class="image small-image" data-index="4"></div>
								</div>

								<div class="right-column">
									<div style="background-image: url(<?php echo $each['image_1']; ?>);"class="image-preview image" data-index="1" 
										style=""></div>
									</div>				
								</div>
							</div>

							<div class="col-4">
								<div class="info_product row">
									<div class="product_name col-12 p-0"><?php echo $each['name']; ?></div>
									<div class="product_price col-12 p-0">
										<?php
										$money = $each['price'];
										$formatter =new Numberformatter('vi-VN',NumberFormatter::CURRENCY); 
										echo $formatter->formatCurrency($money,'VND'),PHP_EOL ; 
										?>
									</div>
									<div class=" col-12 mt-5">
										<form id="buyTools" class="add-to-cart-form">
											<div class="size-chart" >
												<fieldset>
													<legend class="headline-5" aria-label="Select Size">
														<div class="row">
															<div class="col-4 p-0">Select Size</div>
															<div class="col-8 d-flex justify-content-end">
																<a href="">Size Guide</a>
															</div>
														</div>
													</legend>
													<div class="size-option row">
														<?php for ($i = 36.5; $i <= 43; $i += 0.5){ ?>
															<div class="col-4">
																<input id="<?php echo $i; ?>" type="radio" name="radioSize" value="<?php echo $i; ?>"/>
																<div><label class="lab1 mt-2 " for="<?php echo $i; ?>">
																	<?php echo $i; ?>
																</label></div>
															</div>
														<?php } ?>
													</div>
												</fieldset>
												
											</div>
											<div class="button_user">
												<button type="button" class="add_button" data-id="<?php echo $each['id']; ?>">Cho vào giỏ hàng</button>
												<button type="button" class="favor_button">Favorite</button>
											</div>
										</form>
									</div>
									<div class="description col-12 p-0"><?php echo nl2br($each['description']); ?>
								</div>
							</div>
						</div>

					</div>
					<div style="height: 120px;" class="col-12">

					</div>
				</div>
				<div class="row related-products mt-3">
					<div class="column-xs-12">
						<h3>You may also like</h3>
					</div>
						<?php
						$manufacturer_id = $each['manufacturer_id']; 
						$sql_related = "select * from sneakers where manufacturer_id = '$manufacturer_id' and id != '$id'";

						$result_related = mysqli_query($connect,$sql_related);
						?>
						<div class="row mt-5">
							<?php foreach ($result_related as $each_related): ?>
								<div class="col-md-4">
									<div class="card card-product card-plain">
										<div class="card-image">
											<a href=""><img class="img-rounded img-responsive" src="<?php echo $each_related['image_1']; ?>" ></a>
										</div>
										<div class="card-body">
											<div class="card-description">
												<h5 class="card-title"><?php echo $each['name']; ?></h5>
												<p class="card-description short-descript"><?php echo $each_related['description']; ?></p>
											</div>
											<div class="price">
												<span>
													<?php
													$money = $each_related['price'];
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
				</div>
			</div>
		</main>
		<?php include '../footer.php'; ?>	
	</body>
	<!-- core js -->
	<script src="../assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
	<script src="../assets/js/jquery-ui-1.12.1.custom.min.js" type="text/javascript"></script>
	<script src="../assets/js/popper.js" type="text/javascript"></script>
	<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
	<!-- Ajax -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<!-- Plugin for Switches -->
	<script src="../assets/js/bootstrap-switch.min.js"></script>

	<!--  Plugins for Slider -->
	<script src="../assets/js/nouislider.js"></script>

	<!--  Plugins for Select -->
	<script src="../assets/js/bootstrap-select.js"></script>

	<!-- Control Center for Paper Kit: parallax effects, scripts for the example pages etc -->
	<script src="../assets/js/paper-kit.js?v=2.1.0"></script>
	<!-- Image product interact -->
	<script type="text/javascript">
		$(document).ready(function() {
			$('.add_button').click(function(event) {
				let id = $(this).data('id');
				$.ajax({
					url: '../membership/add_to_cart.php',
					data: {id},
				})
				.done(function(response) {
					if (response == 1) {
						alert('Đã thêm vào giở hàng');
					}else {
						alert('response');
					}
				})
			});
		});

		window.onload = () => {
			const previewE1 = document.querySelector('.image-preview');
			const previewWidth = previewE1.offsetWidth;
			const previewHeight = previewE1.offsetHeight;

			document.querySelector('.left-column').addEventListener('click', e => {
				const curClassList = e.target.classList;
				if (!curClassList.contains('small-image') || curClassList.contains('small-image')&& curClassList.contains('active')) return ;
				document.querySelector('.small-image.active').classList.remove('active');
				curClassList.add('active');

				const imgIndex = e.target.dataset.index;
				previewE1.dataset.index = imgIndex;

				switch (Number(imgIndex)) {
				case 1:
					previewE1.style.backgroundImage ="url(<?php echo $image_1; ?>)";
					break;
				case 2:
					previewE1.style.backgroundImage ="url(<?php echo $image_2; ?>)";
					break;
				case 3:
					previewE1.style.backgroundImage ="url(<?php echo $image_3; ?>)";
					break;
				case 4:
					previewE1.style.backgroundImage ="url(<?php echo $image_4; ?>)";
					break;
				}
			});

			previewE1.addEventListener('mousemove', e =>{
				const offsetXPercent = Math.round(e.offsetX * 100 / previewWidth);
				const offsetYPercent = Math.round(e.offsetY * 100 / previewHeight);
				previewE1.style.backgroundPosition = `${offsetXPercent}% ${offsetYPercent}%`;

			});

			previewE1.addEventListener('mouseleave',e => {
				previewE1.style.removeProperty('background-position');
			})
		}
	</script>		
	<?php mysqli_close($connect); ?>
	</html>