<?php
require('controller/frontend.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
    
            }




            else {
                throw new Exception('Aucun identifiant de billet/commentaire envoyé');
            }
        }
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }

        elseif ($_GET['action'] == 'modifyComment') {
            if (isset($_GET['id']) && (isset($_GET['idComment'])) && (($_GET['id']) > 0)  && ($_GET['idComment']))
            {

               modifyComment($_GET['idComment']);
               
            }
            else {
                throw new Exception('Aucun identifiant de billet/commentaire envoyé');
            }
        }
        elseif ($_GET['action'] == 'updateComment')
        {
            if ((isset($_GET['idComment']) && $_GET['idComment'] > 0))
            {

            if (!empty($_POST['updatedComment']))
             {
                updateComment($_POST['updatedComment'],$_GET['idComment'],$_GET['id']);
             }

             else

                throw new Exception('Nouveau commentaire vide');

            }
            else

                throw new Exception('Aucun identifiant de commentaire envoyé');
        }
        


        
    }
    else {
        listPosts();
    }
}
catch(Exception $e) {
    $errorMessage = $e->getMessage();
    require('view/frontend/errorView.php');
}