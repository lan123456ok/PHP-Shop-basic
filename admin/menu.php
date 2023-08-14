<?php 
  include 'session_admin.php';
?>
<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="../root/">Xin chào, <?php echo $_SESSION['name_admin']; ?></a>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search" id="input_search">
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="../signout.php">Đăng xuất</a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <!-- Navigation -->
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">

          <li class="nav-item">
            <a class="nav-link active" href="../root/index.php">
              <span data-feather="home"></span>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
          <?php if (isset($_SESSION['id_admin'])): ?>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="home"></span>
                Thông tin cá nhân
              </a>
            </li>
            <?php if ($_SESSION['level_admin'] == 0): ?>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="home"></span>
                 Nhân viên
                </a>
              </li>
            <?php endif ?>
          <?php endif ?>
          <li class="nav-item">
            <a class="nav-link" href="../users">
              <span data-feather="users"></span>
              Người dùng
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../sneakers">
              <span data-feather="gift"></span>
              Sản phẩm
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../manufacturers">
              <span data-feather="briefcase"></span>
              Hãng sản xuất
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../orders">
              <span data-feather="file-text"></span>
              Đơn hàng
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Báo cáo</span>
          <a class="d-flex align-items-center text-muted" href="#">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="calendar"></span>
              Tháng này
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <!-- Navigation -->
