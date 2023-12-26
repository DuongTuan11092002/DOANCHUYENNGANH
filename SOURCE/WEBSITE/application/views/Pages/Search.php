  <!-- Hero Section Begin -->
  <section class="hero">
      <div class="container">
          <div class="row">
              <div class="col-lg-3">
                  <div class="hero__categories">
                      <div class="hero__categories__all">
                          <i class="fa fa-bars"></i>
                          <span>Tất cả các dòng xe</span>
                      </div>

                      <ul>
                          <?php
                            foreach ($Category as $key => $cate) {
                            ?>
                              <li><a href="<?php echo base_url('danh-muc/' . $cate->categoriesID . '/' . $cate->slug) ?>"><?php echo $cate->categoriesName ?></a></li>
                          <?php
                            }
                            ?>
                      </ul>
                  </div>
                  <br>
                  <div class="hero__categories">
                      <div class="hero__categories__all">
                          <i class="fa fa-bars"></i>
                          <span>Tất cả các hãng xe</span>
                      </div>

                      <ul>
                          <?php
                            foreach ($AutoMaker as $key => $autoMaker) {
                            ?>
                              <li><a href="<?php echo base_url('thuong-hieu/' . $autoMaker->autoMakerID . '/' . $autoMaker->slug)  ?>"><?php echo $autoMaker->autoMakerName ?></a></li>
                          <?php
                            }
                            ?>
                      </ul>
                  </div>

              </div>


              <div class="col-lg-9">
                  <div class="hero__search">
                      <div class="hero__search__form">
                          <form action="<?php echo base_url('tim-kiem') ?>">
                              <div class="hero__search__categories">
                                  All Categories
                                  <span class="arrow_carrot-down"></span>
                              </div>
                              <input type="text" name="keyword" placeholder="Tìm kiếm sản phẩm">
                              <button type="submit" class="site-btn">Tìm Kiếm</button>
                          </form>
                      </div>
                      <div class="hero__search__phone">
                          <div class="hero__search__phone__icon">
                              <i class="fa fa-phone"></i>
                          </div>
                          <div class="hero__search__phone__text">
                              <h5>0364.202.648</h5>
                              <span>Hỗ trợ 24/7</span>
                          </div>
                      </div>

                      <!-- Featured Section Begin -->
                      <section class="featured spad">
                          <div class="container">
                              <div class="row">
                                  <div class="col-lg-12">
                                      <div class="section-title">
                                          <h2>Tìm kiếm: <?php echo $title ?></h2>
                                      </div>

                                  </div>
                              </div>
                              <div class="row featured__filter">
                                  <?php
                                    foreach ($Product as $key => $pro) {
                                    ?>
                                      <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                                          <form action="<?php echo base_url('them-gio-hang') ?>" method="post">
                                              <div class="featured__item">
                                                  <input type="hidden" value="<?php echo $pro->productCarID ?>" name="product_id">
                                                  <input type="hidden" value="1" name="quantity">
                                                  <div class="featured__item__pic set-bg rounded">
                                                      <img src="<?php echo base_url('uploads/productCar/' . $pro->thumnail) ?>" alt="" width="100%" height="100%">
                                                      <ul class="featured__item__pic__hover">
                                                          <li><button href="#" class="btn btn-primary"><i class="fa fa-heart"></i></button></li>
                                                          <li><button href="#" class="btn btn-success"><i class="fa fa-retweet"></i></button></li>
                                                          <li><button type="submit" class="btn btn-warning"><i class="fa fa-shopping-cart"></i></button></li>
                                                      </ul>
                                                  </div>
                                                  <div class="featured__item__text">
                                                      <h6><a href="<?php echo base_url('san-pham/' . $pro->productCarID . '/' . $pro->slug) ?>" class="text-uppercase"><?php echo $pro->productCarName ?></a></h6>
                                                      <h5>Giá: <?php echo number_format($pro->price) . 'VNĐ' ?> </h5>
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
          </div>
      </div>
  </section>
  <!-- Hero Section End -->