<?php 
if (!isset($_GET['id']) || $_GET['id'] == NULL) {
  header("location:404.php");
}
?>
<?php include "inc/header.php"; ?>
<style type="text/css">
  input[type="submit"] {
    width: 128px;
    height: 39px;
    border: none;
    border-radius: 3px;
    background: #f1602b;
    color: white;
}
img.media-object {
    width: 150px;
}
</style>
        <div class="page-container">
          <div data-bottom-top="background-position: 50% 50px;" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -50px;" class="page-title page-blog">
            <div class="container">
              <div class="title-wrapper">
                <br><br><br>
                <div data-top="opacity:1;" data--120-top="opacity:0;" data-anchor-target=".page-title" class="divider"><span class="line-before"></span><span class="dot"></span><span class="line-after"></span></div>
                <div data-top="transform: translateY(0px);opacity:1;" data--20-top="transform: translateY(5px);" data--50-top="transform: translateY(15px);opacity:0.8;" data--120-top="transform: translateY(30px);opacity:0;" data-anchor-target=".page-title" class="subtitle">All information and stories from our blog will help you have a best meal for your day</div>
              </div>
            </div>
          </div>
          <div class="page-content-wrapper">
            <div class="container">
              <div class="padding-top-100 padding-bottom-100">
                <div class="row">
                  <div class="page-main col-md-8">
                    <div class="blog-wrapper swin-blog-single">
                      <div class="swin-sc-blog-slider style-02">
                        <div class="main-slider">



            <?php
            $id = $_GET['id'];
            $query = "select * from tbl_post where id='$id'";
            $post = $db->select($query);
            if($post){
                while($result = $post->fetch_assoc()){
            ?>
                          <div class="slides">
                            <div class="blog-item">
                              <div class="blog-featured-img"><img src="assets/images/blog/<?php echo $result['img']; ?>" alt="fooday" class="img img-responsive"></div>
                              <div class="blog-content">
                                <div class="blog-meta-info">
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
                                  <h3 class="blog-title"><a href="#" class="swin-transition"><?php echo $result['title']; ?></a></h3>
                                </div>
                                <div class="blog-content-inner">
                                  <p><?php echo $result['body']; ?></p>
                                </div>
                                <div class="blog-footer clearfix">
                                  <div class="blog-share">
                                    <ul class="socials list-unstyled list-inline">
                                      <li><a href="https://www.facebook.com/sharer/sharer.php?u=http://<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>"><i class="fa fa-facebook"></i></a></li>
                                      <li><a href="https://twitter.com/home?status=http://<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>"><i class="fa fa-twitter"></i></a></li>
                                      <li><a href="https://pinterest.com/pin/create/button/?url=<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>"><i class="fa fa-pinterest"></i></a></li>
                                      <li><a href="https://plus.google.com/share?url=<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                  </div>
                                  <div class="blog-tags"><strong>Tags:</strong><p><?php echo $result['tag']; ?></p></div>
                                </div>
                              </div>
                            </div>
                          </div>
                  <?php } } ?>


                        </div>
                      </div>
                      <div class="blog-comment">
                        <div class="comment-heading swin-sc swin-sc-title style-2 text-left">
            <?php
            $id=$result['id'];
            $query1 = "select * from tbl_comments where pid='$id' AND cat='approved'";
            $post1 = $db->select($query1);
            if($post1){
              $count = mysqli_num_rows($post1);
            ?>
                          <p class="title"><span><?php echo $count; ?></span></p>
            <?php } ?>
                        </div>
                        <div class="comment-area">
                          <div class="comment-list media-list list-unstyledl">




            <?php
            $id=$_GET['id'];
            $cat = "approved";
            $query = "select * from tbl_comments where pid='$id' AND cat='$cat'";
            $post = $db->select($query);
            if($post){
                while($result = $post->fetch_assoc()){
            ?>
                            <div class="comment-item media">
                              <div class="author-comment-image media-left"><a href="replay.php?id=<?php echo $result['id']; ?>"><img src="http://1.gravatar.com/avatar/a6efd1c63fa3d42a7cea9dfb07348a04?s=90&amp;d=mm&amp;r=g' srcset='http://1.gravatar.com/avatar/a6efd1c63fa3d42a7cea9dfb07348a04?s=180&amp;d=mm&amp;r=g 2x" alt="fooday" class="media-object"></a></div>
                              <div class="media-body">
                                <p class="author-comment-name media-heading"><?php echo $result['name']; ?></p>
                                <p><?php echo $result['body']; ?></p>
                              </div>
                            </div>
<?php } } ?>




                          </div>
                        </div>



