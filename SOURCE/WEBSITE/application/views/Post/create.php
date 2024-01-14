<div class="container">
    <div class="card">
        <div class="card-header text-uppercase text-center">
            Thêm bài viết
        </div>
        <div class="card-body">

            <a href="<?php echo base_url('Post/list') ?>" class="btn btn-success">Danh sách Bài viết</a>

            <hr>
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
            <form action="<?php echo base_url('Post/formCreatePost') ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputNameCar">Tên Bài viết</label>
                    <input type="text" name="title" class="form-control" id="slug" onkeyup="ChangeToSlug();">
                    <?php echo '<span class="text text-danger">' . form_error('title') . '</span>'; ?>

                </div>

                <div class="form-group">
                    <label for="exampleInputDescCar">Slug</label>
                    <input type="text" name="slug" class="form-control" id="convert_slug">
                    <?php echo '<span class="text text-danger">' . form_error('slug') . '</span>'; ?>
                </div>

                <div class="form-group">
                    <label for="exampleInputDescCar">Mô tả</label>
                    <!--<input type="text" name="productDesc" class="form-control" id="exampleInputDescCar" >-->
                    <textarea name="description" class="form-control" id="exampleInputDescCar" cols="500" rows="4"></textarea>
                    <?php echo '<span class="text text-danger">' . form_error('description') . '</span>'; ?>
                </div>

                <div class="form-group">
                    <label for="exampleInputDescCar">Nội dung</label>
                    <!--<input type="text" name="productDesc" class="form-control" id="exampleInputDescCar" >-->
                    <textarea name="content" class="form-control" id="editor_post" cols="500" rows="4"></textarea>
                    <?php echo '<span class="text text-danger">' . form_error('content') . '</span>'; ?>
                </div>

                <div class="form-group">
                    <label for="exampleInputDescCar">Nội dung ngắn:</label>
                    <!--<input type="text" name="productDesc" class="form-control" id="exampleInputDescCar" >-->
                    <textarea name="short_content" class="form-control" id="exampleInputDescCar" cols="500" rows="4"></textarea>
                    <?php echo '<span class="text text-danger">' . form_error('short_content') . '</span>'; ?>
                </div>


                <div class="form-group">
                    <label for="exampleInputIMGCar">Hình ảnh</label>
                    <input type="file" name="image" class="form-control-file" id="exampleInputIMGCar">
                    <small><?php if (isset($error)) {
                                echo $error;
                            } ?></small>

                </div>




                <div class="form-group">
                    <div class="form-group">
                        <label for="exampleFormControllSelect2">Danh mục</label>
                        <select name="category_id_blog" class="form-control" id="exampleFormControllSelect2">
                            <?php
                            foreach ($Category_blog as $key => $valueCategory) {
                            ?>
                                <option value="<?php echo $valueCategory->id ?>"> <?php echo $valueCategory->title ?></option>

                            <?php
                            }
                            ?>
                        </select>
                    </div>
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