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

	$sql = "select * from manufacturers";
	$result = mysqli_query($connect,$sql);
	?>

	<!-- Content -->
	<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
			<h4>Danh sách các hãng giày</h4>
		</div>

		<div class="container">
			<!-- Modal button -->
			<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal_insert">
				Thêm
			</button>
			
			<table class="table table-hover mt-2">
				<thead class="thead-light">
					<tr>
						<th>Mã hãng</th>
						<th>Tên hãng</th>
						<th>Địa chỉ trụ sở</th>
						<th>Ảnh</th>
						<th></th>
					</tr>	
				</thead>
				<tbody>
					<?php foreach ($result as $each): ?>
						<tr>
							<td><?php echo $each['id']; ?></td>
							<td><?php echo $each['name']; ?></td>
							<td><?php echo $each['address']; ?></td>
							<td><img height="100" src="<?php echo $each['photo']; ?>"></td>
							<td>
								<a class="btn btn-info" href="form_update.php?id=<?php echo $each['id']; ?>">
									Sửa
								</a>
								<a onclick="return confirm('Bạn có muốn xóa thông tin này không?');" class="btn btn-danger" href="delete.php?id=<?php echo $each['id']; ?>">
									Xóa				
								</a>
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
					<h5 class="modal-title" id="exampleModalLabel">Thêm hãng</h5>
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

	<script type="text/javascript">feather.replace()</script>
</body>
<?php mysqli_close($connect); ?>
</html>