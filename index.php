<?php include "inc/header.php"; ?>

        <div class="page-container">
          <div class="top-header top-slider layout-shop">



            <?php
            $query = "select * from tbl_slider order by id desc ";
            $post = $db->select($query);
            if($post){
                while($result = $post->fetch_assoc()){
            ?>
            <div class="slides">
              <div class="slide-content slide-layout-01">
                <div class="container">
                  <div class="row">
                    <div class="col-xs-6">
                      <div class="swin-sc swin-sc-title text-left">
                        <h3 data-ani-in="fadeInUp" data-ani-out="fadeOutDown" data-ani-delay="500" class="title animated fadeInUp"><?php echo $result['title']; ?></h3>
                        <h4 data-ani-in="fadeInUp" data-ani-out="fadeOutDown" data-ani-delay="1000" class="subtitle animated fadeInUp"><?php echo $result['body']; ?></h4>
                      </div>
                      <div data-ani-in="fadeInUp" data-ani-out="fadeOutDown" data-ani-delay="1200" class="btn-wrap text-left animated fadeInUp"><a href="http://<?php echo $result['link']; ?>" class="btn swin-btn btn-transparent"> <span>Read More</span></a></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="slide-bg"><img src="assets/images/slider/<?php echo $result['img']; ?>" alt="" class="img img-responsive"></div>
            </div>
          <?php } } ?>





          </div>
          <div class="page-content-wrapper">
            <div class="page-content no-padding">
              <section class="service-section-02 padding-top-100">
                <div class="container">
                  <div class="swin-sc swin-sc-iconbox">
                    <div class="row">
            <?php
            $query = "select * from tbl_services ";
            $post = $db->select($query);
            if($post){
                while($result = $post->fetch_assoc()){
            ?>
                      <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="item icon-box-02">
                          <div class="wrapper-icon"><?php echo $result['icon']; ?><span class="number"><?php echo $result['id']; ?></span></div>
                          <h4 class="title"><?php echo $result['name']; ?></h4>
                        </div>
                      </div>
            <?php } } ?>


                    </div>
                  </div>
                </div>
              </section>
              <section class="product-sesction-02 padding-top-120 padding-bottom-100">
                <div class="container">
                  <div class="swin-sc swin-sc-title">
                    <p class="top-title"><span>Popular Product</span></p>
                    <h3 class="title">Tasty And Good Price</h3>
                  </div>
                  <div class="swin-sc swin-sc-product products-02">
                    <div class="products nav-slider">
                      <div class="row">


            <?php
            $id="popular";
            $query = "select * from tbl_food where status='$id' AND abl='able' order by id desc limit 12";
            $post = $db->select($query);
            if($post){
                while($result = $post->fetch_assoc()){
            ?>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <div class="blog-item item swin-transition">
                            <div class="block-img"><img src="assets/images/product/<?php echo $result['img']; ?>" alt="" class="img img-responsive">
                              <div class="block-circle price-wrapper"><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span><?php echo $result['price']; ?></span></div>
                              <div class="group-btn"><a href="javascript:void(0)" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="javascript:void(0)" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a></div>
                            </div>
                            <div class="block-content">
                              <h5 class="title"><a href="product-single.php?id=<?php echo $result['id']; ?>"><?php echo $result['title']; ?></a></h5>
                              <div class="product-info">
                                <ul class="list-inline">
                                  <li class="author"><span>Chef</span><span class="text"><?php echo $result['author']; ?></span></li>
                                  
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
            <?php } } ?>


                      </div>
                    </div>
                  </div>
                </div>
              </section>
              <section>
                <div class="container">
                  <div class="row">

            <?php
            $id="popular";
            $query = "select * from tbl_banner order by id desc";
            $post = $db->select($query);
            if($post){
                while($result = $post->fetch_assoc()){
            ?>
                    <div class="col-md-6 col-xs-12">
                      <div class="swin-sc swin-sc-banner item">
                        <div class="banner-featured-img"><img src="assets/images/<?php echo $result['img']; ?>" alt="fooday" class="img img-responsive">
                          <div class="banner-content">
                            <div class="banner-title"><?php echo $result['title']; ?></div>
                            <div class="banner-subtitle"><?php echo $result['body']; ?></div><a href="http://<?php echo $result['link']; ?>" class="swin-btn"><span>Read More</span></a>
                          </div>
                        </div>
                      </div>
                    </div>
            <?php } } ?>

                  </div>
                </div>
              </section>
              <section class="padding-top-120 padding-bottom-100">
                <div class="container">
                  <div class="swin-sc swin-sc-title">
                    <p class="top-title"><span>New Product</span></p>
                    <h3 class="title">Lunch And Dinner</h3>
                  </div>
                  <div class="swin-sc swin-sc-product products-02 carousel-02">
                    <div class="products nav-slider">
                      <div class="row slick-padding">
            <?php
            $id="lunch";
            $query = "select * from tbl_food where cat='$id' AND abl='able' order by id desc limit 3";
            $post = $db->select($query);
            if($post){
                while($result = $post->fetch_assoc()){
            ?>

                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <div class="blog-item item swin-transition">
                            <div class="block-img"><img src="assets/images/product/<?php echo $result['img']; ?>" alt="" class="img img-responsive">
                              <div class="block-circle price-wrapper"><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span><?php echo $result['price']; ?></span></div>
                              <div class="group-btn"><a target="_blank" href="assets/images/product/<?php echo $result['img']; ?>" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="product-single.php?id=<?php echo $result['id']; ?>" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a></div>
                            </div>
                            <div class="block-content">
                              <h5 class="title"><a href="product-single.php?id=<?php echo $result['id']; ?>"><?php echo $result['title']; ?></a></h5>
                              <div class="product-info">
                                <ul class="list-inline">
                                  <li class="author"><span>Chef</span><span class="text"><?php echo $result['author']; ?></span></li>
                                  
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
            <?php } } ?>





            <?php
            $id="dinner";
            $query = "select * from tbl_food where cat='$id' AND abl='able' order by id desc limit 3";
            $post = $db->select($query);
            if($post){
                while($result = $post->fetch_assoc()){
            ?>

                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <div class="blog-item item swin-transition">
                            <div class="block-img"><img src="assets/images/product/<?php echo $result['img']; ?>" alt="" class="img img-responsive">
                              <div class="block-circle price-wrapper"><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span><?php echo $result['price']; ?></span></div>
                              <div class="group-btn"><a target="_blank" href="assets/images/product/<?php echo $result['img']; ?>" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="product-single.php?id=<?php echo $result['id']; ?>" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a></div>
                            </div>
                            <div class="block-content">
                              <h5 class="title"><a href="product-single.php?id=<?php echo $result['id']; ?>"><?php echo $result['title']; ?></a></h5>
                              <div class="product-info">
                                <ul class="list-inline">
                                  <li class="author"><span>Chef</span><span class="text"><?php echo $result['author']; ?></span></li>
                                  
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
            <?php } } ?>



                      </div>
                    </div>
                  </div>
                </div>
              </section>
              <section>
            <?php
            $query = "select * from tbl_offers ";
            $post = $db->select($query);
            if($post){
                while($result = $post->fetch_assoc()){
            ?>
<br>
<br>
<a style="text-align: center;" href="http://<?php echo $result['link']; ?>">
          <img style="width: 100%;" src="assets/images/background/<?php echo $result['img']; ?>">
</a>
<br>
<br>

<?php } } ?>
              </section>
              <section class="padding-bottom-100 padding-top-100">
                <div class="container">
                  <div data-item="5" class="swin-sc swin-sc-partner">
                    <div class="main-slider">
                      <div class="slides">
            <?php
            $query = "select * from tbl_partner1";
            $post = $db->select($query);
            if($post){
                while($result = $post->fetch_assoc()){
            ?>
                        <div class="item"><img src="assets/images/partner/<?php echo $result['img']; ?>" alt="fooday" class="img img-responsive"></div>
            <?php } } ?>

                      </div>
                    </div>
                  </div>
                </div>
              </section>
            </div>
          </div>
        </div>

<?php include "inc/footer.php"; ?>