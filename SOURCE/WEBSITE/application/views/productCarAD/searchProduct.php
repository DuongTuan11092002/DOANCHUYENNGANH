<form method="GET" action="<?php echo base_url('search-product') ?>" class="mt-4 pl-4 mb-4">
    <label for="">Tìm kiếm sản phẩm xe</label>
    <input type="text" name="keyword" placeholder="Tìm kiếm">
    <button type="submit" class="btn btn-primary">TÌM KIẾM</button>
</form>

<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col" style="width:300px;">Mô tả</th>
            <th scope="col">Slug</th>
            <th scope="col">Giá</th>
            <th scope="col">Ngày Tạo</th>
            <th scope="col">Hãng</th>
            <th scope="col">danh mục</th>
            <th scope="col">Hình ảnh</th>
            <th scope="col">Tình trạng</th>
            <th scope="col">Quản lý</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        foreach ($Products as $key  => $value) {
            $i++;
        ?>
            <tr>
                <th scope="row"><?php echo $i ?></th>
                <td><?php echo $value->productCarName ?></td>
                <td class="an"><?php echo $value->description ?></td>
                <td><?php echo $value->slug ?></td>
                <td><?php echo number_format($value->price) . 'VND' ?></td>
                <td><?php echo $value->create_at ?></td>
                <td><?php echo $value->tenhang ?></td>
                <td><?php echo $value->tendanhmuc ?></td>

                <td>
                    <img src="<?php echo base_url('/uploads/productCar/' . $value->thumnail) ?>" alt="" width="150" height="150">
                </td>
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
                    <a href="<?php echo base_url('productCar/edit/' . $value->productCarID) ?>" class="btn btn-warning">Sửa</a><br> <br>
                    <a onclick="return confirm('Bạn chắc chắn muốn xóa không?')" href="<?php echo base_url('productCar/delete/' . $value->productCarID) ?>" class="btn btn-danger">Xóa</a>

                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>