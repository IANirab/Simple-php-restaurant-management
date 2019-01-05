<?php 
if (!isset($_GET['id']) || $_GET['id'] ==NULL) {
	header("location:404.php");
}
?>
<?php include "inc/header.php"; ?>
<?php
$per_page = 4;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$start_form = ($page-1) * $per_page;


?>
        <div class="page-container">
          <div data-bottom-top="background-position: 50% 50px;" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -50px;" class="page-title page-blog">
            <div class="container">
              <div class="title-wrapper">
            <?php
            $id=$_GET['id'];
            $query = "select * from tbl_category where id='$id'";
            $post = $db->select($query);
            if($post){
                while($result = $post->fetch_assoc()){
            ?>
                <div data-top="transform: translateY(0px);opacity:1;" data--120-top="transform: translateY(-30px);opacity:0;" data-anchor-target=".page-title" class="title"> <?php echo $result['name']; ?> </div>
            <?php } } ?>
                <div data-top="opacity:1;" data--120-top="opacity:0;" data-anchor-target=".page-title" class="divider"><span class="line-before"></span><span class="dot"></span><span class="line-after"></span></div>
            <?php
            $id=4;
            $query = "select * from tbl_header where id='$id'";
            $post = $db->select($query);
            if($post){
                while($result = $post->fetch_assoc()){
            ?>
                <div data-top="transform: translateY(0px);opacity:1;" data--20-top="transform: translateY(5px);" data--50-top="transform: translateY(15px);opacity:0.8;" data--120-top="transform: translateY(30px);opacity:0;" data-anchor-target=".page-title" class="subtitle"><?php echo $result['body']; ?></div>
            <?php } } ?>
              </div>
            </div>
          </div>
          <div class="page-content-wrapper">
            <section class="padding-top-100 padding-bottom-100">
              <div class="container">
                <div class="row">
                  <div class="page-main col-md-8">
                    <div class="blog-wrapper swin-sc-blog-list">


            <?php
            $id = $_GET['id'];
            $query = "select * from tbl_post where cat='$id' order by id desc ";
            $post = $db->select($query);
            if($post){
                while($result = $post->fetch_assoc()){
            ?>

                      <div class="swin-sc-blog-slider style-02">
                        <div class="main-slider">
                          <div class="slides">
                            <div class="blog-item swin-transition">
                              <div class="blog-featured-img"><img src="assets/images/blog/<?php echo $result['img']; ?>" alt="fooday" class="img img-responsive"></div>
                              <div class="blog-content">
                                <div class="blog-info clearfix">
                                  <div class="blog-info-item blog-comment">              
            <?php
            $id=$result['id'];
            $query1 = "select * from tbl_comments where pid='$id' AND cat='approved'";
            $post1 = $db->select($query1);
            if($post1){
              $count = mysqli_num_rows($post1);
            ?>
                <p><i class="fa fa-comment"></i><span><?php echo $count; ?></span></p>
            <?php } ?>


                                    <p></p>
                                  </div>
                                  <div class="blog-info-item blog-author">
                                    <p><span>Post By </span><a><?php echo $result['author']; ?></a></p>
                                    <p></p>
                                  </div>
                                </div>
                                <h3 class="blog-title"><a href="blog-single.php?id=<?php echo $result['id']; ?>" class="swin-transition"><?php echo $result['title']; ?></a></h3>
                                <p class="blog-description"><?php echo $fm->textshorten($result['body']); ?></p>
                                <div class="blog-readmore"><a href="blog-single.php?id=<?php echo $result['id']; ?>" class="swin-transition">Read More <i class="fa fa-angle-double-right"></i></a></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                <?php } ?>
                <?php } else {
                  echo "No Posts Are Avaiable !!  ";
                  } ?>

                    </div>
                  </div>
                  <div class="page-sidebar col-md-4">
                    <!-- search-->
                    <!-- categories-->
                    <div class="swin-widget widget-categories">
                      <div class="title-widget">Category</div>
                      <div class="widget-body widget-content clearfix">
            <?php
            $query = "select * from tbl_category";
            $post = $db->select($query);
            if($post){
                while($result = $post->fetch_assoc()){
            ?>

          <a href="?id=<?php echo $result['id']; ?>" class="link"><i class="icons fa fa-angle-right"></i><span class="text"><?php echo $result['name']; ?></span></a>

                <?php } ?>
                <?php } else {
                  echo "Not Found ";
                  } ?>


                       </div>
                    </div>
                    <!-- recent post-->

                    <!-- tag-->
                    <div class="swin-widget widget-tag">
                      <div class="title-widget">TAG</div>
                      <div class="widget-body widget-content clearfix">
                        <ul class="list-unstyled list-inline">
            <?php
            $query = "select * from tbl_tag ";
            $post = $db->select($query);
            if($post){
                while($result = $post->fetch_assoc()){
            ?>

              <li><a class="tag"><?php echo $result['name']; ?></a></li>

                <?php } ?>
                <?php } else {
                  echo "Not Found ";
                  } ?>

                        </ul>
                      </div>
                    </div>
                    <!-- gallery-->
                    <div class="swin-widget widget-gallery carousel">
                      <div class="title-widget">Gallery</div>
                      <div class="widget-body widget-content clearfix">
                        <div class="main-slider">

            <?php
            $query = "select * from tbl_gal ";
            $post = $db->select($query);
            if($post){
                while($result = $post->fetch_assoc()){
            ?>


                <div class="item-slide"><img src="assets/images/widget/<?php echo $result['img']; ?>" alt="" class="img-responsive showcase"></div>
                            <?php } ?>
                <?php } else {
                  echo "Not Found ";
                  } ?>



                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>

<?php include "inc/footer.php"; ?>