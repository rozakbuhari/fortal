<?php

namespace App\Model;

use App\Core\Model;

class Post extends Model {
    
    protected $table = 'posts';
    
    protected $fillable = ['title', 'content', 'author_id', 'category_id', 'image'];
    
    public function find($id) {
        $post = parent::find($id);
    
        $Category = new Category();
        $category = $Category->find($post->category_id);
        
        $Author = new User();
        $author = $Author->find($post->author_id);
        
        $Comment = new Comment();
        $comments = $Comment->getWhere(['post_id' => $post->id]);
        
        $post->author = $author;
        $post->category = $category->name;
        $post->comments = $comments;
        
        return $post;
    }
    
    public function get() {
        $posts =  parent::get();
        
        $posts = array_map(function ($post) {
            $Category = new Category();
            $category = $Category->find($post->category_id);
            
            $Author = new User();
            $author = $Author->find($post->author_id);
    
            $Comment = new Comment();
            $comments = $Comment->getWhere(['post_id' => $post->id]);
    
            $post->author = $author;
            $post->category = $category->name;
            $post->comments = $comments;
            
            return $post;
        }, $posts);
        
        return $posts;
    }
    
    public function getWhere($filters = []) {
        $posts =  self::get();
        
        if (!empty($filters)) {
            $posts = array_filter($posts, function ($post) use ($filters) {
                $found = FALSE;
                foreach ($filters as $key => $val) {
                    $found = preg_match("/{$val}/i", $post->{$key});
                }

                return $found;
            });

            $posts = array_values($posts);
        }
        
        return $posts;
    }
}
