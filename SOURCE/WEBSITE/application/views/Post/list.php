<!-- tip:
  nếu danh sách không hiện là do xem các khóa ngoại có dữ liệu chưa không có thì thêm dữ liệu vào sẽ hiện
 -->
<div class="card">
    <div class="card-header text-uppercase text-center">
        danh sách Bài viết
    </div>
    <div class="card-body">
        <div class="">
            <a href="<?php echo base_url('Post/create') ?>" class="btn btn-success">Thêm bài viết</a>
            <hr>
        </div>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tên bài viết</th>
                    <th scope="col" style="width:300px;">Mô tả</th>
                    <th scope="col">Slug</th>
                    <th scope="col">nội dung</th>
                    <th scope="col">Nội dung ngắn</th>
                    <th scope="col">danh mục</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Tình trạng</th>
                    <th scope="col">Quản lý</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                foreach ($Posts as $key  => $value) {
                    $i++;
                ?>
                    <tr>
                        <th scope="row"><?php echo $i ?></th>
                        <td><?php echo $value->title ?></td>
                        <td class="an"><?php echo $value->description ?></td>
                        <td><?php echo $value->slug ?></td>
                        <td class="anPost"><?php echo $value->content ?></td>
                        <td class="an"><?php echo $value->short_content ?></td>
                        <td><?php echo $value->tendanhmucbaiviet ?></td>

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
                            <a href="<?php echo base_url('Post/edit/' . $value->id) ?>" class="btn btn-warning">Sửa</a><br> <br>
                            <a onclick="return confirm('Bạn chắc chắn muốn xóa không?')" href="<?php echo base_url('Post/delete/' . $value->id) ?>" class="btn btn-danger">Xóa</a>

                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>


    </div>
</div>