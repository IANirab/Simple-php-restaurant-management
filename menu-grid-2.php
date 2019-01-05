<?php include "inc/header.php"; ?>
        <div class="page-container">
          <div data-bottom-top="background-position: 50% 50px;" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -50px;" class="page-title page-menu">
            <div class="container">


            <?php
            $id=3;
            $query = "select * from tbl_header where id='$id'";
            $post = $db->select($query);
            if($post){
                while($result = $post->fetch_assoc()){
            ?>
              <div class="title-wrapper">
                <div data-top="transform: translateY(0px);opacity:1;" data--20-top="transform: translateY(-5px);" data--50-top="transform: translateY(-15px);opacity:0.8;" data--120-top="transform: translateY(-30px);opacity:0;" data-anchor-target=".page-title" class="title"><?php echo $result['title']; ?></div>
                <div data-top="opacity:1;" data--120-top="opacity:0;" data-anchor-target=".page-title" class="divider"><span class="line-before"></span><span class="dot"></span><span class="line-after"></span></div>
                <div data-top="transform: translateY(0px);opacity:1;" data--20-top="transform: translateY(5px);" data--50-top="transform: translateY(15px);opacity:0.8;" data--120-top="transform: translateY(30px);opacity:0;" data-anchor-target=".page-title" class="subtitle"><?php echo $result['body']; ?></div>
              </div>
            <?php } } ?>

            </div>
          </div>
          <div class="page-content-wrapper">
            <section class="menu-grid-02 padding-top-100 padding-bottom-100">
              <div class="container">
                <div class="swin-sc swin-sc-product products-01 style-03 woocommerce">
                  <div class="row">
                    <div class="col-md-12">
                      <div data-slide-toshow="3" class="cat-wrapper-02 cat-images main-slider">

            <?php
            $query = "select * from tbl_fcat";
            $post = $db->select($query);
            if($post){
                while($result = $post->fetch_assoc()){
            ?>
                        <div class="item">
                          <div class="cat-image"><img src="assets/images/product/<?php echo $result['img']; ?>" alt="" class="img img-responsive"></div>
                        </div>
                      <?php } } ?>


                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="products nav-slider">
                        <div class="item-slick">
                          <div class="row">



            <?php
            $id = "breakfast";
            $query = "select * from tbl_food where cat='$id' AND abl='able' order by id desc";
            $post = $db->select($query);
            if($post){
                while($result = $post->fetch_assoc()){
            ?>
                            <div class="col-md-2 col-sm-4 col-xs-12">
                              <div class="item product-01">
                                <div class="block-img"><img style="width: 167px;" src="assets/images/product/<?php echo $result['img']; ?>" alt="">
                                  <div class="group-btn"><a target="_blank" href="assets/images/product/<?php echo $result['img']; ?>" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="product-single.php?id=<?php echo $result['id']; ?>" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a></div>
                                </div>
                                <h5 class="title"><?php echo $result['title']; ?></h5><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span><?php echo $result['price']; ?></span>
                              </div>
                            </div>
                          <?php } } ?>



                          </div>
                        </div>
                        <div class="item-slick">
                          <div class="row">

            <?php
            $id = "lunch";
            $query = "select * from tbl_food where cat='$id' AND abl='able' order by id desc";
            $post = $db->select($query);
            if($post){
                while($result = $post->fetch_assoc()){
            ?>
                            <div class="col-md-2 col-sm-4 col-xs-12">
                              <div class="item product-01">
                                <div class="block-img"><img style="width: 167px;" src="assets/images/product/<?php echo $result['img']; ?>" alt="">
                                  <div class="group-btn"><a target="_blank" href="assets/images/product/<?php echo $result['img']; ?>" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="product-single.php?id=<?php echo $result['id']; ?>" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a></div>
                                </div>
                                <h5 class="title"><?php echo $result['title']; ?></h5><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span><?php echo $result['price']; ?></span>
                              </div>
                            </div>
            <?php } } ?>


                          </div>
                        </div>
                        <div class="item-slick">
                          <div class="row">


            <?php
            $id = "dinner";
            $query = "select * from tbl_food where cat='$id' AND abl='able' order by id desc";
            $post = $db->select($query);
            if($post){
                while($result = $post->fetch_assoc()){
            ?>
                            <div class="col-md-2 col-sm-4 col-xs-12">
                              <div class="item product-01">
                                <div class="block-img"><img style="width: 167px;" src="assets/images/product/<?php echo $result['img']; ?>" alt="">
                                  <div class="group-btn"><a target="_blank" href="assets/images/product/<?php echo $result['img']; ?>" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="product-single.php?id=<?php echo $result['id']; ?>" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a></div>
                                </div>
                                <h5 class="title"><?php echo $result['title']; ?></h5><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span><?php echo $result['price']; ?></span>
                              </div>
                            </div>
            <?php } } ?>



                          </div>
                        </div>


                        <div class="item-slick">
                          <div class="row">


            <?php
            $id = "dessert";
            $query = "select * from tbl_food where cat='$id' AND abl='able' order by id desc";
            $post = $db->select($query);
            if($post){
                while($result = $post->fetch_assoc()){
            ?>
                            <div class="col-md-2 col-sm-4 col-xs-12">
                              <div class="item product-01">
                                <div class="block-img"><img style="width: 167px;" src="assets/images/product/<?php echo $result['img']; ?>" alt="">
                                  <div class="group-btn"><a target="_blank" href="assets/images/product/<?php echo $result['img']; ?>" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="product-single.php?id=<?php echo $result['id']; ?>" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a></div>
                                </div>
                                <h5 class="title"><?php echo $result['title']; ?></h5><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span><?php echo $result['price']; ?></span>
                              </div>
                            </div>
            <?php } } ?>



                          </div>
                        </div>



                                                <div class="item-slick">
                          <div class="row">


            <?php
            $id = "drink";
            $query = "select * from tbl_food where cat='$id' AND abl='able' order by id desc";
            $post = $db->select($query);
            if($post){
                while($result = $post->fetch_assoc()){
            ?>
                            <div class="col-md-2 col-sm-4 col-xs-12">
                              <div class="item product-01">
                                <div class="block-img"><img style="width: 167px;" src="assets/images/product/<?php echo $result['img']; ?>" alt="">
                                  <div class="group-btn"><a target="_blank" href="assets/images/product/<?php echo $result['img']; ?>" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="product-single.php?id=<?php echo $result['id']; ?>" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a></div>
                                </div>
                                <h5 class="title"><?php echo $result['title']; ?></h5><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span><?php echo $result['price']; ?></span>
                              </div>
                            </div>
            <?php } } ?>



                          </div>
                        </div>








                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>

  <?php
  $query = "select * from tbl_mflyer where id='1'";
  $post = $db->select($query);
  if($post){
    while($result = $post->fetch_assoc()){
  ?>
            <section class="menu-banner-section banner-section padding-top-100 padding-bottom-100"><img src="assets/images/background/<?php echo $result['img2']; ?>" alt="" class="img-left img-bg img-deco img-responsive"><img src="assets/images/background/<?php echo $result['img3']; ?>" alt="" class="img-right img-bg img-deco img-responsive">
              <div class="container">
                <div class="row">
                  <div class="col-md-8 col-md-offset-2">
                    <div class="content-wrapper">
                      <h2 class="heading-title"><?php echo $result['name']; ?></h2>
                      <div class="swin-btn-wrap"><a href="http://<?php echo $result['link']; ?>" class="swin-btn"><span>Book Table</span></a></div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
  <?php } } ?>


          </div>
        </div>


<?php include "inc/footer.php"; ?>