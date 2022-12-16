<?php
include ('header.php');
include ('database.php');

$select_posts_from_db = "SELECT id, title, body, author, created_at FROM posts";
$posts_from_db = fetchData($connection, $select_posts_from_db, true);
// dump($posts_from_db);
?>

<main role="main" class="container">

    <div class="row">

        <div class="col-sm-8 blog-main">

            <div class="blog-post">
                <?php for($i = 0; $i < count($posts_from_db); $i++ ){ ?>
                    <h2 class="blog-post-title"><a href="single-post.php?post_id=<?php echo($posts_from_db[$i]['id']) ?>" class="blog-post-title"><?php echo $posts_from_db[$i]['title']?></a></h2>
                    <p class="blog-post-meta"><?php echo $posts_from_db[$i]['created_at']?> by <a href="#"><?php echo $posts_from_db[$i]['author']?></a></p>
                    <p><?php echo $posts_from_db[$i]['body']?></p>
                <?php } ?>
                
            </div><!-- /.blog-post -->

        </div><!-- /.blog-main -->


<?php
include ('sidebar.php');
include ('footer.php');
?>

