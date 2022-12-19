<?php
// $delete_comment_button = 0;
?>
<form action="" method="POST" class="comment-form">
    <p class="error">
        <?php if (isset($error)) {
            echo $error;
        } ?>
    </p>
    <label for="name">Full name:</label>
    <input type="text" id="name" name="name">
    <br>
    <label for="comment">Your comment:</label>
    <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
    <!-- <input type="textarea" id="comment"  name="comment"> -->
    <br>
    <input type="submit" id="submit" name="submit">

</form>

<button class="btn btn-default btn-hide-comments">Hide comments</button> 

<div class="comments">
    <h5>Comments:</h5>
    <ul>
        <?php for ($i = 0; $i < count($comments_for_one_post); $i++) { 
            $delete_comment_button = $comments_for_one_post[$i]['id'];
            ?>
            <li>
                <p>by: <?php echo $comments_for_one_post[$i]['author'] ?></p>
                <p><?php echo $comments_for_one_post[$i]['text'] ?></p>
                <form action="" method="POST">
                    <input type="submit" name="delete_comment" value="Delete comment">
                </form>
                <hr>
            </li>
         
        <?php } ?>
    </ul>
</div>

<?php 
 if(isset($_POST['delete_comment'])) {
    $delete_comment_sql = "DELETE FROM comments WHERE id = $delete_comment_button";
    $delete_comment = fetchData($connection, $delete_comment_sql);
    header("Refresh:0");
    }
?>