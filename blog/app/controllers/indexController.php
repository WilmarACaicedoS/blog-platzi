<?php

namespace App\Controllers;

use App\Models\BlogPost;

class IndexController extends BaseController {

    public function getIndex() {
        /*global $pdo;
        $query = $pdo->prepare('SELECT * FROM blog_posts ORDER BY id DESC');
        $query->execute();    
        $blogPosts = $query->fetchAll(\PDO::FETCH_ASSOC);*/
        
        $blogPosts = BlogPost::query()->orderBy('id', 'desc')->get();
        return $this->render('index.twig', ['blogPosts' => $blogPosts]);             
    }

    public function getFull($id) {
        $blogPosts = BlogPost::where('id', $id)->first();
        return $this->render('full.twig', ['blogPost' => $blogPosts]);
    }

}