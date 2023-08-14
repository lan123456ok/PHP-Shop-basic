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
		include '../menu.php'; 
		require '../connect.php';

		$sql = "select * from customers";
		$result = mysqli_query($connect,$sql);
	?>

	<!-- Content -->
	<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
			<h1 class="h2">Quản lí khách hàng</h1>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-4">
					<button type="button" class="btn btn-light">Refresh</button>
				</div>	
			</div>
		</div>

		<table class="table table-hover mt-2">
			<thead class="thead-light">
				<tr>
					<th>Mã khách hàng</th>
					<th>Tên khách hàng</th>
					<th>Email</th>
					<th>Số điện thoại</th>
					<th>Ngày sinh</th>
					<th>Giới tính</th>
					<th>Địa chỉ</th>
					<th>Khu vực</th>
					<th></th>
				</tr>
			</thead>
			<tbody id="table_customers">
				<?php foreach ($result as $each): ?>
					<tr>
						<td><?php echo $each['id']; ?></td>
						<td><?php echo $each['name']; ?></td>
						<td><?php echo $each['email']; ?></td>
						<td>
							<?php 
								echo $each['phone_number']; 
							?>
						</td>
						<td><?php echo $each['b_date']; ?></td>
						<td>
						<?php 
							echo $each['sex']; 
						?>	
						</td>
						<td><?php echo $each['address']; ?></td>
						<td>
						<?php 
							echo $each['location'];
						?>
						</td>
						<td>
							<a class="btn btn-success" href="form_update.php?id=<?php echo $each['id']; ?>">Sửa</a>
							<a class="btn btn-danger" href="delete.php?id=<?php echo $each['id']; ?>" onclick="return confirm('Bạn có muốn xóa thông tin này không?');">Xóa</a>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>

	</main>
	<!-- Content -->

<script type="text/javascript">feather.replace()</script>
</body>
</html>