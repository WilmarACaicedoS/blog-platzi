<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BlogPost;
use Sirius\Validation\Validator;

class PostController extends BaseController {

    public function getIndex() {
        /*global $pdo;                
        $query = $pdo->prepare('SELECT * FROM blog_posts ORDER BY id DESC');
        $query->execute();
        $blogPosts = $query->fetchAll(\PDO::FETCH_ASSOC);*/
        $blogPosts = BlogPost::all();
        return $this->render('admin/posts.twig', ['blogPosts' => $blogPosts]);        
    }

    public function getCreate() {
        return $this->render('admin/insert-post.twig');
    }

    public function postCreate() {
        /*global $pdo;
        $sql = 'INSERT INTO blog_posts (title, content) VALUES (:title, :content)';
        $query = $pdo->prepare($sql);
        $result = $query->execute([
            'title' => $_POST['title'],
            'content' => $_POST['content']
        ]);*/
        $errors = [];
        $result = false;

        $validator = new Validator();
        $validator->add('title', 'required');
        $validator->add('content', 'required');

        if ($validator->validate($_POST)) {
            $blogPost = new BlogPost([
                'title' => $_POST['title'],
                'content' => $_POST['content']
            ]);            
            if ($_POST['img']) {
                $blogPost->img_url = $_POST['img'];
            }
            $blogPost->save();
            $result = true;
        } else {            
            /*$validator->clearMessages();
            $err1 = $validator->addMessage('title', 'El campo título es requerido');
            $err2 = $validator->addMessage('content', 'El campo contenido es requerido');*/
            $errors = $validator->getMessages();            
        }
        return $this->render('admin/insert-post.twig', [
            'result' => $result,
            'errors' => $errors
        ]);        
    }

}