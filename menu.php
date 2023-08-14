<!-- <nav class="navbar navbar-expand-lg fixed-top nav-transparent nav-down"> -->
	<div class="container-fluid">
		<div class="row ">
			<div class="col-12 bg-light px-5">
				<div class="row">
					<div class="col-9">
						<ul class="navbar-nav col-2">
							<li>
								<a href="../index.php">
									<img height="24px" src="../assets/img/icons/Jordan-Logo.png">
								</a>
							</li>
						</ul>
					</div>
					
					<div class="user-menu col-3">
						<div class="row d-flex justify-content-end">
							<?php if (empty($_SESSION['id_customer'])) { ?>
								<div class="col-4 p-0"> 
									<div>
										<a href="">Tìm cửa hàng</a>
										<span>|</span>
									</div>
								</div>
								<div class="col-3 p-0 ">
									<div>
										<a href="">Trợ giúp</a>
										<span>|</span>
									</div>
								</div>
								<div class="div-user-login col-5 p-0">
									<div>
										<a href="../membership/signin.php">Tham gia</a>
										<span>|</span>
										<a href="../membership/signin.php">Đăng nhập</a>
									</div>
								</div>
							<?php } else { ?>
								<div class="div-user-login col-8 p-0">
									<div class="row d-flex justify-content-end">
										<div class="col-6 p-0 d-flex justify-content-end">
											<span>Chào,</span> <a style="margin-top: 0.16rem;" href="../membership/profile.php"><?php echo $_SESSION['name_customer']; ?></a><span>|</span>
										</div>
										<div class="col-4 p-0">
											<a href="../membership/signout.php">Đăng xuất</a>
										</div>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>

			<div class="col-12 pl-5" id="navbar">
				<div class="row">
					<div class="col-2">
						<div class="nav-header mt-1">
							<a href="../index.php">
								<img id="nike_logo" width="60" src="../assets/img/icons/nike_logo_normal.png">
							</a>
						</div>
					</div>

					<div class="col-6 d-flex justify-content-end">
						<nav class="navbar navbar-expand-lg">
							<div class="collapse navbar-collapse" id="navbarToggler">
								<ul class="navbar-nav mr-auto mt-2 mt-lg-0 d-flex flex-row">
									<li class="nav-item ">
										<a class="nav-link" href="../public/all_products.php">Our shoes</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#">Men</a>
									</li>
									<li class="nav-item ">
										<a class="nav-link " href="#">Women</a>
									</li>
									<li class="nav-item ">
										<a class="nav-link " href="#">Kid</a>
									</li>
									<li class="nav-item ">
										<a class="nav-link " href="#">Sale</a>
									</li>
									<li class="nav-item ">
										<a class="nav-link " href="#">SNKRS</a>
									</li>
								</ul>
							</div>
						</nav>

					</div>

					<div class="col-4 p-0">
						<div class="row customer-general d-flex justify-content-end align-items-center m-0">
							<div class="col-6 mr-4" id="search_box" >
								<div id="search_button">
									<img src="../assets/img/icons/search.png" class="icon">
								</div>
								<input class="search_input" type="text" placeholder="Search" id="input_search">
							</div>
							<div class="customer-use col-3 p-0 ">
								<a href="#">
									<img src="../assets/img/icons/white_heart.png" class="icon_nho">
								</a>
								<a href="/membership/cart.php">
									<img src="../assets/img/icons/buy_cart.png" class="icon_nho">
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
	<script type="text/javascript">
		var lastScroll = "23.75px";
		navbar = document.getElementById('navbar');
		window.addEventListener("scroll", function() {
			var scrollTop = window.PageYOffset || document.documentElement.scrollTop;
			if (scrollTop > lastScroll) {
				navbar.style.top = "-70px";
			}else if (scrollTop === lastScroll) {
				navbar.style.top = "23.75px";
			}else if (scrollTop == 0) {
				navbar.style.top = "23.75px";
			}else{
				navbar.style.top = "0px";
			}
			lastScroll = scrollTop ;
		});
	</script>

