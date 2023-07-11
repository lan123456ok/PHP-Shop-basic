<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="../root/style.css">

	<script src="https://unpkg.com/feather-icons"></script>
</head>
<body>
	<?php
		$id = $_GET['id']; 
		include '../menu.php'; 
		require '../connect.php';

		$sql = "select * from manufacturers where id = '$id'";
		$result = mysqli_query($connect,$sql);
		$each = mysqli_fetch_array($result);
	?>

	<!-- Content -->
	<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
			<h4>Chỉnh sửa thông tin</h4>
		</div>

		<div class="container">
			<form action="process_update.php" method="post">
				<div class="form-group col">
					<input type="hidden" name="id" value="<?php echo $each['id']; ?>">
					<div class="col-xs-2 ">
						<label for="name" class="form-label">
							Tên hãng:
						</label>
						<input type="text" name="name" class="form-control w-25" placeholder="Nhập tên hãng..." value="<?php echo $each['name']; ?>">
					</div>

					<div class="col-xs-2 mt-2">
						<label for="address" class="form-label">
							Địa chỉ:
						</label>
						<textarea class="form-control w-25" name="address" placeholder="Nhập địa chỉ..."><?php echo $each['address']; ?></textarea>
					</div>

					<div class="col-xs-2 mt-2">
						<label for="photo" class="form-label">
							Logo hãng:
						</label>
						<input type="text" name="photo" class="form-control w-25" placeholder="Nhập link.." value="<?php echo $each['photo']; ?>">
					</div>

					<div class="mt-2">
						<button onclick="return confirm('Bạn chắc chắn muốn thay đổi thông tin này?');" class="btn btn-primary ">Sửa</button>
					</div>
				</div>
			</form>
		</div>
	</main>
	<!-- Content -->

	<script type="text/javascript">feather.replace()</script>
</body>
</html>