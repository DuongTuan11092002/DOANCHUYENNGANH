<div class="container">
  <div class="card">
    <div class="card-header text-uppercase text-center">
      danh sách hãng xe
    </div>
    <div class="card-body">
      <div>
        <a class="btn btn-success" href="<?php echo base_url('AutoMaker/create') ?>">Thêm hãng xe</a>
        <hr>
      </div>
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Tên Hãng xe</th>
            <th scope="col">Slug</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Quản lý</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $i = 0;
          foreach ($autoMaker as $key  => $value) {
            $i++;
          ?>
            <tr>
              <th scope="row"><?php echo $value->autoMakerID ?></th>
              <td><?php echo $value->autoMakerName ?></td>
              <td><?php echo $value->slug ?></td>
              <td>
                <?php
                if ($value->status == 1) {
                  echo "<span class='text text-primary'>Hiển thị</span>";
                } else {
                  echo "<span class='text text-warning'>Không hiển thị</span>";
                }
                ?>
              </td>



              <td>
                <a href="<?php echo base_url('AutoMaker/edit/' . $value->autoMakerID) ?>" class="btn btn-warning">Sửa</a>
                <a onclick="return confirm('Bạn chắc chắn muốn xóa không?')" href="<?php echo base_url('AutoMaker/delete/' . $value->autoMakerID) ?>" class="btn btn-danger">Xóa</a>

              </td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>


    </div>
  </div>