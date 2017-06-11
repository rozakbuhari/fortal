<?php

namespace App\Controller;


use App\Model\Comment;

class CommentsController {
    
    public function store() {
        if (empty($_POST)) header('location: ' . URL . 'error');
    
        $params = $_POST;
        $Comment = new Comment();
        
        $insert = $Comment->insert([
            'author_id' => \Auth::user()->id,
            'post_id' => $params['post'],
            'content' => $params['comment']
        ]);
    
        if ($insert) {
            header('location: ' . URL . 'posts/show/' . $params['post']);
        } else {
            header('location: ' . URL . 'error');
        }
        
    }
    
}