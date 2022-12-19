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
        <?php for ($i = 0; $i < count($comments_for_one_post); $i++) { ?>
            <li>
                <p>by: <?php echo $comments_for_one_post[$i]['author'] ?></p>
                <p><?php echo $comments_for_one_post[$i]['text'] ?></p>
                <hr>
            </li>
        <?php } ?>
    </ul>
</div>
