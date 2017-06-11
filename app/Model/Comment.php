<?php

namespace App\Model;


use App\Core\Model;

class Comment extends Model {
    
    protected $table = 'comments';
    
    protected $fillable = ['author_id', 'post_id', 'content'];
    
    public function getWhere($filters = []) {
        $comments =  self::get();
        
        if (!empty($filters)) {
            $comments = array_filter($comments, function ($post) use ($filters) {
                $found = FALSE;
                foreach ($filters as $key => $val) {
                    $found = $post->{$key} == $val;
                }
                
                return $found;
            });
            
            return array_map(function ($comment) {
                $Author = new User();
                $comment->author = $Author->find($comment->author_id);
                
                return $comment;
            }, $comments);
        }
        
        return $comments;
    }
    
}