<?php
include ('header.php');

if(isset($_POST['submit_post'])){
    $title = $_POST['title'];
    $text = $_POST['text'];
    $author = $_POST['author'];
    $post_data = [
        'title' => $title,
        'body' =>  $text,
        'author' =>  $author,
    ];
   
    if(empty($title) || empty($text) || empty($author)){
        $error2 = '***All fields are required!***';
    } else {
        $insert_new_post = "INSERT INTO posts (title, body, author, created_at) VALUES (:title, :body, :author, current_date())";
        $statement = $connection->prepare($insert_new_post);
        $statement->execute($post_data);
        
        header("Location: posts.php");
    }

}

?>
<main role="main" class="container">

<div class="row">

    <div class="col-sm-8 blog-main">

        <div class="blog-post">

            <form action="" method="POST" class="post-form">
                <p class="error">
                    <?php if (isset($error2)) {
                        echo $error2;
                    } ?>
                 </p>
                <label for="title">Post title:</label>
                <input type="text" id="title" name="title">
                <br>
                <label for="text">Your post:</label>
                <textarea name="text" id="text" cols="80" rows="10"></textarea>
                <br>
                <label for="author">Author:</label>
                <input type="text" id="author" name="author">
                <br>
                <input type="submit" id="submit_post" name="submit_post">
               
            </form>
            
        </div><!-- /.blog-post -->

    </div><!-- /.blog-main -->


<?php
include ('sidebar.php');
include ('footer.php');
?>