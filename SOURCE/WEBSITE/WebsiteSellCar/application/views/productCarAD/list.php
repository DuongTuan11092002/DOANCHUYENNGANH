
<div class="container">
    <div class="card">
      <div class="card-header text-uppercase text-center">
        danh sách Sản phẩm  
      </div>
      <div class="card-body">
                <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Mô tả</th>
                <th scope="col">Giá</th>
                <th scope="col">Ngày Tạo</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Quản lý</th>
              </tr>
            </thead>
            <tbody>
              <?php
                foreach ($products as $key  => $value) {
              ?>
              <tr>
                <th scope="row"><?php echo $value->productCarID ?></th>
                <td><?php echo $value->productCarName ?></td>
                <td><?php echo $value->description ?></td>
                <td><?php echo $value->price ?></td>
                <td><?php echo $value->create_at ?></td>
                <td>
                  <img src="<?php echo base_url('/uploads/productCar/'.$value->thumnail)?>" alt="" width="150" height="150">
                </td>

                <td>
                  <a href="<?php echo base_url('productCar/edit/'.$value->productCarID)?>" class="btn btn-warning">Sửa</a>
                  <a onclick="return confirm('Bạn chắc chắn muốn xóa không?')" href="<?php echo base_url('productCar/delete/'.$value->productCarID)?>" class="btn btn-danger">Xóa</a>

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
