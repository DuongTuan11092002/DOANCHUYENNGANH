<div class="container">
  <div class="card">
    <div class="card-header text-uppercase text-center">
      Thêm Hãng xe
    </div>
    <div class="card-body">
      <div>
        <a class="btn btn-success" href="<?php echo base_url('AutoMaker/list') ?>">Danh sách Hãng xe</a>
        <hr>
      </div>
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
      <form action="<?php echo base_url('AutoMaker/formCreateAutoMaker') ?>" method="POST" enctype="multipart/form-data">
        <!-- name -->
        <div class="form-group">
          <label for="exampleInputAutoMakerName">Tên Hãng xe</label>
          <input type="text" name="autoMakerName" class="form-control" id="slug" onkeyup="ChangeToSlug();">
          <?php echo '<span class="text text-danger">' . form_error('autoMakerName') . '</span>'; ?>

        </div>

        <div class="form-group">
          <label for="exampleInputAutoMakerName">Slug</label>
          <input type="text" name="autoMakerSlug" class="form-control" id="convert_slug">
          <?php echo '<span class="text text-danger">' . form_error('autoMakerSlug') . '</span>'; ?>

        </div>

        <div class="form-group">
          <label for="exampleInputCategory">Trạng thái</label>
          <select name="autoMakerStatus" id="" class="form-control">
            <option value="1" selected>Hiển thị</option>
            <option value="0">Không hiển thị</option>
          </select>
        </div>


        <button type="submit" class="btn btn-primary">Thêm</button>
      </form>
    </div>



  </div>
</div>