
<div class="container">
    <div class="card">
      <div class="card-header text-uppercase text-center">
        danh sách Tin tức
      </div>
      <div class="card-body">
        <div class="">
          <a href="<?php echo base_url('New/create')?>" class="btn btn-success">Thêm tin tức</a>
          <hr> 
        </div>
      
                <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Tiêu đề</th>
                <th scope="col" width="350px">Mô tả</th>
                <th scope="col">Ngày Tạo</th>
                <th scope="col">Hình ảnh</th>
                <th></th>
                <th scope="col">Quản lý</th>
              </tr>
            </thead>
            <tbody>
              <?php
                foreach ($New as $key  => $value) {
              ?>
              <tr>
                <th scope="row"><?php echo $value->newsID ?></th>
                <td><?php echo $value->newsHeading ?></td>
                <td><?php echo $value->description ?></td>
                <td><?php echo $value->create_at ?></td>

                <td>
                  <img src="<?php echo base_url('/uploads/New/'.$value->thumnail)?>" alt="" width="150" height="150">
                </td>

                <td>
                  <a href="<?php echo base_url('New/edit/'.$value->newsID)?>" class="btn btn-warning">Sửa</a>
                  <hr>
                  <a onclick="return confirm('Bạn chắc chắn muốn xóa không?')" href="<?php echo base_url('New/delete/'.$value->newsID)?>" class="btn btn-danger">Xóa</a>

                </td>
              </tr>
             <?php
                }
             ?>
            </tbody>
          </table>


      </div>
    </div>

</div>
