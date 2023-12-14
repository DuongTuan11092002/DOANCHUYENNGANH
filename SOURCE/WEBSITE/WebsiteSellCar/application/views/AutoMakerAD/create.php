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
  <form action="<?php echo base_url('AutoMaker/formCreateAutoMaker')?>" method="POST" enctype="multipart/form-data">
  <!-- name -->
  <div class="form-group">
    <label for="exampleInputAutoMakerName">Tên Hãng xe</label>
    <input type="text" name="autoMakerName" class="form-control" id="exampleInputAutoMakerName"  >
    <?php echo '<span class="text text-danger">'. form_error('autoMakerName') .'</span>'; ?>
  </div>

 
  <button type="submit" class="btn btn-primary">Thêm</button>
</form>
  </div>

 

</div>
</div>