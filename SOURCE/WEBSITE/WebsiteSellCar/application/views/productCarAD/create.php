<div class="container">
<div class="card">
  <div class="card-header text-uppercase text-center">
    Thêm sản phẩm
  </div>
  <div class="card-body">
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
  <form action="<?php echo base_url('productCar/includeProduct')?>" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Tên sản phẩm</label>
    <input type="text" name="productName" class="form-control" id="exampleInputEmail1"  >
    <?php echo '<span class="text text-danger">'. form_error('productName') .'</span>'; ?>

  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Mô tả</label>
    <input type="text" name="productDesc" class="form-control" id="exampleInputPassword1" >
    <?php echo '<span class="text text-danger">'. form_error('productDesc') .'</span>'; ?>
  
    
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Giá</label>
    <input type="text" name="productPrice" class="form-control" id="exampleInputPassword1" >
    <?php echo '<span class="text text-danger">'. form_error('productPrice') .'</span>'; ?>

                
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Ngày Tạo</label>
    <input type="text" name="productTime" class="form-control" id="exampleInputPassword1" >
    <?php echo '<span class="text text-danger">'. form_error('productTime') .'</span>'; ?>

                
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Hình ảnh</label>
    <input type="file" name="productIMG" class="form-control-file" id="exampleInputPassword1" >
    <small><?php if(isset($error)){echo $error;}?></small>
                
  </div>
 
 
  <button type="submit" class="btn btn-primary">Add</button>
</form>
  </div>
</div>
</div>