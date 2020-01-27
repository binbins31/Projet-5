<?php


namespace App\Controller;


use App\Entity\View;

class AdminController extends PostController
{

    public function listPosts()
    {
        $posts = $this->postManager->getPosts();
        $view = new View('Admin');
        $view->generate($posts);

    }

    public function EditPosts($id)
    {
        $posts = $this->postManager->editPost($id);
        $view = new View('EditPost');
        $view->generate($posts);

    }

    public function DeletePost($id)
    {
        $post = $this->postManager->delete($id);


    }

    public function UpdatePost($id)
    {
        $post = $this->postManager->editPost($id);

    }

    public function DeleteComment($id)
    {
        $comment = $this->commentManager->deleteComment($id);


    }

    public function ValidateComment()
    {
        $comment = $this->commentManager->deleteComment($id);

    }

    public function getComments($id)
    {
        $comments = $this->commentManager->getComments($id);
        $view = new View('Comment');
        $view->generate($comments);

    }





}