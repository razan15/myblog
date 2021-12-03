
<?php
require('db_model.php');
if(isset($_POST['addcomment'])){
    print_r($_POST);
  $name=mysqli_real_escape_string($conn,$_POST['name']);
  $comment=mysqli_real_escape_string($conn,$_POST['comment']);
  $post_id=$_POST['post_id'];
  $sql="INSERT INTO comments(comment,name,post_id) VALUES ('$comment', '$name', '$post_id')";
  if(mysqli_query($conn,$sql)){
      header("location:../post.php?id=$post_id");
    }
  else{
      echo "comment is not added !";
    }
  
}
?>