<?php

namespace App\Model;

use App\Core\Model;

class Role extends Model {
    
    protected $table = 'role';
    
    protected $fillable = ['name', 'title'];
    
}
