<div class="container mt-5">
    <h1 class="text-center text-uppercase">Thông tin Liên hệ</h1>
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