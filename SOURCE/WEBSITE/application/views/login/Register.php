<div class="container mt-5">
    <h1 class="text-center">Đăng ký tài khoản</h1>

    <!-- php sử dụng để hiện thẻ html thông báo -->
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




    <form method="POST" action="<?php echo base_url('registerInsert') ?>">

        <div class="form-group">
            <label for="exampleInputEmail1">Tài khoản</label>
            <input type="text" name="account" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Vui lòng nhập tên tài khoản">
            <?php echo form_error('account'); ?>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Địa chỉ Email</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <?php echo form_error('email'); ?>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Mật khẩu</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            <?php echo form_error('password'); ?>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Họ và Tên</label>
            <input type="text" name="fullname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Vui lòng nhập họ và tên">
            <?php echo form_error('fullname'); ?>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Địa chỉ</label>
            <input type="text" name="address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Vui lòng nhập địa chỉ">
            <?php echo form_error('address'); ?>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Số điện thoại</label>
            <input type="text" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Vui lòng nhập số điện thoại">
            <?php echo form_error('phone'); ?>
        </div>

        <input type="submit" value="Đăng ký" class="btn btn-primary">

        <a href="<?php echo base_url('login') ?>" class="btn btn-warning">Quay về trang đăng nhập</a>
    </form>
</div>