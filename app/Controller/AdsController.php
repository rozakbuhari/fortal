<?php

namespace App\Controller;

use App\Core\Controller;
use App\Model\Ad;
use App\Model\Category;
use Carbon\Carbon;

class AdsController extends Controller {
    
    public function index() {
        $Ad = new Ad();
        $ads = $Ad->get();
        $total = 0;
        
        echo view('ad.index', compact('ads', 'total'));
    }
    
    public function show($id) {
    
    }
    
    public function create() {
        
        echo view('ad.create');
        
    }
    
    
    public function store() {
        $params = $_POST;
        
        $Ad = new Ad();
    
        if (!empty($_FILES['image']['name'])) {
    
            $file = pathinfo($_FILES['image']['name']);
    
            $storage = ROOT . 'public/images/';
            $filename = uniqid() . '.' .  $file->extension;
            $target = $storage . $filename;
    
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                $insert = $Ad->insert([
                    'image' => $filename,
                    'text' => $params['text'],
                    'expired' => $params['expired']
                ]);
    
                if ($insert) {
                    header('location: ' . URL . 'ads');
                } else {
                    header('location: ' . URL . 'error');
                }
            } else {
                header('location: ' . URL . 'error');
            }
        } else {
            header('location: ' . URL . 'error');
        }
    }
    
    public function edit($id) {
        
    }
    
    public function update($id) {
    
    }
    
    public function delete($id) {
    
    }
}
