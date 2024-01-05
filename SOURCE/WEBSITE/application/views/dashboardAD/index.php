<div class="container mt-5">
    <div class="row">

        <div class="col-md-6">

            <h3 class=" text-uppercase">Thông tin đơn hàng</h3>
            <div class="col-md-12">

                <p>Tổng đơn hàng chưa xử lý: <?php echo $donhang_chuaxuly; ?> Đơn hàng</p>

            </div>

            <div class="col-md-12">
                <p class="bg-success">Tổng đơn hàng đã xử lý: <?php echo $donhang_daxuly; ?> Đơn hàng</p>

            </div>
        </div>

        <div class="col-md-6">
            <h3 class="text-uppercase">Tổng số tài khoản khách hàng</h3>
            <div class="col-md-12">

                <p>Tổng tài khoản Khách hàng : <?php echo $count_user; ?></p>

            </div>
        </div>

    </div>


    <h3 class="text-center text-uppercase mt-5">Thông tin Liên hệ</h3>
    <table class="table mt-5">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Email</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Quản lý</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach ($contact as $key => $value) {
                $i++;
            ?>
                <tr>
                    <th scope="row"><?php echo $i ?></th>
                    <td><?php echo $value->email ?></td>
                    <td><?php echo $value->phone ?></td>
                    <td><?php echo $value->address ?></td>

                    <td>
                        <a onclick="return confirm('Bạn chắc chắn muốn xóa không?')" href="<?php echo base_url('dashboard/delete/' . $value->contactID) ?>" class="btn btn-danger">Xóa</a>
                    </td>

                </tr>
            <?php
            }
            ?>

        </tbody>
    </table>


</div>