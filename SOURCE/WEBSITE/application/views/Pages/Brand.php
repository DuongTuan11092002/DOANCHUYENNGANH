  <!-- Hero Section Begin -->
  <section class="hero">
      <div class="container">
          <div class="row">
              <?php
                $this->load->view('Pages/Template/Sidebar');
                ?>

          </div>

          <!-- Featured Section Begin -->
          <section class="featured spad">
              <div class="container">
                  <div class="row">
                      <div class="col-lg-12">
                          <div class="section-title">
                              <h2>THƯƠNG HIỆU: <?php echo $title ?></h2>
                          </div>

                      </div>
                  </div>

                  <div class="row">
                      <div class="col-md-3">
                          <h4>Lộc Sản phẩm: </h4>
                          <div class="form-group mt-2">
                              <select class="form-control select-filter" name="" id="select-filter">
                                  <option value="0">Lọc theo</option>
                                  <option value="?kytu=asc">Ký tự A-Z</option>
                                  <option value="?kytu=desc">Ký tự Z-A</option>
                                  <option value="?gia=asc">Giá Tăng dần</option>
                                  <option value="?gia=desc">Giá giảm dần</option>
                              </select>
                          </div>
                      </div>
                  </div>
                  <div class="row featured__filter mt-4">
                      <?php
                        foreach ($AutoMaker_Product as $key => $autoMaker_productCar) {
                        ?>
                          <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                              <form action="<?php echo base_url('them-gio-hang') ?>" method="post">
                                  <div class="featured__item">
                                      <div class="featured__item__pic set-bg rounded">
                                          <input type="hidden" value="<?php echo $autoMaker_productCar->productCarID ?>" name="product_id">
                                          <input type="hidden" value="1" name="quantity">

                                          <img src="<?php echo base_url('uploads/productCar/' . $autoMaker_productCar->thumnail) ?>" alt="" width="100%" height="100%">
                                          <ul class="featured__item__pic__hover">
                                              <li><button href="#" class="btn btn-primary"><i class="fa fa-heart"></i></button></li>
                                              <li><button href="#" class="btn btn-success"><i class="fa fa-retweet"></i></button></li>
                                              <li><button type="submit" class="btn btn-warning"><i class="fa fa-shopping-cart"></i></button></li>
                                          </ul>
                                      </div>
                                      <div class="featured__item__text">
                                          <h6><a href="<?php echo base_url('san-pham/' . $autoMaker_productCar->productCarID . '/' . $autoMaker_productCar->slug) ?>" class="text-uppercase"><?php echo $autoMaker_productCar->productCarName ?></a></h6>
                                          <h5>Giá: <?php echo number_format($autoMaker_productCar->price) . 'VNĐ' ?> </h5>
                                      </div>
                                  </div>
                              </form>
                          </div>
                      <?php
                        }
                        ?>

                  </div>
              </div>
          </section>

      </div>
      </div>
  </section>
  <!-- Hero Section End -->