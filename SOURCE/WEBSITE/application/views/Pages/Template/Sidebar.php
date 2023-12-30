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
            <form method="GET" action="<?php echo base_url('tim-kiem') ?>">
                <div class="hero__search__categories">
                    All Categories
                    <span class="arrow_carrot-down"></span>
                </div>
                <input type="text" name="keyword" placeholder="Tìm kiếm sản phẩm">
                <button type="submit" class="site-btn">TÌM KIẾM</button>
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
    </div>
    <div class="hero__item set-bg" data-setbg="<?php echo base_url('frontend/img/banner/banner.jpg') ?>">
        <div class="hero__text">
            <span>Xe Hay</span>
            <h2>Xe hơi<br />100% Mới</h2>
            <p>Mua xe ngay và nhận ữu đãi hấp dẫn</p>
        </div>
    </div>
</div>