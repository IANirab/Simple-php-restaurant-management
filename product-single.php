<?php include "inc/header.php"; ?>
        <div class="page-container">
          <div data-bottom-top="background-position: 50% 50px;" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -50px;" class="page-title page-product">
            <div class="container">
            <?php
            $id=$_GET['id'];
            $query = "select * from tbl_food where id='$id'";
            $post = $db->select($query);
            if($post){
                while($result = $post->fetch_assoc()){
            ?>
              <div class="title-wrapper">
                <div data-top="transform: translateY(0px);opacity:1;" data--20-top="transform: translateY(-5px);" data--50-top="transform: translateY(-15px);opacity:0.8;" data--120-top="transform: translateY(-30px);opacity:0;" data-anchor-target=".page-title" class="title"><?php echo $result['title']; ?></div>
                <div data-top="opacity:1;" data--120-top="opacity:0;" data-anchor-target=".page-title" class="divider"><span class="line-before"></span><span class="dot"></span><span class="line-after"></span></div>
                <?php } } ?>
              </div>
            </div>
          </div>
          <div class="page-content-wrapper">
            <div class="container">
          <?php
          $id = $_GET['id'];
          $query = "select * from tbl_food WHERE id='$id'";
          $post = $db->select($query);
          if($post){
              while($result = $post->fetch_assoc()){
          ?>


              <section class="product-single padding-top-100 padding-bottom-100">
                <div class="row">
                  <div class="col-md-6">
                    <div class="product-image">
                      <div class="product-featured-image">
                        <div class="main-slider">
                          <div class="slides">
                            <div class="featured-image-item"><img src="assets/images/product/<?php echo $result['img']; ?>" alt="fooday" class="img img-responsive"></div>
                            <!--
                            <div class="featured-image-item"><img src="assets/images/product/product-full-03.jpg" alt="fooday" class="img img-responsive"></div>
                            <div class="featured-image-item"><img src="assets/images/product/product-full-04.jpg" alt="fooday" class="img img-responsive"></div>
                            <div class="featured-image-item"><img src="assets/images/product/product-full-02.jpg" alt="fooday" class="img img-responsive"></div>
                            <div class="featured-image-item"><img src="assets/images/product/product-full-03.jpg" alt="fooday" class="img img-responsive"></div>
                          -->
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="product-summary">
                      <div class="product-title">
                        <div class="title"><?php echo $result['title']; ?></div>
                      </div>
                      <div class="product-price">
                        <div class="price"><span class="currency-symbol">$</span><?php echo $result['price']; ?></div>
                      </div>
                      <div class="product-info">
                        <ul class="list-inline">
                          <li class="author"><span>Chef</span><span class="text"><?php echo $result['author']; ?></span></li>
                          
                        </ul>
                      </div>
                      <div class="product-desc">
                        <p><?php echo $result['body']; ?></p>
                      </div>
                      <div class="product-meta-info">
                        <div class="meta-info-item">
                          <div class="meta-info-caption">Category:</div>
                          <div class="meta-info-text"><a><?php echo $result['cat']; ?></a></div>
                        </div>
                        <div class="meta-info-item">
                          <div class="meta-info-caption">Tags:</div>
                          <div class="meta-info-text"><?php echo $result['tags']; ?></div>
                        </div>
                      </div>
                      <div class="product-quanlity">



                        <form action="?action=add&id=<?php echo $result['id']; ?>" method="post">
                          <div class="input-group">
                             <input type="number" name="quantity" placeholder="" value="1" min="1" max="5" class="form-control"> 
                          </div>
                          <input type="hidden" value="<?php echo $result['id']; ?>" name="hidden_id">
                          <input type="hidden" value="<?php echo $result['img']; ?>" name="hidden_img">
                          <input type="hidden" value="<?php echo $result['title']; ?>" name="hidden_name">
                          <input type="hidden" value="<?php echo $result['price']; ?>" name="hidden_price">
<div class="add-to-cart"><button type="submit" name="addcart" class="swin-btn"><span>Add To Cart</span></button></div>
                        </form>



                      </div>
                      <div class="product-share"><span class="caption">Share</span>
                        <ul class="socials list-unstyled list-inline">
                          <li><a href="https://www.facebook.com/sharer/sharer.php?u=http://<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>"><i style="color: #c7c7c7 !important;" class="fa fa-facebook"></i></a></li>
                          <li><a href="https://twitter.com/home?status=http://<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>"><i style="color: #c7c7c7 !important;" class="fa fa-twitter"></i></a></li>
                          <li><a href="https://pinterest.com/pin/create/button/?url=<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>"><i style="color: #c7c7c7 !important;" class="fa fa-pinterest"></i></a></li>
                          <li><a href="https://plus.google.com/share?url=<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>"><i style="color: #c7c7c7 !important;" class="fa fa-google-plus"></i></a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                  <div class="row">
                  <div class="col-md-12">
                    <div class="product-tab-content">
                      <!-- Nav tabs-->
                      <ul role="tablist" class="nav nav-tabs">
                        <li role="presentation" class="active"><a href="#product-desc-tab" aria-controls="product-desc-tab" role="tab" data-toggle="tab">DESCRIPTIONS</a></li>
                        
                      </ul>
                      <!-- Tab panes-->
                      <div class="tab-content">
                        <div id="product-desc-tab" role="tabpanel" class="tab-pane active">
                          <p><?php echo $result['body2']; ?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
<?php } } ?>



              <section class="product-related padding-bottom-100">
                <div class="swin-sc swin-sc-title style-2">
                  <p class="title"><span>You May Also Like</span></p>
                </div>
                <div class="swin-sc swin-sc-product products-02 carousel-01 woocommerce">
                  <div class="products nav-slider">

          <?php
          $query = "select * from tbl_food where abl='able' order by id desc";
          $post = $db->select($query);
          if($post){
              while($result = $post->fetch_assoc()){
          ?>

                    <div class="blog-item item swin-transition">
                      <div class="block-img"><img src="assets/images/product/<?php echo $result['img']; ?>" alt="" class="img img-responsive">
                        <div class="block-circle price-wrapper"><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span><?php echo $result['price']; ?></span></div>
                        <div class="group-btn"><a target="_blank" href="assets/images/product/<?php echo $result['img']; ?>" class="swin-btn btn-link"><i class="icons fa fa-link"></i></a><a href="product-single.php?id=<?php echo $result['id']; ?>" class="swin-btn btn-add-to-card"><i class="fa fa-shopping-basket"></i></a></div>
                      </div>
                      <div class="block-content">
                        <h5 class="title"><a href="product-single.php?id=<?php echo $result['id']; ?>"><?php echo $result['title']; ?></a></h5>
                        <div class="info">
                          <div class="author">Chef <span class="name"><?php echo $result['author']; ?></span></div>
                          <div class="star-rating"><span style="width:80%" class="rating"><strong class="rating"></strong></span></div>
                        </div>
                      </div>
                    </div>
<?php } } ?>

                  </div>
                </div>
              </section>
            </div>
          </div>










        </div>
<?php include "inc/footer.php"; ?>