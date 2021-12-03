<?php
require('includes/db_model.php');
include('includes/function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/app.css">
    <title>Blog</title>
</head>
<body>
    <?php include_once('includes/nav.php'); ?>


<div class="container m-auto mt-3 row">
  <div class="col-8">

      <?php foreach($query as $q){?>
    <div class="card mb-3">
      <div class="card-body">
            <h5 class="card-title"><?php echo $q['title'];?></h5>
            <span class="badge bg-primary">Posted on <?php echo date('F jS, Y',strtotime($q['created_at']))?></span>
            <span class="badge bg-danger"><?php echo getCategory($conn,$q['category_id']);?></span>
            <div class="border-bottom mt-3"></div>

            <?php
              $post_images=getImagesByPost($conn,$q['id']);
            ?>

      <!-- Carousel -->
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
              <?php
                $c=1;
                if(is_array($post_images)){
                  foreach($post_images as $image){
                    if($c>1){
                      $sw = "";
                    }
                    else{
                      $sw = "active";
                    }
              ?>
                      <div class="carousel-item <?=$sw?>">
                          <img src="assets/images/<?=$image['image']?>" class="d-block w-100" alt="...">
                      </div>
              <?php
                $c++;
                }
                }
              ?> 
          </div>
                <button class="carousel-control-prev" type="button" 
                    data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" 
                    data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
        </div>
      <!-- End Carousel -->
            <!--
                <img src="assets/images/cloth3.jpg" class="img-fluid mb-2 mt-2" alt="Responsive image">
            -->
                <p class="card-text"><?php echo $q['content'];?></p>

                    <!-- Social buttons -->
                    <div class="addthis_inline_share_toolbox"></div>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Leave a Comment
                    </button>
      </div>
    </div>

        <?php }?>
 
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" 
          aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                      <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Comment</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" 
                            aria-label="Close"></button>
                      </div>
                    <div class="modal-body">
                        <form action="includes/add_comment.php" method="post">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Name</label>
                                    <input type="name" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                                  <div class="mb-3">
                                      <label for="exampleInputPassword1" class="form-label">Comment</label>
                                      <input type="text" class="form-control" name="comment" id="exampleInputPassword1">
                                  </div>
                              <input type="hidden" name="post_id" value="<?=$id?>">
                              <button type="submit" name="addcomment" class="btn btn-primary">Add Comment</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
         <!-- End Modal -->
  
  </div>

  <?php include_once('includes/sidebar.php'); ?>
</div>


<?php include_once('includes/footer.php'); ?>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/app.js"></script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.
js#pubid=ra-60315b469e32d063"></script>
</body>
</html>