<?php

namespace App\Model;

use App\Core\Model;

class Category extends Model {
    
    protected $table = 'categories';
    
    protected $fillable = ['name', 'slug'];
    
    public function getWhere($filters = []) {
        $categories =  self::get();
        
        if (!empty($filters)) {
            $categories = array_filter($categories, function ($category) use ($filters) {
                $found = FALSE;
                foreach ($filters as $key => $val) {
                    $found = preg_match("/{$val}/i", $category->{$key});
                }
                
                return $found;
            });
            
            $categories = array_values($categories);
        }
        
        return $categories;
    }
    
}
