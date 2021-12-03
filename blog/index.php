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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/app.css">
    <title>blog</title>
</head>
<body>

<?php include_once('includes/nav.php'); ?>
<?php include_once('includes/header.php');?>

<div class="container">
  <div class="card-group">

        <?php foreach($query as $q){?>
      
        <div class="card" style="max-width: 400px; float: left; margin: 30px 10px">
            <?php
                $post_images=getImagesByPost($conn,$q['id']);
            ?>
              <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                  <div class="carousel-inner">   
                        <?php 
                          $c=1;
                          if(is_array($post_images)){
                          foreach($post_images as $image){
                            if($c>1){
                              $sw="active";
                            }
                        ?>
                            <div class="carousel-item <?=$sw?>"> 
                                <img src="assets/images/<?=$image['image']?>" class="card-img-top" alt="..">
                            </div>
                          <?php 
                            $c++;
                            } 
                          }
                          ?>
                  </div>
              </div>
                  <div class="card-body">
                      <a href="post.php?id=<?php echo $q['id'];?>" style="text-decoration:none; color: black">
                        <h5 class="card-title"><?php echo $q['title'];?></h5>
                        <p class="card-text text-truncate"><?=$q['content'];?></p>
                        <p class="card-text"><small class="text-muted">Posted on <?=date('F jS, Y',strtotime($q['created_at']))?></small></p>
                      </a>
                  </div>
        </div>
      
            <?php }?>
  </div>
</div>

<?php include_once('includes/footer.php'); ?>
    

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/app.js"></script>
  <script src="js/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.
  js#pubid=ra-60315b469e32d063"></script>

</body>
</html>