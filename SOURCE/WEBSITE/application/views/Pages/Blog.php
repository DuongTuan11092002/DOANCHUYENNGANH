    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <?php
                foreach ($post_list as $key => $value) {
                ?>
                    <div class="col-lg-12 col-md-7 order-md-1 order-1">
                        <div class="blog__details__text">
                            <img src="<?php echo base_url('./frontend/img/blog/' . $value->image) ?>" alt="" width="100%">
                            <p><?php echo $value->description ?></p>
                            <h3><?php echo $value->title ?></h3>
                            <p class="text-justify"><?php echo $value->content ?></p>
                        </div>

                    </div>
            </div>

        <?php
                }
        ?>
        </div>
    </section>
    <!-- Blog Details Section End -->