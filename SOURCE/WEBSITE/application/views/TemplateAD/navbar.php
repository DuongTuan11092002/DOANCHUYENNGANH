<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?php echo base_url('dashboard') ?>">ADMIN</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse " id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      
    
      <!-- sản phẩm xe hơi -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-uppercase" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Quản lý sản phẩm
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo base_url('productCar/create') ?>">Thêm sản phẩm xe hơi</a>
          <a class="dropdown-item" href="<?php echo base_url('productCar/list') ?>">Danh sách xe hơi</a>
          <a class="dropdown-item" href="<?php echo base_url('productCarDetail/create') ?>">Thêm chi tiết xe hơi</a>
          <a class="dropdown-item" href="<?php echo base_url('productCarDetail/list') ?>">Danh sách chi tiết xe hơi</a>

        </div>
      </li>
      
      <!-- sản phẩm phụ tùng -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-uppercase" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Quản lý hãng
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo base_url('AutoMaker/create') ?>">Thêm các hãng xe</a>
          <a class="dropdown-item" href="<?php echo base_url('AutoMaker/list') ?>">Danh sách Hãng xe</a>
         

        </div>
      </li>
      

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-uppercase" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Quản lý Danh mục
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo base_url('Category/create') ?>">Thêm danh mục</a>
          <a class="dropdown-item" href="<?php echo base_url('Category/list') ?>">Danh sách danh mục</a>

        </div>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-uppercase" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Quản lý Tin tức
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo base_url('New/create') ?>">Thêm tin tức</a>
          <a class="dropdown-item" href="<?php echo base_url('New/list') ?>">Danh sách tin tức</a>
          <a class="dropdown-item" href="<?php echo base_url('NewDetail/create') ?>">Thêm chi tiết tin tức</a>
          <a class="dropdown-item" href="<?php echo base_url('NewDetail/list') ?>">Danh sách chi tiết tin tức</a>
        </div>
      </li>

      <!-- sản phẩm phụ tùng -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-uppercase" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Quản lý đơn hàng
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo base_url('Order/list') ?>">Danh sách đơn hàng</a>
         

        </div>
      </li>
  


      <li class="nav-item dropdown ">
        <a class="nav-link dropdown-toggle text-uppercase" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?php echo $this->session->userdata('loggedIn')['fullname'];  ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo base_url('logout') ?>">logout</a>
        </div>
      </li>
    </ul>

    
    <!-- <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form> -->
  </div>
</nav>

