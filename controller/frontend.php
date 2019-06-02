<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function listPosts()
{
    $postManager = new \OpenClassrooms\Blog\Model\PostManager();
    $posts = $postManager->getPosts();

    require('view/frontend/listPostsView.php');
}

function post()
{
    $postManager = new \OpenClassrooms\Blog\Model\PostManager();
    $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    if ($post)
    {
    require('view/frontend/postView.php');
    }
    else 
    {
        throw new Exception('Le billet n\'existe pas');
    }
}

function addComment($postId, $author, $comment)
{
    $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

function modifyComment($commentId)
{   $postManager = new \OpenClassrooms\Blog\Model\PostManager();
    $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();
    $post = $postManager->getPost($_GET['id']);
    $comment = $commentManager->getComment($_GET['idComment']);
    if ($comment)
    {
        require('view/frontend/modifyCommentView.php');
    }
   else
   {
    throw new Exception('Le commentaire n\'existe pas');
   }
    
}

function updateComment($updatedComment,$idComment,$id)
{

$commentManager = new \OpenClassrooms\Blog\Model\CommentManager();
$modifiedComment = $commentManager->changeComment($updatedComment,$idComment);

if ($modifiedComment === false) {
        throw new Exception('Impossible de modifier le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $id);
    }


}

