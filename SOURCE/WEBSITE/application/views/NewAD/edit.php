<div class="container">
<div class="card">
  <div class="card-header text-uppercase text-center">
    Sửa Tin tức
  </div>
  
  <div class="card-body">
  <div class="">
          <a href="<?php echo base_url('New/create')?>" class="btn btn-success">Thêm tin tức</a>

          <a href="<?php echo base_url('New/list')?>" class="btn btn-success">Danh sách tin tức</a>
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
        <form action="<?php echo base_url('New/update/'. $NewEdit->newsID)?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="exampleInputNew">Tên tiêu đề tin tức</label>
          <input type="text" name="newName" value="<?php echo $NewEdit -> newsHeading ?>" class="form-control" id="exampleInputNew" placeholder="Nhập tiêu đề tin tức"  >
          <?php echo '<span class="text text-danger">'. form_error('newName') .'</span>'; ?>
        </div>
        <div class="form-group">
          <label for="exampleInputNewDesc">Mô tả tin tức</label>
          <textarea name="newDesc"  class="form-control" id="exampleInputNewDesc"  id="" cols="30" rows="10"><?php echo $NewEdit -> description ?></textarea>
         
          <?php echo '<span class="text text-danger">'. form_error('newDesc') .'</span>'; ?>
        </div>   
        <div class="form-group">
          <label for="exampleInputNewTime">Ngày Tạo</label>
          <input type="date" name="newTime" value="<?php echo $NewEdit ->create_at?>" class="form-control" id="exampleInputNewTime" >
          <?php echo '<span class="text text-danger">'. form_error('newTime') .'</span>'; ?>                
        </div>
        <div class="form-group">
          <label for="exampleInputIMGNew">Hình ảnh</label>
          <input type="file" name="newIMG" class="form-control-file" id="exampleInputIMGNew" >
          <img src="<?php echo base_url('/uploads/New/'.$NewEdit->thumnail)?>" alt="" width="150" height="150">
          <small><?php if(isset($error)){echo $error;}?></small>
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
      </form>

  </div>
</div>
</div>