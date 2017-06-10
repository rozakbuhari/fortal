<?php

/**
 * Class HomeController
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */

namespace App\Controller;

use App\Core\Controller;
use App\Model\Ad;
use App\Model\Category;
use App\Model\Post;
use App\Model\SecurityQuestion;

class HomeController extends Controller
{
    /**
     * Halaman beranda
     */
    public function index()
    {
        $Post = new Post();
        if (!empty($_POST)) {
            
            $posts = $Post->getWhere([$_POST['filter'] => $_POST['query']]);
        } else {
            $posts = $Post->get();
        }
        
        $category = new Category();
        $categories = $category->get();
        
        $question = new SecurityQuestion();
        $questions = $question->get();
        
        $Ad = new Ad();
        $ads = $Ad->notExpired();
        
        echo view('beranda', compact('posts', 'categories', 'questions', 'ads'));
    }

}
