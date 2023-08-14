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

	$sql = "select * from sneakers where id = '$id'";
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
				<div class="form-group row">
					<input type="hidden" name="id" value="<?php echo $each['id']; ?>">
					<div class="col-6">
						<div class="col-xs-2 ">
							<label for="name" class="form-label">
								Tên giày:
							</label>
							<input type="text" name="name" class="form-control" value="<?php echo $each['name']; ?>">
						</div>

						<div class="col-xs-2 ">
							<label for="name" class="form-label">
								Giá:
							</label>
							<input type="text" name="price" class="form-control" value="<?php echo $each['price']; ?>">
						</div>


						<div class="col-xs-2 mt-2">
							<label for="address" class="form-label">
								Mô tả:
							</label>
							<textarea class="form-control" name="description" rows="5"><?php echo $each['description']; ?></textarea>
						</div>
					</div>
					<div class="col-6">
						<div class="col-xs-2 mt-2">
							<label for="photo" class="form-label">
								Link hình 1:
							</label>
							<input type="text" name="image_1" class="form-control" value="<?php echo $each['image_1']; ?>">
						</div>

						<div class="col-xs-2 mt-2">
							<label for="photo" class="form-label">
								Link hình 2:
							</label>
							<input type="text" name="image_2" class="form-control" value="<?php echo $each['image_2']; ?>">
						</div>

						<div class="col-xs-2 mt-2">
							<label for="photo" class="form-label">
								Link hình 3:
							</label>
							<input type="text" name="image_3" class="form-control" value="<?php echo $each['image_3']; ?>">
						</div>

						<div class="col-xs-2 mt-2">
							<label for="photo" class="form-label">
								Link hình 4:
							</label>
							<input type="text" name="image_4" class="form-control" value="<?php echo $each['image_4']; ?>">
						</div>

					</div>
					<div class="col-12 d-flex justify-content-end">
						<a href="index.php" class="btn btn-light ">Quay về</a>
						<button onclick="return confirm('Bạn chắc chắn muốn thay đổi thông tin này?');" class="btn btn-primary ">Sửa</button>
					</div>
				</div>
			</form>
		</div>
	</main>
	<!-- Content icons -->
	<script type="text/javascript">feather.replace()</script>
</body>
<?php mysqli_close($connect); ?>
</html>