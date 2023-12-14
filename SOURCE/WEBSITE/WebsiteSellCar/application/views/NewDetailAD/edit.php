<div class="container">
<div class="card">
  <div class="card-header text-uppercase text-center">
    Thêm Tin tức
  </div>
  
  <div class="card-body">
  <div class="">
          <a href="<?php echo base_url('NewDetail/list')?>" class="btn btn-success">Danh sách chi tiết tin tức</a>
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
        <form action="<?php echo base_url('New/update')?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="exampleInputNewDetail">Tên tiêu đề chi tiết tin tức</label>
          <input type="text" name="newDetailName" class="form-control" id="exampleInputNewDetail" placeholder="Nhập tiêu đề chi tiết tin tức"  >
          <?php echo '<span class="text text-danger">'. form_error('newName') .'</span>'; ?>
        </div>
        <div class="form-group">
          <label for="exampleInputNewDetailDesc">Mô tả chi tiết</label>
          <textarea name="newDesc" class="form-control" id="exampleInputNewDetailDesc" placeholder="Nhập mô tả tin tức giới hạn 200 kí tự" id="" cols="30" rows="10"></textarea>
         
          <?php echo '<span class="text text-danger">'. form_error('newDesc') .'</span>'; ?>
        </div>   
        <div class="form-group">
          <label for="exampleInputNewDetailTime">Ngày Tạo</label>
          <input type="date" name="newTime" class="form-control" id="exampleInputNewDetailTime" >
          <?php echo '<span class="text text-danger">'. form_error('newTime') .'</span>'; ?>                
        </div>
        <div class="form-group">
          <label for="exampleInputIMGNew">Hình ảnh</label>
          <input type="file" name="newDetailIMG" class="form-control-file" id="exampleInputIMGNew" >
          <small><?php if(isset($error)){echo $error;}?></small>
        </div>

        <button type="submit" class="btn btn-primary">Thêm</button>
      </form>

  </div>
</div>
</div>