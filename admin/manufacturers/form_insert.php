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
	<div class="container">

		<form action="process_insert.php" method="post">
			<div class="form-group col">
				<div class="col-xs-2 ">
					<label for="name" class="form-label">
						Tên hãng:
					</label>
					<input type="text" name="name" class="form-control " placeholder="Nhập tên hãng...">
				</div>

				<div class="col-xs-2 mt-2">
					<label for="address" class="form-label">
						Địa chỉ:
					</label>
					<textarea class="form-control " name="address" placeholder="Nhập địa chỉ..."></textarea>
				</div>

				<div class="col-xs-2 mt-2">
					<label for="photo" class="form-label">
						Logo hãng:
					</label>
					<input type="text" name="photo" class="form-control " placeholder="Nhập link..">
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