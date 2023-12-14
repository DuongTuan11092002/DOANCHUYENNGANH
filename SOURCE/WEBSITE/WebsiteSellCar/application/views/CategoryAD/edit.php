<div class="container">
    <div class="card">
      <div class="card-header text-uppercase text-center">
        sửa Danh mục
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
      <form action="<?php echo base_url('Category/update/'. $categoryEdit -> categoriesID)?>" method="POST" enctype="multipart/form-data">
      <!-- name -->
      <div class="form-group">
        <label for="exampleInputCategory">Tên danh mục</label>
        <input type="text" name="CategoryName" value="<?php echo $categoryEdit-> categoriesName?>" class="form-control" id="exampleInputCategory"  >
        <?php echo '<span class="text text-danger">'. form_error('CategoryName') .'</span>'; ?>
      </div>
    
                    
      </div>
     
     
      <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
      </div>
    </div>

</div>
