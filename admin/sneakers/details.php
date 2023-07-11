<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

	<link rel="stylesheet" type="text/css" href="../root/style.css">
	<link rel="stylesheet" href="view_detail.css">
	<script src="https://unpkg.com/feather-icons"></script>
	
</head>
<body>
	<?php 
	$id = $_GET['id'];
	include '../menu.php'; 
	require '../connect.php';

	$view_sneakers = "select sneakers.*,manufacturers.name as manufacturer_name from sneakers join manufacturers on sneakers.manufacturer_id = manufacturers.id where sneakers.id = '$id'";

	$result = mysqli_query($connect,$view_sneakers);
	$each = mysqli_fetch_array($result);

	$image_1 = $each['image_1'];
	$image_2 = $each['image_2'];
	$image_3 = $each['image_3'];
	$image_4 = $each['image_4'];
	
	?>

	<!-- Content -->
	<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
			<h4 >Chi tiết sản phẩm</h4>
		</div>

		<div class="container">
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

				<div class="info_product">
					<div class="product_name mb-3"><?php echo $each['name']; ?></div>
					<div class="product_price mb-3">
						<?php
							$money = $each['price'];
							$formatter =new Numberformatter('vi-VN',NumberFormatter::CURRENCY); 
							echo $formatter->formatCurrency($money,'VND'),PHP_EOL ; 
						?>
					</div>
					<div class="description mb-3"><?php echo nl2br($each['description']); ?></div>
				</div>
			</div>
		</main>
		<!-- Content -->


		<script type="text/javascript">feather.replace()</script>
	</body>
	<script type="text/javascript">

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
	</html>