<?php

namespace App\Controller;

use App\Core\Controller;
use App\Model\Post;
use App\Model\Tag;
use App\Model\User;

class PostsController extends Controller {
    
    public function index() {
        
        $post = new Post();
        
        $posts = $post->get();
    
        echo view('beranda', compact('posts'));
    }
    
    public function create() {
        
        $title = "Tambah Member Baru";
        
        require APP . "view/_templates/header.php";
        require APP . "view/members/create.php";
        require APP . "view/_templates/footer.php";
        
    }
    
    public function store() {
        // Cek apakah ini POST request, jika buka redirect ke error
        if (empty($_POST)) header('location: ' . URL . 'error');
        
        $params = $_POST;
        $Member = new Post();
        $isAdded = $Member->add($params);
        
        if ($isAdded) {
            $User = new User();
            $user = $User->add($params);
            
            if ($user) header('location: ' . URL . 'members'); else header('location: ' . URL . 'error');
        } else header('location: ' . URL . 'error');
    }
    
    public function edit($id) {
        
        $title = "Perbarui Data Member";
        
        $Member = new Post();
        $member = $Member->get($id);
        
        require APP . "view/_templates/header.php";
        require APP . "view/members/edit.php";
        require APP . "view/_templates/footer.php";
        
    }
    
    public function update($id) {
        // Cek apakah ini POST request, jika buka redirect ke error
        if (empty($_POST)) header('location: ' . URL . 'error');
        
        $params = $_POST;
        
        $Member = new Post();
        $isUpdated = $Member->update($id, $params);
        
        if ($isUpdated) header('location: ' . URL . 'members'); else
            header('location: ' . URL . 'error');
        
    }
}
