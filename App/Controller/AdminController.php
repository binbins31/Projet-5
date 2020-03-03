<?php

namespace App\Controller;

use App\Manager\LoginManager;
use App\Manager\PostManager;
use App\Manager\CommentManager;
use App\Core\TwigRenderer;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class AdminController controller for Backend
 */
class AdminController
{
    private $postManager;
    private $commentManager;
    private $loginManager;
    private $renderer;
    private $request;

    public function __construct()
    {
        $this->postManager = new PostManager();
        $this->commentManager = New CommentManager();
        $this->loginManager = new LoginManager();
        $this->renderer = new TwigRenderer();


        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['auth'])) {
            $_SESSION['flash']['danger'] = 'Connectez-vous pour accéder à cette page';
            header('Location: /login');


        }
        if (isset($_SESSION['auth'])) {
            if ($_SESSION['auth']->getStatus() != 1) {
                $_SESSION['flash']['danger'] = 'Vous n\'avez pas le droit d\'accéder à cette page';
                header('Location: /Admin');

            }
        }

    }

    /**
     * Render the Posts view from the post manager
     */
    public function listPosts()
    {
        $list_posts = $this->postManager->getPosts();
        $this->renderer->render('Backend/adminView', ['listposts' => $list_posts]);


    }

    /**
     * Render the Comments view from the comment manager
     *
     * @param $postId
     */
    public function listComments($postId)
    {
        $comments = $this->commentManager->getComments($postId);
        $this->renderer->render('Backend/commentsView', ['listcomments' => $comments]);

    }

    /**
     * Render the Post View
     */
    public function addPostView()
    {
        $this->renderer->render('Backend/addPostView');

    }

    /**
     * Add a Post using post manager
     */
    public function addPost()
    {
        $request = Request::createFromGlobals();
        $request->request->all();

        if (!empty($request->request->all())) {
            $datas['author_id'] = $request->get('author_id');
            $datas['author'] = $request->get('author');;
            $datas['title'] = $request->get('title');
            $datas['chapo'] = $request->get('chapo');
            $datas['description'] = $request->get('description');

            $result = $this->postManager->addPost($datas);

            if ($result === false) {
                $_SESSION['flash']['danger'] = 'Impossible d\'ajouter l\'article !';
            } else {
                $_SESSION['flash']['success'] = 'Votre article a été ajouté.';
            }
            header('Location: /admin');
        }
    }

    /**
     * Delete a Post from ID using post manager
     *
     * @param $postId
     */
    public function deletePost($postId)
    {
        $request = $this->postManager->deletePost($postId);
        if ($request === false) {
            $_SESSION['flash']['danger'] = 'Impossible de supprimer l\'article !';
        } else {
            $_SESSION['flash']['success'] = 'Votre article a été supprimé.';
        }
        header('Location: /admin');

    }

    /**
     * Delete a Comment from ID using comment manager
     *
     * @param $commentId
     */
    public function deletecomment($commentId)
    {
        $request = $this->commentManager->deleteComment($commentId);
        if ($request === false) {
            $_SESSION['flash']['success'] = "Impossible de supprimer le commentaire";
        } else {
            $_SESSION['flash']['success'] = 'Votre commentaire a été supprimé.';
        }
        header('Location: /admin');
    }

    /**
     * Render Update Post View
     */
    public function updatePostView($postId)
    {
        $posts = $this->postManager->getPost($postId);
        $this->renderer->render('Backend/editPostView', ['listpost' => $posts]);

    }

    /**
     * Update a Post from ID using post manager
     */
    public function updatePost($postId)
    {
        $this->postManager->updatePost($postId);
        $_SESSION['flash']['success'] = "Votre article a bien été modifié!";
        $this->updatePostView($postId);

    }

    /**
     * Validate a Comment from ID using comment manager
     */
    public function validateComment($commentId)
    {
        $request = $this->commentManager->validateComment($commentId);
        if ($request === false) {
            $_SESSION['flash']['success'] = "Impossible de valider le commentaire";
        } else {
            $_SESSION['flash']['success'] = 'Le commentaire a été validé.';
        }
        header('Location: /admin');

    }

}