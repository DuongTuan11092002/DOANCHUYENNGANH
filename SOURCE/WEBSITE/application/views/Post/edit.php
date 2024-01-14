<div class="container">
    <div class="card">
        <div class="card-header text-uppercase text-center">
            Thêm bài viết
        </div>
        <div class="card-body">

            <a href="<?php echo base_url('Post/list') ?>" class="btn btn-success">Danh sách Bài viết</a>
            <a href="<?php echo base_url('Post/create') ?>" class="btn btn-success">Thêm Bài viết</a>

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
            <form action="<?php echo base_url('Post/update/' . $PostEdit->id) ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputNameCar">Tên Bài viết</label>
                    <input type="text" name="title" class="form-control" value="<?php echo $PostEdit->title ?>" id="slug" onkeyup="ChangeToSlug();">
                    <?php echo '<span class="text text-danger">' . form_error('title') . '</span>'; ?>

                </div>

                <div class="form-group">
                    <label for="exampleInputDescCar">Slug</label>
                    <input type="text" name="slug" value="<?php echo $PostEdit->slug ?>" class="form-control" id="convert_slug">
                    <?php echo '<span class="text text-danger">' . form_error('slug') . '</span>'; ?>
                </div>

                <div class="form-group">
                    <label for="exampleInputDescCar">Mô tả</label>
                    <!--<input type="text" name="productDesc" class="form-control" id="exampleInputDescCar" >-->
                    <textarea name="description" class="form-control" id="exampleInputDescCar" cols="500" rows="4"><?php echo $PostEdit->description ?></textarea>
                    <?php echo '<span class="text text-danger">' . form_error('description') . '</span>'; ?>
                </div>

                <div class="form-group">
                    <label for="exampleInputDescCar">Nội dung</label>
                    <!--<input type="text" name="productDesc" class="form-control" id="exampleInputDescCar" >-->
                    <textarea name="content" class="form-control" id="editor_post" cols="500" rows="10"><?php echo $PostEdit->content ?></textarea>
                    <?php echo '<span class="text text-danger">' . form_error('content') . '</span>'; ?>
                </div>

                <div class="form-group">
                    <label for="exampleInputDescCar">Nội dung ngắn:</label>
                    <!--<input type="text" name="productDesc" class="form-control" id="exampleInputDescCar" >-->
                    <textarea name="short_content" class="form-control" id="exampleInputDescCar" cols="500" rows="4"><?php echo $PostEdit->short_content ?></textarea>
                    <?php echo '<span class="text text-danger">' . form_error('short_content') . '</span>'; ?>
                </div>


                <div class="form-group">
                    <label for="exampleInputIMGCar">Hình ảnh</label>
                    <input type="file" name="image" class="form-control-file" id="exampleInputIMGCar">
                    <img src="<?php echo base_url('./frontend/img/blog/' . $PostEdit->image) ?>" alt="" width="200px" height="200px">
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
                                <option <?php echo $valueCategory->id == $PostEdit->category_id_blog ? 'selected' : '' ?> value="<?php echo $valueCategory->id ?>"> <?php echo $valueCategory->title ?></option>

                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputCategory">Trạng thái</label>
                    <select name="status" id="" class="form-control">
                        <?php
                        if ($PostEdit->status == 1) {
                        ?>
                            <option value="1" selected>Hiển thị</option>
                            <option value="0">Không hiển thị</option>
                        <?php
                        } else {
                        ?>
                            <option value="1">Hiển thị</option>
                            <option value="0" selected>Không hiển thị</option>

                        <?php
                        }
                        ?>
                    </select>
                </div>


                <button type="submit" class="btn btn-primary">Thêm</button>
            </form>
        </div>
    </div>
</div>