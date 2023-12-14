<div class="card">
  <div class="card-header text-uppercase text-center">
    Sửa Hãng xe
  </div>
  <div class="card-body">
    <div>
        <a class="btn btn-success" href="<?php echo base_url('AutoMaker/list') ?>">Danh sách danh mục</a>
        <a class="btn btn-success" href="<?php echo base_url('AutoMaker/create') ?>">Thêm danh mục</a>
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
      <form action="<?php echo base_url('AutoMaker/update/'. $autoMaker -> autoMakerID)?>" method="POST" enctype="multipart/form-data">
      <!-- name -->
      <div class="form-group">
        <label for="exampleInputEmail1">Tên Hãng xe</label>
        <input type="text" name="autoMakerName" value="<?php echo $autoMaker-> autoMakerName?>" class="form-control" id="exampleInputEmail1"  >
        <?php echo '<span class="text text-danger">'. form_error('autoMakerName') .'</span>'; ?>
      </div>

     
                    
      <button type="submit" class="btn btn-primary">Cập nhật</button>
      </form>
  </div>
</div>