<div class="container">
  <div class="card">
    <div class="card-header text-uppercase text-center">
      danh sách đơn hàng
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
    <div class="card-body">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Mã đơn hàng</th>
            <th scope="col">Người đặt hàng</th>
            <th scope="col">Số điện thoại</th>
            <th scope="col">Địa chỉ</th>
            <th scope="col">Email</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Quản lý</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $i = 0;
          foreach ($Order as $key  => $value) {
            $i++;
          ?>
            <tr>
              <th scope="row"><?php echo $i ?></th>
              <td><?php echo $value->order_code ?></td>
              <td><?php echo $value->fullname ?></td>
              <td><?php echo $value->phone ?></td>
              <td><?php echo $value->address ?></td>
              <td><?php echo $value->email ?></td>
              <td><?php
                  if ($value->status == 1) {
                    echo "<span class='text text-primary'>Đang chờ xử lý</span>";
                  } elseif ($value->status == 2) {
                    echo "<span class='text text-success'>Đã giao</span>";
                  } else {
                    echo "<span class='text text-warning'>Đã hủy</span>";
                  }
                  ?></td>
              <td>
                <a href="<?php echo base_url('Order/view/' . $value->order_code) ?>" class="btn btn-warning">Xem</a>
                <a onclick="return confirm('Bạn chắc chắn muốn xóa không?')" href="<?php echo base_url('Order/delete/' . $value->order_code) ?>" class="btn btn-danger">Xóa</a>
                <a href="<?php echo base_url('Order/print-order/' . $value->order_code) ?>" class="btn btn-success  mt-3">In đơn hàng</a>

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