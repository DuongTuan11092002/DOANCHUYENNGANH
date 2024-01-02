<div class="container">
    <div class="card">
        <div class="card-header text-uppercase text-center">
            Thêm Danh mục tin tức
        </div>
        <div class="card-body">
            <div class="">
                <a class="btn btn-success" href="<?php echo base_url('Blog/list') ?>">Danh sách danh mục tin tức</a>
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
            <form action="<?php echo base_url('Blog/formCreateBlog') ?>" method="POST" enctype="multipart/form-data">
                <!-- name -->
                <div class="form-group">
                    <label for="exampleInputCategory">Tên danh mục tin tức:</label>
                    <input type="text" name="title" class="form-control" id="slug" onkeyup="ChangeToSlug();">
                    <?php echo '<span class="text text-danger">' . form_error('title') . '</span>'; ?>
                </div>

                <div class="form-group">
                    <label for="exampleInputDesc">Mô tả:</label>
                    <textarea name="description" id="exampleInputDesc" class="form-control" cols="30" rows="10"></textarea>
                    <?php echo '<span class="text text-danger">' . form_error('description') . '</span>'; ?>
                </div>

                <div class="form-group">
                    <label for="exampleInputIMGBlog">Hình ảnh</label>
                    <input type="file" name="image" class="form-control-file" id="exampleInputIMGBlogs">
                    <small><?php if (isset($error)) {
                                echo $error;
                            } ?></small>

                </div>

                <div class="form-group">
                    <label for="exampleInputCategory">Slug</label>
                    <input type="text" name="slug" class="form-control" id="convert_slug">
                    <?php echo '<span class="text text-danger">' . form_error('slug') . '</span>'; ?>
                </div>
                <div class="form-group">
                    <label for="exampleInputCategory">Trạng thái</label>
                    <select name="status" id="" class="form-control">
                        <option value="1" selected>Hiển thị</option>
                        <option value="0">Không hiển thị</option>
                    </select>
                </div>



                <button type="submit" class="btn btn-primary">Thêm</button>
            </form>

        </div>
    </div>
</div>