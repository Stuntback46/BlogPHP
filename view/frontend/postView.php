<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
<h1>My awesome Blog !</h1>
<p><a href="index.php">Return to the news list</a></p>

<div class="news">
    <h3>
        <?= htmlspecialchars($post['title']) ?>
        <em>le <?= $post['creation_date_fr'] ?></em>
    </h3>
    
    <p>
        <?= nl2br(htmlspecialchars($post['content'])) ?>
        
    </p>
</div>

<h2>Comments</h2>

<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
    <div>
        <label for="author">Author</label><br />
        <input type="text" id="author" name="author" />
    </div>
    <div>
        <label for="comment">Comment</label><br />
        <textarea id="comment" name="comment"></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>

<?php
while ($comment = $comments->fetch())
{
?>
    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
    <em><a href="index.php?action=modifyComment&amp;id=<?=$comment['post_id']?>&amp;idComment=<?=$comment['id']?>">Edit the comment</a></em>
<?php
}
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
