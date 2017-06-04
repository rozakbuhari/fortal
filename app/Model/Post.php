<?php

namespace App\Model;

use App\Core\Model;

class Post extends Model {
    
    protected $table = 'posts';
    
    protected $fillable = ['title', 'content'];
    
}
