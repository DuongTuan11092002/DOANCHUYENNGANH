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
                              <h2>Dòng xe: <?php echo $title ?></h2>
                          </div>

                      </div>
                  </div>

                  <div class="row">
                      <h6>Lọc sản phẩm:</h6>
                      <div class="col-md-5">
                          <div class="form-group">
                              <select class="form-control select-filter mt-2" name="" id="select-filter">
                                  <option value="0">Lọc theo</option>
                                  <option value="?kytu=asc">Ký tự A-Z</option>
                                  <option value="?kytu=desc">Ký tự Z-A</option>
                                  <option value="?gia=asc">Giá Tăng dần</option>
                                  <option value="?gia=desc">Giá giảm dần</option>
                              </select>
                          </div>
                      </div>

                      <div class="col-md-5">
                          <form method="get">
                              <p>
                                  <label for="amount">Lọc giá:</label>
                                  <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold; width:80%;">
                              </p>
                              <div id="slider-range"></div>
                              <input type="hidden" class="price_from" name="from">
                              <input type="hidden" class="price_to" name="to">

                              <input type="submit" value="Lọc giá" class="btn btn-primary filter-price mt-3">
                          </form>
                      </div>
                  </div>
                  <div class="row featured__filter mt-4">
                      <?php
                        foreach ($Category_Product as $key => $category_productCar) {
                        ?>
                          <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                              <form action="<?php echo base_url('them-gio-hang') ?>" method="post">
                                  <div class="featured__item">
                                      <input type="hidden" value="<?php echo $category_productCar->productCarID ?>" name="product_id">
                                      <input type="hidden" value="1" name="quantity">
                                      <div class="featured__item__pic set-bg rounded">
                                          <img src="<?php echo base_url('uploads/productCar/' . $category_productCar->thumnail) ?>" alt="" width="100%" height="100%">
                                          <ul class="featured__item__pic__hover">
                                              <li><button href="#" class="btn btn-primary"><i class="fa fa-heart"></i></button></li>
                                              <li><button href="#" class="btn btn-success"><i class="fa fa-retweet"></i></button></li>
                                              <?php
                                                if ($category_productCar->quantity > 0) {
                                                ?>
                                                  <li><button type="submit" class="btn btn-warning"><i class="fa fa-shopping-cart"></i></button></li>
                                              <?php
                                                }
                                                ?>

                                          </ul>
                                      </div>
                                      <div class="featured__item__text">
                                          <h6><a href="<?php echo base_url('san-pham/' . $category_productCar->productCarID . '/' . $category_productCar->slug) ?>" class="text-uppercase"><?php echo $category_productCar->productCarName ?></a></h6>
                                          <h5>Giá: <?php echo number_format($category_productCar->price) . 'VNĐ' ?> </h5>
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
  </section>
  <!-- Hero Section End -->