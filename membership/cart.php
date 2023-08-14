<?php 
session_start();
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
</head>
<body>
	<?php
	
	include '../menu.php';
	if (empty($_SESSION['cart_shop'])) {
		$display = false;
	}else {
		$display = true;
		$cart = $_SESSION['cart_shop'];
	}
	$total = 0;
	?>
	<main>
		<div class="container">
			<div class="row">
				<div style="height: 120px;" class="col-12"></div>

				<div class="col-7">
					<h3>Giỏ hàng</h3>
					<span class="text-danger">
						<?php
						if (isset($_SESSION['error'])) {
							echo $_SESSION['error'];
							unset($_SESSION['error']);
						}
						?>
					</span>
					<?php if ($display): ?>
						<div>
							<?php foreach ($cart as $id => $each): ?>
								<div class="row p-1 product-cart">
									<a class="col-2 pl-0" href=""><img width="95" height="105" src="<?php echo $each['image_1']; ?>" alt=""></a>
									<div class="col-10 pl-0">
										<div class="row d-flex justify-content-between">
											<div class="col-4">
												<div><?php echo $each['name']; ?></div>
												<div>Giày nam</div>
												<div>Màu mặc định</div>
												<div class="row">
													<div class="col-4 pr-0 mt-2">
														Size:
													</div>

													<div class="col-8 p-0">
														<span class="float-left mt-2">Số lượng:</span>
														<div class="float-left row ml-1">
															<div class="col-6 p-0 mt-2">
																<span class="span-quantiy"><?php echo $each['quantity']; ?></span>
															</div> 
															<div class="col-6 p-0 float-left">
																<button class=" btn-quantity-update" data-id='<?php echo $id; ?>' data-type='1'>
																	+
																</button>
																<button class=" btn-quantity-update" data-id='<?php echo $id; ?>' data-type='0'>
																	-
																</button>
															</div>
														</div> 
													</div>
												</div>
											</div>
											<div class="col-4 p-0 d-flex justify-content-end">
												<span hidden class="span-price"><?php echo $each['price']; ?></span>
												<span class="span-sum">
													<?php 
													$sum = $each['price'] * $each['quantity'];
													echo $sum;
													$total += $sum;
													// $formatter =new Numberformatter('vi-VN',NumberFormatter::CURRENCY); 
													// echo $formatter->formatCurrency($sum,'VND'),PHP_EOL ; 
													// ?>
												</span>
												
											</div>
										</div>

										<div class="row">
											<div class="col-1 pr-0">
												<button class="btn-cart-below">
													<img width="24px" height="24px" src="../assets/img/icons/white_heart.png" alt=""></button>
												</div>

												<div class="col-1 p-0 ml-3">
													<button class="btn-cart-below btn-delete" data-id='<?php echo $id; ?>'>
														<img width="24px" height="24px" src="../assets/img/icons/remove_item_icon.png" alt="">
													</button>
												</div>
											</div>
										</div>
									</div>
								<?php endforeach ?>
							</div>
						<?php else: ?>
							<div ><p>Không có sản phẩm nào trong giỏ hàng.</p></div>
						<?php endif ?>
					</div>

					<div class="col-5 pl-5">
						<h3>Tổng kết</h3>
						<div  class="row  p-0">
							<p class="col-4">Tổng tiền:</p>
							<div class="col-3"></div>
							<span class="col-3 p-0 span-total d-flex justify-content-end ml-2">
								<?php
								echo $total; 
								?>	
							</span>
							
							<div class="col-10 ml-3" style="border-bottom: 1px solid lightgray;"></div>
						</div>

						<div>
							<button class="button_checkout" data-toggle="modal" data-target="#checkout_modal">
								Checkout
							</button>
						</div>

						<div class="modal fade" id="checkout_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Checkout</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body pt-1">
										<?php
										if (!isset($_SESSION['id_customer'])) {
											$_SESSION['error'] = 'Bạn chưa đăng nhập, đăng nhập ngay!!!';
										}else{
											$id = $_SESSION['id_customer']; 
											require '../connect.php';

											$sql = "select * from customers where id ='$id'";
											$result = mysqli_query($connect,$sql);
											$each = mysqli_fetch_array($result);
										}
										?>
										<form action="process_checkout.php" method="post" id="form_checkout">
											<div class="d-flex justify-content-center p-2 f1">
												Điền thông tin người nhận
											</div>
											<span class="text-danger">
												<?php
												if (isset($_SESSION['error'])) {
													echo ' <a href="signin.php" class="tooltip-test" title="Tooltip">Bạn có tài khoản chưa?</a>';
												}
												?>
											</span>

											<input id="CustomerName" type="text" class="form-control name" name="name_receiver" placeholder="Tên người nhận">
											<input id="CustomerAddress" type="text" class="form-control address" name="address_receiver" placeholder="Địa chỉ người nhận">
											<input id="CustomerPhone" type="text" class="form-control phone" name="phone_receiver" placeholder="Số điện thoại người nhận">
											<select name="location" class="form-control location p-1">
												<?php switch($each['location']) : case 1 : ?>

													<option value="<?php echo $each['location']; ?>">
														Việt Nam
													</option>

													<?php break; case 2 : ?>

													<option value="<?php echo $each['location']; ?>">
														Nhật Bản
													</option>

													<?php break; case 3 : ?>

													<option value="<?php echo $each['location']; ?>">
														USA
													</option>

													<?php break; case 4 : ?>

													<option value="<?php echo $each['location']; ?>">
														Thái Lan
													</option>
													
												<?php endswitch; ?>
											</select>
										</form>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-primary" data-dismiss="modal">Đóng</button>
										<button id="submit_checkout" type="button" class="btn btn-dark btn-order-create">Đặt hàng</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>

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
	<script src="../assets/js/paper-kit.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#submit_checkout').click(function(event) {
				$('#form_checkout').submit();
			});
			$('.btn-quantity-update').click(function(event) {
				let btn = $(this);
				let id = btn.data('id');
				let type = parseInt(btn.data('type'));
				
				$.ajax({
					url: 'update_quantity_in_cart.php',
					data: {id, type},
				})
				.done(function() {
					let parent_div = btn.parents('.product-cart');
					let price = parent_div.find('.span-price').text();
					let quantity = parent_div.find('.span-quantiy').text(); 

					// console.log(price);
					// console.log(quantity);

					if (type == 1) {
						quantity++; 
					}else{
						quantity--;
					}
					if (quantity === 0) {
						parent_div.remove();
					}else {
						parent_div.find('.span-quantiy').text(quantity);
						let sum = price * quantity;
						parent_div.find('.span-sum').text(sum);
					}
					getTotal(); 
				});
			});
			$('.btn-delete').click(function(event) {
				let btn = $(this);
				let id = btn.data('id');

				$.ajax({
					url: 'delete_from_cart.php',
					data: {id},
				})
				.done(function() {
					btn.parents('.product-cart').remove();
					getTotal();
				});
			});
		});
		function getTotal() {
			let total = 0;
			$(".span-sum").each(function() {
				console.log($(this).text());
				console.log(parseFloat($(this).text()));
				total += parseFloat($(this).text());
			});
			$(".span-total").text(total);
		}
	</script>
	</html>