<div class="container">
    <div class="card">
        <div class="card-header text-uppercase text-center">
            Sửa Danh mục tin tức
        </div>
        <div class="card-body">
            <div class="">
                <a class="btn btn-primary" href="<?php echo base_url('Blog/list') ?>">Danh sách danh mục tin tức</a>
                <a class="btn btn-success ml-4" href="<?php echo base_url('Blog/create') ?>">Thêm danh mục tin tức</a>
                <hr>
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
            <form action="<?php echo base_url('Blog/update/' . $BlogID->id) ?>" method="POST" enctype="multipart/form-data">
                <!-- name -->
                <div class="form-group">
                    <label for="exampleInputCategory">Tên danh mục tin tức:</label>
                    <input type="text" name="title" class="form-control" value="<?php echo $BlogID->title ?>" id="slug" onkeyup="ChangeToSlug();">
                    <?php echo '<span class="text text-danger">' . form_error('title') . '</span>'; ?>
                </div>

                <div class="form-group">
                    <label for="exampleInputDesc">Mô tả:</label>
                    <textarea name="description" id="exampleInputDesc" class="form-control" cols="30" rows="10"><?php echo $BlogID->description ?></textarea>
                    <?php echo '<span class="text text-danger">' . form_error('description') . '</span>'; ?>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Hình ảnh</label>
                    <input type="file" name="productIMG" class="form-control-file" id="exampleInputPassword1">
                    <img src="<?php echo base_url('/frontend/img/blog/' . $BlogID->image) ?>" alt="toyota" width="150" height="150">
                    <small><?php if (isset($error)) {
                                echo $error;
                            } ?></small>

                </div>

                <div class="form-group">
                    <label for="exampleInputCategory">Slug</label>
                    <input type="text" name="slug" value="<?php echo $BlogID->slug ?>" class="form-control" id="convert_slug">
                    <?php echo '<span class="text text-danger">' . form_error('slug') . '</span>'; ?>
                </div>
                <div class="form-group">
                    <label for="exampleInputCategory">Trạng thái</label>
                    <select name="status" id="" class="form-control">
                        <option value="1" selected>Hiển thị</option>
                        <option value="0">Không hiển thị</option>
                    </select>
                </div>



                <button type="submit" class="btn btn-primary">Sửa</button>
            </form>

        </div>
    </div>
</div>