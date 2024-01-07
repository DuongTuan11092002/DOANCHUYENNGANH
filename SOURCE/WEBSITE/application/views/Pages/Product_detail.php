  <!-- Product Details Section Begin -->
  <section class="product-details spad">
      <div class="container">
          <div class="row">
              <?php
                foreach ($Product_Detail as $key => $detail) {
                ?>
                  <div class="col-lg-6 col-md-6">
                      <div class="product__details__pic">
                          <div class="product__details__pic__item">
                              <img class="product__details__pic__item--large" src="<?php echo base_url('uploads/libraryDetail/' . $detail->images) ?>" alt="">
                          </div>

                      </div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                      <div class="product__details__text">
                          <h3><?php echo $detail->productCarDetailName ?></h3>


                          <div class="product__details__price"><?php echo number_format($detail->giasanpham) . ' VNĐ' ?></div>
                          <p><?php echo $detail->motasanpham ?></p>

                          <form action="<?php echo base_url('them-gio-hang') ?>" method="post">
                              <input type="hidden" value="<?php echo $detail->productCarID ?>" name="product_id">
                              <div class="product__details__quantity">
                                  <div class="quantity">
                                      <div class="pro-qty">
                                          <input type="text" value="1" name="quantity">
                                      </div>
                                  </div>
                              </div>
                              <input type="submit" class="primary-btn rounded" value="ĐẶT HÀNG">

                          </form>

                      </div>
                  </div>
                  <div class="col-lg-12">
                      <div class="product__details__tab">
                          <ul class="nav nav-tabs" role="tablist">
                              <li class="nav-item">
                                  <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab" aria-selected="true">Động cơ</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab" aria-selected="false">Nội thất</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab" aria-selected="false">Công nghệ </a>
                              </li>
                          </ul>
                          <div class="tab-content">
                              <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                  <div class="product__details__tab__desc">
                                      <h6 class="text-uppercase">Động cơ</h6>
                                      <p class="text-justify"><?php echo $detail->productCarDetailTextEngine ?></p>
                                  </div>
                              </div>
                              <div class="tab-pane" id="tabs-2" role="tabpanel">
                                  <div class="product__details__tab__desc">
                                      <h6 class="text-uppercase">Nội Thất</h6>
                                      <p class="text-justify"><?php echo $detail->productCarDetailTextInterio ?></p>

                                  </div>
                              </div>
                              <div class="tab-pane" id="tabs-3" role="tabpanel">
                                  <div class="product__details__tab__desc">
                                      <h6 class="text-uppercase">Công nghệ</h6>
                                      <p class="text-justify"><?php echo $detail->productCarDetailTextTechniques ?></p>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              <?php
                }
                ?>
          </div>
      </div>
  </section>
  <!-- Product Details Section End -->

  <!-- Related Product Section Begin -->
  <section class="related-product">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <div class="section-title related__product__title">
                      <h2>SẢN PHẨM XE KHÁC</h2>
                  </div>
              </div>
          </div>
          <div class="row">
              <?php
                foreach ($Product_related as $key => $product) {
                ?>
                  <div class="col-lg-3 col-md-4 col-sm-6">
                      <div class="product__item <?php echo $key == 0 ? 'active' : '' ?>">
                          <div class="product__item__pic set-bg" data-setbg="<?php echo base_url('uploads/productCar/' . $product->thumnail) ?>">
                              <ul class="product__item__pic__hover">
                                  <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                  <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                  <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                              </ul>
                          </div>
                          <div class="product__item__text">
                              <h6><a href="<?php echo base_url('san-pham/' . $product->productCarID . '/' . $product->slug) ?>"><?php echo $product->productCarName ?></a></h6>
                              <h5><?php echo number_format($product->price) . ' VNĐ' ?></h5>
                          </div>
                      </div>
                  </div>
              <?php
                }
                ?>

          </div>
      </div>
  </section>
  <!-- Related Product Section End -->