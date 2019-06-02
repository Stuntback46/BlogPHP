<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>My awesome Blog!</h1>
<p><a href="index.php">Return to the news list</a></p>
Error<br>
<strong><?=$errorMessage ?></strong>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>