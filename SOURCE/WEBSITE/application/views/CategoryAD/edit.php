<div class="container">
  <div class="card">
    <div class="card-header text-uppercase text-center">
      sửa Danh mục
    </div>
    <div class="card-body">
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
      <form action="<?php echo base_url('Category/update/' . $categoryEdit->categoriesID) ?>" method="POST" enctype="multipart/form-data">
        <!-- name -->
        <div class="form-group">
          <label for="exampleInputCategory">Tên danh mục</label>
          <input type="text" name="CategoryName" value="<?php echo $categoryEdit->categoriesName ?>" class="form-control" id="slug" onkeyup="ChangeToSlug();">
          <?php echo '<span class="text text-danger">' . form_error('CategoryName') . '</span>'; ?>
        </div>

        <div class="form-group">
          <label for="exampleInputCategory">Slug</label>
          <input type="text" name="CategorySlug" value="<?php echo $categoryEdit->slug ?>" class="form-control" id="convert_slug">
          <?php echo '<span class="text text-danger">' . form_error('CategorySlug') . '</span>'; ?>
        </div>

        <div class="form-group">
          <label for="exampleInputCategory">Trạng thái</label>
          <select name="CategoryStatus" id="" class="form-control">
            <option value="1" selected>Hiển thị</option>
            <option value="0">Không hiển thị</option>
          </select>
        </div>





        <button type="submit" class="btn btn-primary">Thêm</button>
      </form>
    </div>
  </div>

</div>