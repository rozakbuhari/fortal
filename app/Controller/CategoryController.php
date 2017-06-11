<?php

namespace App\Controller;

use App\Core\Controller;
use App\Model\Ad;
use App\Model\Category;
use App\Model\Post;

class CategoryController extends Controller {
    
    public function index() {
    
        $Category = new Category();
        $categories = $Category->get();
        
        echo view('category.index', compact('categories'));
    }
    
    public function post($slug) {
    
        $Post = new Post();
        $posts = $Post->getWhere(['slug' => $slug]);
        
        $populars = $Post->get();
        
        $Ad =  new Ad();
        $ads = $Ad->notExpired();
        
        $Category = new Category();
        $categories = $Category->get();
        
        $category = $Category->getWhere(['slug' => $slug])[0];
        
        echo view('category.post', compact('posts', 'populars', 'ads', 'categories', 'category'));
    }
    
    public function create() {
        
        echo view('category.create');
        
    }
    
    public function store() {
        
        $params = $_POST;
    
        $Category = new Category();
        
        $insert = $Category->insert([
            'name' => $params['name'],
            'slug' => $params['slug']
        ]);
    
        if ($insert) {
            header('location: ' . URL . 'category');
        } else {
            header('location: ' . URL . 'error');
        }
        
    }
}
