<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
             <!-- php sử dụng để hiện thẻ html thông báo -->
             <?php
                if($this->session->flashdata('success')){
                    ?>
                <div class="alert alert-success"> <?php echo $this->session->flashdata('success') ?></div>
                <?php
                }elseif($this->session->flashdata('error')){
                ?>
                <div class="alert alert-danger"> <?php echo $this->session->flashdata('error') ?></div>
            <?php
                }
            ?>
        
        <form action="<?php echo base_url('dang-nhap-nguoi-dung') ?>" method="POST">
        <!-- Email input -->
          <div class="form-outline mb-4">
              <label class="form-label" for="form3Example3">Địa chỉ Email</label>
            <input type="email" id="form3Example3" name="email" class="form-control form-control-lg"
              placeholder="Nhập địa chỉ Email của bạn" />
              <?php echo form_error('email'); ?>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <label class="form-label" for="form3Example4">Mật khẩu</label>
            <input type="password" id="form3Example4" name="password" class="form-control form-control-lg"
              placeholder="Nhập mật khẩu của bạn" />
              <?php echo form_error('password'); ?>
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="sumit"  class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Đăng nhập</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Bạn không có tài khoản?<a href="<?php echo base_url('dang-ky') ?>"
                class="link-danger">Đăng ký</a></p>
          </div>

        </form>
      </div>
    </div>
  </div>
  
  </div>
</section>