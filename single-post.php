<?php
include ('header.php');
include ('database.php');

if(isset($_GET['post_id'])){
    $post_id = $_GET['post_id'];
    $select_post_from_db = "SELECT id, title, body, author, created_at FROM posts WHERE id = $post_id";
    $one_post_from_db = fetchData($connection, $select_post_from_db);
    // dump($one_post_from_db);


    $select_comments_from_db = "SELECT id, author, text FROM comments WHERE post_id = $post_id";
    $comments_for_one_post = fetchData($connection, $select_comments_from_db, true);
    // dump($comments_for_one_post);
}

if(isset($_POST['submit'])){
    // $post_id = $_GET['post_id'];
    $author = $_POST['name'];
    $text = $_POST['comment'];
    if(empty($author) || empty($text)){
        $error = '***All fields are required!***';
    } else {
        $insert_into_comments = "INSERT INTO comments (author, text, post_id) VALUES ('$author', '$text', '$post_id')";
        $statement = $connection->prepare($insert_into_comments);
        $statement->execute();

        header("Refresh:0");
    }

}

?>
<main role="main" class="container">
<div class="row">

        <div class="col-sm-8 blog-main">

            <div class="blog-post">
                
                <h2 class="blog-post-title"><?php echo $one_post_from_db['title']?></h2>
                <p class="blog-post-meta"><?php echo $one_post_from_db['created_at']?> by <?php echo $one_post_from_db['author']?></p>
                <p><?php echo $one_post_from_db['body']?></p>
            </div>

       
            <?php
            include('comments.php');
            ?>
            
            <p class = "post-back-link"><a href="posts.php" class = "post-back-link">Go back to All Posts!</a></p>
        </div>

<?php
include ('sidebar.php');
include ('footer.php');
?>