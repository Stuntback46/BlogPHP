<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p><a href="index.php">Retour à la liste des billets</a></p>

<div class="news">
    <h3>
        <?= htmlspecialchars($post['title']) ?>
        <em>le <?= $post['creation_date_fr'] ?></em>
    </h3>
    
    <p>
        <?= nl2br(htmlspecialchars($post['content'])) ?>
    </p>
</div>

<h2>Commentaires</h2>
<p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>

<form action="index.php?action=updateComment&amp;id=<?=$post['id']?>&amp;idComment=<?=$comment['id']?>" method="post">
    <div>
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="updatedComment"></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>


    

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
