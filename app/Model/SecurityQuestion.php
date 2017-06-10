<?php

namespace App\Model;

use App\Core\Model;

class SecurityQuestion extends Model {
    
    protected $table = 'security_questions';
    
    protected $fillable = ['name'];
    
}
