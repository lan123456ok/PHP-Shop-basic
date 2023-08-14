<?php 
require 'check_customer.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/paper-kit.css?v=2.1.0">
	<link rel="stylesheet" type="text/css" href="../assets/css/demo.css">

	<!-- icon & font -->
	<link rel="stylesheet" href="../assets/css/nucleo-icons.css">
	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,300,700' rel='stylesheet' type='text/css'>
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	
	<?php 
	$id = $_SESSION['id_customer'];
	include '../menu.php';
	require '../connect.php';

	$sql = "select * from customers where id = '$id'";
	$result = mysqli_query($connect,$sql);
	$each = mysqli_fetch_array($result);
	?>
	<!-- <div style="height: 90px;" class="col-12"></div> -->
	<div class="wrapper">
		<div class="page-header page-header-small" style="background-image: url(
			'<?php
				if (empty($each['cover'])) {
				 	echo 'photos/default_landscape.png';
				}else{
					echo 'photos/' . $each['cover'];	
				}
				
			?>');">
			<div class="filter"></div>
		</div>
		<div class="profile-content section">
			<div class="container profile-container">
				<div class="row">
					<div class="profile-picture">
						<div class="fileinput fileinput-new" data-provides="fileinput">
							<div class="fileinput-new img-no-padding">
								<?php if (empty($each['avatar'])): ?>
									<img src="photos/default_avartar.png" alt="default-avatar">
								<?php else: ?>
									<img src="photos/<?php echo $each['avatar']; ?>">
								<?php endif ?>	
							</div>
							<div class="name">
								<h4 class="title text-center"><?php echo $_SESSION['name_customer']; ?><br /><small></small></h4>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 ml-auto mr-auto text-center">
						<p>This place is for writing your bio, will update it soon. Please keep support us, we will update soon <3</p>
						<br />
						<btn class="btn btn-outline-default btn-round" data-toggle="modal" data-target="#modal_account_customer"><i class="fa fa-cog"></i> Chỉnh sữa thông tin cá nhân</btn>
					</div>
				</div>
				<br/>
				<div class="nav-tabs-navigation">
					<div class="nav-tabs-wrapper">
						<ul class="nav nav-tabs" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" data-toggle="tab" href="#favorites_tab" role="tab">Favorites</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#order_tab" role="tab">Đơn hàng của bạn</a>
							</li>
						</ul>
					</div>
				</div>
				<!-- Tab panes -->
				<div class="tab-content">
					<div class="tab-pane active" id="favorites_tab" role="tabpanel">
						<div class="row">
							<div class="col-md-6 ml-auto mr-auto">
								<ul class="list-unstyled follows">
									<li>
										<div class="row">
											<div class="col-md-2 col-3">
												<img src="" class="img-circle img-no-padding img-responsive">
											</div>
											<div class="col-md-7 col-4">
												<h6>Nike Air Force 1 '07<br/><small>Men's Shoes</small></h6>
											</div>
											<div class="col-md-3 col-2">
												<div class="unfollow">
													<div class="form-check">
														<label class="form-check-label">
															<input class="form-check-input" type="checkbox" value="" checked>
															<span class="form-check-sign"></span>
														</label>
													</div>
												</div>
											</div>
										</div>
									</li>
									<hr />
									<li>
										<div class="row">
											<div class="col-md-2 col-3">
												<img src="" class="img-circle img-no-padding img-responsive">
											</div>
											<div class="col-md-7 col-4">
												<h6>Nike Metcon 9<br /><small>Men's Workout Shoes</small></h6>
											</div>
											<div class="col-md-3 col-2">
												<div class="unfollow" >
													<div class="form-check">
														<label class="form-check-label">
															<input class="form-check-input" type="checkbox" value="" checked>
															<span class="form-check-sign"></span>
														</label>
													</div>
												</div>
											</div>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="tab-pane text-center" id="order_tab" role="tabpanel">
						<h3 class="text-muted">Chưa có đơn hàng nào</h3>
						<br>
						<button class="btn btn-warning btn-round">Sắm cho mình ngày</button>
					</div>
				</div>
			</div>
		</div>
		<!-- Modal account form -->
		<div class="modal fade bd-example-modal-lg" id="modal_account_customer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Thông tin cá nhân</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body p-0">
						<form id="formUpdateCustomer" action="process_update_info.php" method="post" enctype="multipart/form-data">
							<input type="hidden" name="id" value="<?php echo $each['id']; ?>">
							<div class="container-fluid">
								<div class="row">
									<dl>
										<dt>
											<div class="d-flex justify-content-end">
												<label class="m-0" for="name">Tên người dùng:</label>
											</div>
										</dt>
										<dd>
											<input type="text" class="form-control" name="name" value="<?php echo $each['name']; ?>">
										</dd>
									</dl>
									
									<dl>
										<dt>
											<div class="d-flex justify-content-end">
												<label class="m-0" for="email">Email:</label>
											</div>
										</dt>
										<dd>
											<input type="text" class="form-control email-customer-now" name="email" value="<?php echo $each['email']; ?>" disabled>
											<button type="button" class="button blue">Thay đổi</button>
										</dd>
									</dl>

									<!-- Mat khau -->
									<!-- <dl>
										<dt>
											<div class="d-flex justify-content-end">
												<label class="m-0" for="password">Mật khẩu:</label>
											</div>
										</dt>
										<dd>
											<input type="password" class="form-control w-75" name="password" value="<?php //echo $each['password']; ?>">
											<button type="button"  class="button blue">Thay đổi</button>
										</dd>
									</dl> -->
									
									<dl>
										<dt>
											<div class="d-flex justify-content-end">
												<label class="m-0" for="sex">Giới tính:</label>
											</div>
										</dt>
										<dd>
											<input type="text" class="form-control " name="sex" value="<?php if($each['sex'] == 1){echo 'Nữ';} echo 'Nam'; ?>" disabled>

										</dd>
									</dl>
									
									<dl>
										<dt>
											<div class="d-flex justify-content-end">
												<label class="m-0" for="avatar">Avatar:</label>
											</div>
										</dt>
										<dd>
											<div class="fileinput-new img-no-padding ml-2">
												<?php if (empty($each['avatar'])): ?>
													<img height="100" src="photos/default_avartar.png" alt="...">
													<input type="hidden" name="old_avatar" value="<?php echo 'default_avartar.png' ?>">
												<?php else: ?>
													<img height="90" src="photos/<?php echo $each['avatar']; ?>" alt="...">
													<input type="hidden" name="old_avatar" value="<?php echo $each['avatar']; ?>">
												<?php endif ?>
												
												<input type="file" name="new_avatar">
											</div>
										</dd>
									</dl>
									
									<dl>
										<dt>
											<div class="d-flex justify-content-end">
												<label class="m-0" for="cover">Ảnh bìa:</label>
											</div>
										</dt>
										<dd>
											<div class="ml-2 mt-1">
												<input type="file" name="cover">
											</div>
											
										</dd>
									</dl>

									<dl>
										<dt>
											<div class="d-flex justify-content-end">
												<label class="m-0" for="birthdate">Ngày sinh:</label>
											</div>
										</dt>
										<dd>
											<input type="text" name="birthdate" class="form-control birthdate" placeholder="Ngày sinh" onfocus="(this.type='date')" onblur="if(this.value == ''){this.type='text'}" value="<?php echo $each['b_date']; ?>">
										</dd>
									</dl>
									
									<dl>
										<dt>
											<div class="d-flex justify-content-end">
												<label class="m-0" for="phone_number">Số điện thoại:</label>
											</div>
										</dt>
										<dd>
											<input type="text" class="form-control" name="phone_number" value="<?php 
											if (empty($each['phone_number'])) {
												echo 'Chưa cập nhật số điện thoại';
											}
											echo $each['phone_number']; 
										?>" onfocus="(this.value='')">
									</dd>
								</dl>

								<dl>
									<dt>
										<div class="d-flex justify-content-end">
											<label class="m-0" for="address">Địa chỉ:</label>
										</div>
									</dt>
									<dd>
										<input type="text" class="form-control" name="address" value="<?php 
										if (empty($each['address'])) {
											echo 'Chưa cập nhật địa chỉ';
										}
										echo $each['address']; 
									?>" onfocus="(this.value='')">
								</dd>
							</dl>

							<dl>
								<dt>
									<div class="d-flex justify-content-end">
										<label class="m-0" for="location">Khu vực:</label>
									</div>
								</dt>
								<dd>
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
								</dd>
							</dl>
						</div>	
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
				<button id="btn_save_info_customer" type="button" class="btn btn-primary">Lưu</button>
			</div>
		</div>
	</div>
</div>

</body>
<!-- Ajax -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<!-- core js -->
<script src="../assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/jquery-ui-1.12.1.custom.min.js" type="text/javascript"></script>
<script src="../assets/js/popper.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
<!-- Control Center for Paper Kit: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/paper-kit.js?v=2.1.0"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#btn_save_info_customer").click(function(event) {
			$('#formUpdateCustomer').submit();
		});
	});
</script>
</html>