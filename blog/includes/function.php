<?php

  function getCategory($conn,$id){
    $sql="SELECT * FROM category WHERE id=$id";
    $run = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($run);
    
      return $data['name'];
  }
?>

<?php

  function getImagesByPost($conn,$post_id){
      $sql="SELECT * FROM images WHERE post_id=$post_id";
      $run = mysqli_query($conn, $sql);
      $data = array();
      while($d=mysqli_fetch_array($run)){
          $data[]=$d;
      }
        return $data;
  }
?>

<?php

  function getComments($conn,$post_id){
    $sql="SELECT * FROM comments WHERE post_id=$post_id ORDER BY id DESC";
    $run = mysqli_query($conn, $sql);
    $data = array();
    while($d=mysqli_fetch_array($run)){
        $data[]=$d;
    }
      return $data;
  }
?>
