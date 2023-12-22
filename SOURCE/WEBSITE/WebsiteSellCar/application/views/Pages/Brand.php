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
                                foreach($Category as $key => $cate ) {
                            ?>
                            <li><a href="<?php echo base_url('danh-muc/'.$cate -> categoriesID ) ?>"><?php echo $cate -> categoriesName ?></a></li>
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
                                foreach($AutoMaker as $key => $autoMaker ) {
                            ?>
                            <li><a href="<?php echo base_url('thuong-hieu/'.$autoMaker -> autoMakerID )  ?>"><?php echo $autoMaker -> autoMakerName ?></a></li>
                            <?php
                                }
                            ?>
                        </ul>
                </div>

                </div>
                

                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
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
                        <h2>THƯƠNG HIỆU: <?php echo $title ?></h2>
                    </div>
                   
                </div>
            </div>
            <div class="row featured__filter">
                <?php
                            foreach ($AutoMaker_Product as $key => $autoMaker_productCar) {
                                ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg rounded" >
                            <img src="<?php echo base_url('uploads/productCar/'.$autoMaker_productCar -> thumnail) ?>" alt="" width="100%" height="100%">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="<?php echo base_url('san-pham/'. $autoMaker_productCar -> productCarID) ?>" class="text-uppercase"><?php echo $autoMaker_productCar -> productCarName ?></a></h6>
                            <h5>Giá: <?php echo number_format($autoMaker_productCar-> price).'VNĐ' ?> </h5>
                        </div>
                    </div>
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

