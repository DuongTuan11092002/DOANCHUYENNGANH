<!-- tip:
  nếu danh sách không hiện là do xem các khóa ngoại có dữ liệu chưa không có thì thêm dữ liệu vào sẽ hiện
 -->
 <div class="card">
      <div class="card-header text-uppercase text-center">
       Đơn hàng chi tiết   
      </div>
      <div class="card-body">
      
      
                <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Mã đơn hàng </th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Giá</th>
                <th scope="col">Tổng giá</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <?php
                $i = 0; 
                foreach ($OrderDetail as $key  => $value) {
                  $i++;
              ?>
              <tr>
                <th scope="row"><?php echo $i ?></th>
                <td><?php echo $value->orderCode ?></td>
                <td>
                  <img src="<?php echo base_url('/uploads/productCar/'.$value->thumnail)?>" alt="" width="150" height="150">
                </td>
                <td><?php echo $value->productCarName ?></td>
                <td><?php echo $value->qty ?></td>
                <td><?php echo number_format($value->price).'VND' ?></td>
                <td>
                    <?php
                        echo number_format($value->qty * $value->price).'VND'   
                    ?>
                </td>
            

              </tr>
             <?php
                }
             ?>

             <tr>
                <td> 
                    
                    <select class="form-control xulydonhang">
                        <option value="0" id="<?php echo $value-> orderCode ?> ">----Xử lý đơn hàng-----</option>
                        <option value="1" id="<?php echo $value-> orderCode ?>">Đơn hàng đã được xử lý - Đang vận chuyển</option>
                        <option value="2" id="<?php echo $value-> orderCode ?>">Hủy Đơn hàng</option>

                    </select>
                </td>
             </tr>
            </tbody>
          </table>


      </div>
    </div>