<?php if (isset($_SESSION['email'])) { ?>
                        <div class="comment-form">
                          <div class="comment-heading swin-sc swin-sc-title style-2 text-left">
                            <p class="title"><span>Leave Comments</span></p>
                          </div>
                          <div class="swin-sc swin-sc-contact-form light mtl margin-bottom-100">


         <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $body  =  mysqli_real_escape_string($db->link,$_POST['body']);
            $name  =  mysqli_real_escape_string($db->link,$_POST['name']);
            $email  =  mysqli_real_escape_string($db->link,$_POST['email']);
            $pid  =  mysqli_real_escape_string($db->link,$_POST['pid']);
            $uid  =  mysqli_real_escape_string($db->link,$_POST['uid']);
                     
            
            if($body =='' || $name =='' || $email =='' || $pid =='' || $uid ==''){
                $error = "Field Must not Be Empty";
            }else{
                $query = "INSERT INTO tbl_comments(name,body,email,pid,uid) VALUES('$name','$body','$email','$pid','$uid')";
                $create = $db->update($query);

            }

        }
        ?>

                            <form action="" method="post">
                              <div style="display: none;" class="form-group">
                                <div class="input-group">
                                  <div class="input-group-addon"><i class="fa fa-user"></i></div>
            <?php
            $id = $_SESSION['email'];
            $query = "select * from tbl_user where email='$id'";
            $post = $db->select($query);
            if($post){
                while($result = $post->fetch_assoc()){
            ?>
                                  <input type="hidden" name="name" value="<?php echo $result['name']; ?>" placeholder="Username" class="form-control">
                                  <input type="hidden" name="email" value="<?php echo $result['email']; ?>" placeholder="Username" class="form-control">
                                  <input type="hidden" name="uid" value="<?php echo $result['id']; ?>" placeholder="Username" class="form-control">
            <?php } } ?>

                                </div>
                                <div class="input-group">
                                  <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                  <input type="hidden" placeholder="Email" class="form-control">
                                  <input type="hidden" name="pid" value="<?php echo $_GET['id']; ?>" placeholder="Username" class="form-control">
                                </div>
                              </div>
                              <div class="form-group">
                                <textarea name="body" class="form-control"></textarea>
                              </div>
                              <div class="form-group">
                                <input type="submit" value="Submit" name="submit">
                              </div>
                            </form>
                          </div>
                        </div>
<?php } else {
  echo "You Need to log-in for comment this post";
} ?>



                      </div>
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
                        <a href="blogs1.php?id=<?php echo $result['id']; ?>" class="link"><i class="icons fa fa-angle-right"></i><span class="text"><?php echo $result['name']; ?></span></a>
            <?php }} ?>

                      </div>
                    </div>
                    <!-- recent post-->
                    <div class="swin-widget widget-recent-post">
                      <div class="title-widget">Recent Post</div>
                      <div class="widget-body widget-content clearfix">

            <?php
            $query = "select * from tbl_post order by id desc limit 6";
            $post = $db->select($query);
            if($post){
                while($result = $post->fetch_assoc()){
            ?>
                        <div class="swin-media">
                          <div class="content-left"><a href="?id=<?php echo $result['id']; ?>"><img src="assets/images/blog/<?php echo $result['img']; ?>" alt="..." class="media-object"></a></div>
                          <div class="content-right"><a href="?id=<?php echo $result['id']; ?>" class="heading">
                              <?php echo $result['title']; ?></a>
                            <div class="info">
                              <div><i class="swin-icon fa fa-clock-o"></i><span class="text"><?php echo $fm->formatdate1($result['date']); ?></span></div>
                            </div>
                          </div>
                        </div>
<?php } } ?>






                      </div>
                    </div>
                    <!-- tag-->
                    <div class="swin-widget widget-tag">
                      <div class="title-widget">TAG</div>
                      <div class="widget-body widget-content clearfix">
                        <ul class="list-unstyled list-inline">
            <?php
            $query = "select * from tbl_tag";
            $post = $db->select($query);
            if($post){
                while($result = $post->fetch_assoc()){
            ?>
                <li><a class="tag"><?php echo $result['name']; ?></a></li>
            <?php } } ?>

                        </ul>
                      </div>
                    </div>
                    <!-- gallery-->
                    <div class="swin-widget widget-gallery carousel">
                      <div class="title-widget">Gallery</div>
                      <div class="widget-body widget-content clearfix">
                        <div class="main-slider">
            <?php
            $query = "select * from tbl_gal";
            $post = $db->select($query);
            if($post){
                while($result = $post->fetch_assoc()){
            ?>
                          <div class="item-slide"><img src="assets/images/widget/<?php echo $result['img']; ?>" alt="" class="img-responsive showcase"></div>
            <?php } } ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

<?php include "inc/footer.php"; ?>