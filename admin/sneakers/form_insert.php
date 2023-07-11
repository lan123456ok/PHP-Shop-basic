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
	require '../connect.php';

	$sql = "select * from manufacturers";
	$result = mysqli_query($connect,$sql);

	?>
	<div class="container">

		<form action="process_insert.php" method="post">
			<div class="form-group col">
				<div class="col-xs-2 ">
					<label for="name" class="form-label">
						Tên sản phẩm:
					</label>
					<input type="text" name="name" class="form-control " placeholder="Nhập tên...">
				</div>

				<div class="col-xs-2 mt-2">
					<label for="price" class="form-label">
						Giá:
					</label>
					<input class="form-control" type="number" name="price" placeholder="Nhập giá...">
				</div>

				<div class="col-xs-2 mt-2">
					<label for="description" class="form-label">
						Mô tả:
					</label>
					<textarea class="form-control" name="description" placeholder="Mô tả..."></textarea>
				</div>

				<div class="col-xs-2 mt-2">
					<label for="photo" class="form-label">
						Hình ảnh 1:
					</label>
					<input type="text" name="photo1" class="form-control " placeholder="Nhập link..">
				</div>

				<div class="col-xs-2 mt-2">
					<label for="photo" class="form-label">
						Hình ảnh 2:
					</label>
					<input type="text" name="photo2" class="form-control " placeholder="Nhập link..">
				</div>
				
				<div class="col-xs-2 mt-2">
					<label for="photo" class="form-label">
						Hình ảnh 3:
					</label>
					<input type="text" name="photo3" class="form-control " placeholder="Nhập link..">
				</div>
				
				<div class="col-xs-2 mt-2">
					<label for="photo" class="form-label">
						Hình ảnh 4:
					</label>
					<input type="text" name="photo4" class="form-control " placeholder="Nhập link..">
				</div>
				
				<div class="col-xs-2 mt-2">
					<label for="photo" class="form-label">
						Hãng:
					</label>
					<select name="manufacturer_id" class="form-control">
						<option disabled selected hidden>--Chọn--</option>
						<?php foreach ($result as $each): ?>
							<option value="<?php echo $each['id']; ?>"><?php echo $each['name']; ?></option>
						<?php endforeach ?>
					</select>
				</div>
				
				<div class="mt-2">
					<button onclick="return confirm('Bạn chắc chắn muốn thêm thông tin này?');" class="btn btn-primary ">Thêm</button>
				</div>
			</div>
		</form>
	</div>

	<script type="text/javascript">feather.replace()</script>
</body>
</html>