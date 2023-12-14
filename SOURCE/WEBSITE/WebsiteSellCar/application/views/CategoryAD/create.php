<div class="container">
<div class="card">
  <div class="card-header text-uppercase text-center">
    Thêm Danh mục
  </div>
  <div class="card-body">
    <div class="">
    <a class="btn btn-success" href="<?php echo base_url('Category/list') ?>">Danh sách danh mục</a>
    <hr>  
    </div>
                <?php
                if($this->session->flashdata('success')){
                ?>
                <div class="alert alert-success"> <?php echo $this->session->flashdata('success') ?></div>
                <?php
                }elseif($this->session->flashdata('error')){
                ?>
                <div class="alert alert-danger"> <?php echo $this->session->flashdata('error') ?></div>
                <?php
                }
                ?> 
  <form action="<?php echo base_url('Category/formCategory')?>" method="POST" enctype="multipart/form-data">
  <!-- name -->
  <div class="form-group">
    <label for="exampleInputCategory">Tên danh mục các dòng xe ô tô:</label>
    <input type="text" name="CategoryName" class="form-control" id="exampleInputCategory" placeholder="Vui lòng nhập các dòng xe"  >
    <?php echo '<span class="text text-danger">'. form_error('CategoryName') .'</span>'; ?>
  </div>

                
 
 
 
  <button type="submit" class="btn btn-primary">Thêm</button>
</form>

  </div>
</div>
</div>