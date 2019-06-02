<?php

namespace OpenClassrooms\Blog\Model;

require_once("model/Manager.php");

class ModifyCommentManager extends Manager
{
    public function modifyComment()
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comments SET comment = :new_comment WHERE id = :comment_id')
        return $req;;
        $req->execute(array(
    'new_comment' => $newComment,
    'comment_id' => $commentId
    
    ));
    }

   
}