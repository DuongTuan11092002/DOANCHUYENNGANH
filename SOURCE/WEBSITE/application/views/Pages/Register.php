<section class="vh-500 p-5" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">

            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">ĐĂNG KÝ</p>

                <form class="mx-1 mx-md-4" action="dang-ky-customer" method="POST">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example1c">Tên tài khoản</label>
                      <input type="text" id="form3Example1c" name="account" class="form-control" placeholder="vui lòng nhập tên không dấu không khoản cách" />
                      <?php echo form_error('account') ?>
                    </div>
                  </div>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example1c">Họ và tên</label>
                      <input type="text" id="form3Example1c" name="fullname" class="form-control" />
                      <?php echo form_error('fullname') ?>

                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example1c">Địa chỉ</label>
                      <input type="text" id="form3Example1c" name="address" class="form-control" />
                      <?php echo form_error('address') ?>

                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example1c">Số điện thoại</label>
                      <input type="text" id="form3Example1c" name="phone" class="form-control" />
                      <?php echo form_error('phone') ?>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example3c">Email của bạn</label>
                      <input type="email" id="form3Example3c" name="email" class="form-control" />
                      <?php echo form_error('email') ?>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example4c">Mật khẩu</label>
                      <input type="password" id="form3Example4c" name="password" class="form-control" />
                      <?php echo form_error('password') ?>
                    </div>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-primary btn-lg" onclick="showVerificationMessage()">Đăng ký</button>

                  </div>

                </form>


              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp" class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>