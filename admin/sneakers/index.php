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

	<script src="https://unpkg.com/feather-icons"></script>
</head>
<body>
	<?php 
	include '../menu.php'; 
	require '../connect.php';

	$view_sneakers = "select sneakers.*,manufacturers.name as manufacturer_name from sneakers join manufacturers on sneakers.manufacturer_id = manufacturers.id";
	$result = mysqli_query($connect,$view_sneakers);
	?>

	<!-- Content -->
	<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
			<h4 >Danh sách sản phẩm</h4>
		</div>

		<div class="container">
			<!-- Modal button -->
			<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal_insert">
				Thêm
			</button>
			<button type="button" class="btn btn-light">Refresh</button>

			<table class="table table-hover mt-2">
				<thead class="thead-light">
					<tr>
						<th>Mã sản phẩm</th>
						<th>Tên sản phẩm</th>
						<th>Giá</th>
						<th>Hình ảnh</th>
						<th>Hãng sản xuất</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($result as $each): ?>
						<tr>
							<td class="col-2"><?php echo $each['id']; ?></td>
							<td class="col-2"><?php echo $each['name']; ?></td>
							<td>
								<?php 
								$money = $each['price'];
								$formatter =new Numberformatter('vi-VN',NumberFormatter::CURRENCY); 
								echo $formatter->formatCurrency($money,'VND'),PHP_EOL ; 
								?>
							</td>
							<td class="col-1">
								<img height="100" src="<?php echo $each['image_1']; ?>">
							</td>
							<td><?php echo $each['manufacturer_name']; ?></td>
							<td>
								<a class="btn btn-info" href="details.php?id=<?php echo $each['id'];?>">Chi tiết</a>
								<a class="btn btn-success" href="">Sửa</a>
								<a class="btn btn-danger" href="">Xóa</a>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</main>
	<!-- Content -->

	<!-- Modal -->
	<div class="modal fade" id="modal_insert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Thêm giày</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<?php include 'form_insert.php'; ?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal -->
	<script type="text/javascript">feather.replace()</script>
</body>
</html>