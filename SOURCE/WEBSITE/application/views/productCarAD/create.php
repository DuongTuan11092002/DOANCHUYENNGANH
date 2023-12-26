<div class="container">
  <div class="card">
    <div class="card-header text-uppercase text-center">
      Thêm sản phẩm
    </div>
    <div class="card-body">

      <a href="<?php echo base_url('productCar/list') ?>" class="btn btn-success">Danh sách sản phẩm</a>

      <hr>
      <?php
      if ($this->session->flashdata('success')) {
      ?>
        <div class="alert alert-success"> <?php echo $this->session->flashdata('success') ?></div>
      <?php
      } elseif ($this->session->flashdata('error')) {
      ?>
        <div class="alert alert-danger"> <?php echo $this->session->flashdata('error') ?></div>
      <?php
      }
      ?>
      <form action="<?php echo base_url('productCar/includeProduct') ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="exampleInputNameCar">Tên sản phẩm</label>
          <input type="text" name="productName" class="form-control" id="slug" onkeyup="ChangeToSlug();">
          <?php echo '<span class="text text-danger">' . form_error('productName') . '</span>'; ?>

        </div>
        <div class="form-group">
          <label for="exampleInputDescCar">Mô tả</label>
          <!--<input type="text" name="productDesc" class="form-control" id="exampleInputDescCar" >-->
          <textarea name="productDesc" class="form-control" id="exampleInputDescCar" cols="500" rows="4"></textarea>
          <?php echo '<span class="text text-danger">' . form_error('productDesc') . '</span>'; ?>
        </div>

        <div class="form-group">
          <label for="exampleInputDescCar">Slug</label>
          <input type="text" name="productSlug" class="form-control" id="convert_slug">
          <?php echo '<span class="text text-danger">' . form_error('productSlug') . '</span>'; ?>
        </div>

        <div class="form-group">
          <label for="exampleInputPriceCar">Giá</label>
          <input type="number" name="productPrice" class="form-control" id="exampleInputPriceCar">
          <?php echo '<span class="text text-danger">' . form_error('productPrice') . '</span>'; ?>


        </div>

        <div class="form-group">
          <label for="exampleInputTimeCar">Ngày Tạo</label>
          <input type="date" name="productTime" class="form-control" id="exampleInputTimeCar">
          <?php echo '<span class="text text-danger">' . form_error('productTime') . '</span>'; ?>


        </div>

        <div class="form-group">
          <label for="exampleInputIMGCar">Hình ảnh</label>
          <input type="file" name="productIMG" class="form-control-file" id="exampleInputIMGCar">
          <small><?php if (isset($error)) {
                    echo $error;
                  } ?></small>

        </div>

        <div class="form-group">
          <div class="form-group">
            <label for="exampleFormControllSelect1">Hãng</label>
            <select name="autoMaker_id" class="form-control" id="exampleFormControllSelect1">
              <?php
              foreach ($autoMaker as $key => $valueAutoMaker) {
              ?>
                <option value="<?php echo $valueAutoMaker->autoMakerID ?>"> <?php echo $valueAutoMaker->autoMakerName ?></option>

              <?php
              }
              ?>
            </select>
          </div>
        </div>


        <div class="form-group">
          <div class="form-group">
            <label for="exampleFormControllSelect2">Danh mục</label>
            <select name="categories_id" class="form-control" id="exampleFormControllSelect2">
              <?php
              foreach ($Category as $key => $valueCategory) {
              ?>
                <option value="<?php echo $valueCategory->categoriesID ?>"> <?php echo $valueCategory->categoriesName ?></option>

              <?php
              }
              ?>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="exampleInputCategory">Trạng thái</label>
          <select name="productStatus" id="" class="form-control">
            <option value="1" selected>Hiển thị</option>
            <option value="0">Không hiển thị</option>
          </select>
        </div>


        <button type="submit" class="btn btn-primary">Add</button>
      </form>
    </div>
  </div>
</div>