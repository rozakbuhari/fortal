<?php

namespace App\Model;

use App\Core\Model;

class Category extends Model {
    
    protected $table = 'categories';
    
    protected $fillable = ['name'];
    
}
