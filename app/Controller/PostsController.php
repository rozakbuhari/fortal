<?php

namespace App\Controller;

use App\Core\Controller;
use App\Model\Category;
use App\Model\Post;
use App\Model\Tag;
use App\Model\User;
use Auth;

class PostsController extends Controller {
    
    public function index() {
    
        $Post = new Post();
        $posts = $Post->get();
        
        echo view('post.index', compact('posts'));
    }
    
    public function show($id) {
        
        $Post = new Post();
        $post = $Post->find($id);
        
        $posts = $Post->get();
        
        $Category = new Category();
        $categories = $Category->get();
        
        echo view('post.show', compact('post', 'posts', 'categories'));
    }
    
    public function create() {
        
        $Category = new Category();
        $categories = $Category->get();
        
        echo view('post.create', compact('categories'));
        
    }
    
    public function store() {
        // Cek apakah ini POST request, jika buka redirect ke error
        if (empty($_POST)) header('location: ' . URL . 'error');
        
        $params = $_POST;
        $Post = new Post();
    
        if (!empty($_FILES['image']['name'])) {
            $file = pathinfo($_FILES['image']['name']);
        
            $storage = ROOT . 'public/images/';
            
            //TODO: Fix this
            $filename = uniqid() . '.' .  $file->extension;
            $target = $storage . $filename;
        
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            
                $insert = $Post->insert([
                    'title' => $params['title'],
                    'content' => $params['content'],
                    'category_id' => $params['category'],
                    'author_id' => Auth::user()->id,
                    'image' => $filename
                ]);
            
                if ($insert) {
                    header('location: ' . URL . 'posts');
                } else {
                    header('location: ' . URL . 'error');
                }
            } else {
                header('location: ' . URL . 'error');
            }
        } else {
            $insert = $Post->insert([
                'title' => $params['title'],
                'content' => $params['content'],
                'category_id' => $params['category'],
                'author_id' => Auth::user()->id,
                'image' => ''
            ]);
        
            if ($insert) {
                header('location: ' . URL . 'posts');
            } else {
                header('location: ' . URL . 'error');
            }
        }
    }
    
    public function edit($id) {
    
        $Post = new Post();
        $post = $Post->find($id);
    
        $Category = new Category();
        $categories = $Category->get();
        
        echo view('post.edit', compact('post', 'categories'));
        
    }
    
    public function update($id) {
        // Cek apakah ini POST request, jika buka redirect ke error
        if (empty($_POST)) header('location: ' . URL . 'error');
        
        $params = $_POST;
        
        $Post = new Post();
        $post = $Post->find($id);
    
        if (!empty($_FILES['image']['name'])) {
            $file = pathinfo($_FILES['image']['name']);
            
            $storage = ROOT . 'public/images/';
            $filename = uniqid() . '.' .  $file->extension;
            $target = $storage . $filename;
    
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        
                $update = $Post->update($id, [
                    'title' => $params['title'],
                    'content' => $params['content'],
                    'category_id' => $params['category'],
                    'author_id' => Auth::user()->id,
                    'image' => $filename
                ]);
        
                if ($update) {
                    header('location: ' . URL . 'posts');
                } else {
                    header('location: ' . URL . 'error');
                }
            } else {
                header('location: ' . URL . 'error');
            }
        } else {
            $update = $Post->update($id, [
                'title' => $params['title'],
                'content' => $params['content'],
                'category_id' => $params['category'],
                'author_id' => Auth::user()->id,
                'image' => $post->image
            ]);
    
            if ($update) {
                header('location: ' . URL . 'posts');
            } else {
                header('location: ' . URL . 'error');
            }
        }
    }
    
    public function delete($id) {
        $Post = new Post();
        
        if ($Post->delete($id)) {
            header('location: ' . URL . 'posts');
        } else {
            header('location: ' . URL . 'error');
        }
    }
}
