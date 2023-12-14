<div class="container">
<div class="card">
  <div class="card-header text-uppercase text-center">
    Sửa sản phẩm
  </div>
  <div class="card-body">

  <a href="<?php echo base_url('productCar/list')?>" class="btn btn-success">Danh sách sản phẩm</a>
  <a href="<?php echo base_url('productCar/create')?>" class="btn btn-success">Thêm sản phẩm</a>
  <hr>

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
     <form action="<?php echo base_url('productCar/update/'. $products->productCarID)?>" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Tên sản phẩm</label>
    <input type="text" name="productName" value="<?php echo $products->productCarName?>" class="form-control" id="exampleInputEmail1"  >
    <?php echo '<span class="text text-danger">'. form_error('productName') .'</span>'; ?>

  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Mô tả</label>
    <input type="text" name="productDesc" value="<?php echo $products->description?>" class="form-control" id="exampleInputPassword1" >
    <?php echo '<span class="text text-danger">'. form_error('productDesc') .'</span>'; ?>
  
    
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Giá</label>
    <input type="text" name="productPrice" value="<?php echo $products->price?>" class="form-control" id="exampleInputPassword1" >
    <?php echo '<span class="text text-danger">'. form_error('productPrice') .'</span>'; ?>

                
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Ngày Tạo</label>
    <input type="text" name="productTime" value="<?php echo $products->create_at?>" class="form-control" id="exampleInputPassword1" >
    <?php echo '<span class="text text-danger">'. form_error('productTime') .'</span>'; ?>

                
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Hình ảnh</label>
    <input type="file" name="productIMG"  class="form-control-file" id="exampleInputPassword1" >
    <img src="<?php echo base_url('/uploads/productCar/'.$products->thumnail)?>" alt="" width="150" height="150">
    <small><?php if(isset($error)){echo $error;}?></small>
                
  </div>

  <div class="form-group">
        <div class="form-group">
          <label for="exampleFormControllSelect1">Hãng</label>
          <select  name="autoMaker_id" class="form-control" id="exampleFormControllSelect1" >
          <?php
          foreach($autoMaker as $key => $valueAutoMaker) {
            
           
            ?>
          <option <?php echo $valueAutoMaker->autoMakerID==$products->autoMakerID ? 'selected' : '' ?> value="<?php echo $valueAutoMaker -> autoMakerID?>"> <?php echo $valueAutoMaker -> autoMakerName?></option>

      <?php 
          }
        ?>
          </select>              
        </div>
  </div>


  <div class="form-group">
        <div class="form-group">
          <label for="exampleFormControllSelect2">Danh mục</label>
          <select  name="categories_id" class="form-control" id="exampleFormControllSelect2" >
          <?php
          foreach($Category as $key => $valueCategory) {
            ?>
              <option <?php echo $valueCategory->categoriesID==$products->categoriesID ? 'selected' : '' ?> value="<?php echo $valueCategory -> categoriesID?>"> <?php echo $valueCategory -> categoriesName?></option>

        <?php
          }
        ?>
          </select>              
        </div>
  </div>
 
 
  <button type="submit" class="btn btn-primary">Cập nhật</button>
</form>
  </div>
</div>
</div>