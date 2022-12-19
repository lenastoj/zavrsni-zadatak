<?php
$select_posts_title = "SELECT id, title FROM posts ORDER BY id DESC LIMIT 5";
$posts_title = fetchData($connection, $select_posts_title, true);
// dump($posts_title);
?>

<aside class="col-sm-3 ml-sm-auto blog-sidebar">
            <div class="sidebar-module sidebar-module-inset">
                <h4>Latest posts</h4>
                <?php for($i = 0; $i < count($posts_title); $i++ ){ ?>
                    <p><a href="single-post.php?post_id=<?php echo($posts_title[$i]['id']) ?>"><?php echo $posts_title[$i]['title'] ?></a></p>
                <?php } ?>
            </div>
            
        </aside><!-- /.blog-sidebar -->

    </div><!-- /.row -->

</main><!-- /.container -->