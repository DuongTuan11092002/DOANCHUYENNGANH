<!-- tip:
  nếu danh sách không hiện là do xem các khóa ngoại có dữ liệu chưa không có thì thêm dữ liệu vào sẽ hiện
 -->
<div class="card">
    <div class="card-header text-uppercase text-center">
        danh sách Blog
    </div>
    <div class="card-body">
        <div class="">
            <a href="<?php echo base_url('Blog/create') ?>" class="btn btn-success">Thêm Blog</a>
            <hr>
        </div>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tên danh mục tin</th>
                    <th scope="col" style="width:300px;">Mô tả</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Tình trạng</th>
                    <th scope="col">Quản lý</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                foreach ($category_blog as $key  => $value) {
                    $i++;
                ?>
                    <tr>
                        <th scope="row"><?php echo $i ?></th>
                        <td><?php echo $value->title ?></td>
                        <td><?php echo $value->description ?></td>
                        <td><?php echo $value->slug ?></td>

                        <td>
                            <img src="<?php echo base_url('/frontend/img/blog/' . $value->image) ?>" alt="" width="150" height="150">
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
                            <a href="<?php echo base_url('Blog/edit/' . $value->id) ?>" class="btn btn-warning">Sửa</a><br> <br>
                            <a onclick="return confirm('Bạn chắc chắn muốn xóa không?')" href="<?php echo base_url('Blog/delete/' . $value->id) ?>" class="btn btn-danger">Xóa</a>

                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>


    </div>
</div>