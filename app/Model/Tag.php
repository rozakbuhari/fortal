<?php

namespace App\Model;


use App\Core\Model;

class Tag extends Model {
    
    protected $table = 'tags';
    
    protected $fillable = ['name'];

}