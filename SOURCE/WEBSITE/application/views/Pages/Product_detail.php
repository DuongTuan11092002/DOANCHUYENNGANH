  <!-- Chi tiết sản phẩm -->
  <section class="product-details spad">
      <div class="container">

          <div class="row">

              <!-- show chi tiết sản phẩm -->
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
                          <p class="font-italic text-dark">Số lượng hiện tại: <?php echo $detail->soluong ?> chiếc</p>


                          <!-- thông báo -->
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
  <!-- hết phần chi tiết sản phẩm -->

  <!-- Sản phẩm liên quan - BEGIN -->
  <section class="related-product">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <div class="section-title related__product__title">
                      <h2>SẢN PHẨM LIÊN QUAN</h2>
                  </div>
              </div>
          </div>
          <div class="row">
              <?php
                foreach ($Product_related as $key => $product) {
                ?>
                  <div class="col-lg-3 col-md-4 col-sm-6">
                      <form action="<?php echo base_url('them-gio-hang') ?>" method="post">
                          <div class="featured__item">
                              <input type="hidden" value="<?php echo $product->productCarID ?>" name="product_id">
                              <input type="hidden" value="1" name="quantity">
                              <div class="featured__item__pic set-bg rounded">
                                  <img src="<?php echo base_url('uploads/productCar/' . $product->thumnail) ?>" alt="" width="100%" height="100%">
                                  <ul class="featured__item__pic__hover">
                                      <li><button href="#" class="btn btn-primary"><i class="fa fa-heart"></i></button></li>
                                      <li><button href="#" class="btn btn-success"><i class="fa fa-retweet"></i></button></li>
                                      <li><button type="submit" class="btn btn-warning"><i class="fa fa-shopping-cart"></i></button></li>
                                  </ul>
                              </div>
                              <div class="featured__item__text">
                                  <h6><a href="<?php echo base_url('san-pham/' . $product->productCarID . '/' . $product->slug) ?>" class="text-uppercase"><?php echo $product->productCarName ?></a></h6>
                                  <h5>Giá: <?php echo number_format($product->price) . 'VNĐ' ?> </h5>
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
  <!-- Sản phẩm liên quan - END -->