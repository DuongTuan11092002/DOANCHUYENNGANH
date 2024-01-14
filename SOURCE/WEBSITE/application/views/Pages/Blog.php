    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-md-7 order-md-1 order-1">
                    <div class="blog__details__text">
                        <img src="<?php echo base_url('./frontend/img/blog/' . $post_with_id->image) ?>" alt="" width="100%">
                        <p><?php echo $post_with_id->description ?></p>
                        <h3><?php echo $post_with_id->title ?></h3>
                        <p class="text-justify"><?php echo $post_with_id->content ?></p>
                    </div>

                </div>

            </div>

        </div>
    </section>
    <!-- Blog Details Section End -->