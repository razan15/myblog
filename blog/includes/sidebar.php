
<div class="col-4">
<!--
    <div class="card mb-3">
        <h5 class="card-header">featured</h5>
        <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
-->
<!--
    <div class="card mb-3">
        <h5 class="card-header">featured</h5>
        <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
-->
   <?php
    if(isset($_GET['id'])){
    ?>
    <div class="card mb-3">
        <h5 class="card-header">Comments</h5>

        <?php
        $comments=getComments($conn,$id);
        if(count($comments)<1){
            echo '<div class="card-body">
                    <p class="text-center card-text">No Comments </p>
                </div>';
        } 

        if(is_array($comments)){
        foreach($comments as $comment){
            ?>
            <div class="card-body">
                <h5 class="card-title"><?php echo $comment['name']?></h5>
                <p class="card-text"><?php echo $comment['comment']?></p>
                <span class="text-primary">Posted on <?php echo date('F jS, Y',strtotime($comment['created_at']))?></span>
            </div>
        <?php
        }
        }
        ?>
    </div>
    <?php
    }
    ?>
</div>