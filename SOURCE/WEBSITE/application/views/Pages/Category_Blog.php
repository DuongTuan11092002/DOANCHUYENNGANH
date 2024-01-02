    <!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">

            <div class="row">
                <?php
                $this->load->view('Pages/Template/Sidebar')
                ?>


                <div class="col-lg-12 mt-4">
                    <div class="section-title">
                        <h2>Tin tức: <?php echo $title ?></h2>
                    </div>

                </div>
                <div class="col-lg-8 col-md-7">

                    <div class="row">
                        <?php
                        foreach ($Category_blog_with_id as $key => $value) {
                        ?>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="blog__item">
                                    <div class="blog__item__pic">
                                        <img src="<?php echo base_url('./frontend/img/blog/' . $value->image) ?>" alt="">
                                    </div>
                                    <div class="blog__item__text">

                                        <h5><a href="#"><?php echo $value->title ?></a></h5>
                                        <p><?php echo $value->short_content ?> </p>

                                        <a href="<?php echo base_url('bai-viet/' . $value->id . '/' . $value->slug) ?>" class="blog__btn">Xem thêm <span class="arrow_right"></span></a>


                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->