<div class="container">
  <div class="card">
    <div class="card-header text-uppercase text-center">
      Thêm sản phẩm
    </div>
    <div class="card-body">

      <a href="<?php echo base_url('productCarDetail/list') ?>" class="btn btn-success">Danh sách chi tiết sản phẩm</a>

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
      <form action="<?php echo base_url('productCarDetail/formCreateProductDetail') ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="exampleInputNameCar">Tên Tiêu đề của xe</label>

          <input type="text" name="productCarDetailName" class="form-control" id="exampleInputNameCar">
          <?php echo '<span class="text text-danger">' . form_error('productCarDetailName') . '</span>'; ?>

        </div>

        <div class="form-group">
          <label for="exampleInputDescEngine">Mô tả về động cơ của xe</label>
          <textarea name="DescEngine" class="form-control" id="exampleInputDescEngine" cols="30" rows="10"></textarea>
          <?php echo '<span class="text text-danger">' . form_error('DescEngine') . '</span>'; ?>
        </div>

        <div class="form-group">
          <label for="exampleInputDescInterio">Mô tả về nội thất của xe</label>
          <textarea name="DescInterio" class="form-control" id="exampleInputDescInterio" cols="30" rows="10"></textarea>
          <?php echo '<span class="text text-danger">' . form_error('DescInterio') . '</span>'; ?>
        </div>

        <div class="form-group">
          <label for="exampleInputDescTechniques">Mô tả về công nghệ của xe</label>
          <textarea name="DescTechniques" class="form-control" id="exampleInputDescTechniques" cols="30" rows="10"></textarea>
          <?php echo '<span class="text text-danger">' . form_error('DescTechniques') . '</span>'; ?>
        </div>

        <div class="form-group">
          <label for="exampleInputIMGCar">Hình ảnh</label>
          <input type="file" name="productDetailIMG" class="form-control-file" id="exampleInputIMGCar">
          <small><?php if (isset($error)) {
                    echo $error;
                  } ?></small>

        </div>

        <div class="form-group">
          <div class="form-group">
            <label for="exampleFormControllSelect1">Thuộc sản phẩm xe</label>
            <select name="productCar_id" class="form-control" id="exampleFormControllSelect1">
              <?php
              foreach ($product as $key => $valueProduct) {
              ?>

                <option value="<?php echo $valueProduct->productCarID ?>"> <?php echo $valueProduct->productCarName ?></option>

              <?php
              }
              ?>
            </select>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Thêm</button>
      </form>
    </div>
  </div>
</div>