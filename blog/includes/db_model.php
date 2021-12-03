<?php
  $conn=mysqli_connect('localhost','admin2','passwordroze123','blogdb') or die('Database is not connected');

    $sql = "SELECT * FROM post";
    $query=mysqli_query($conn, $sql);

    if(isset($_REQUEST['new_post'])){
      $title = $_REQUEST['title'];
      $content = $_REQUEST['content'];

      $sql = "INSERT INTO post(title, content) VALUES ('$title', '$content')";
      mysqli_query($conn, $sql);
      }

    if(isset($_REQUEST['id'])){
      $id = $_REQUEST['id'];

      $sql = "SELECT * FROM post WHERE id = $id";
      $query = mysqli_query($conn, $sql);
      }
   
?>