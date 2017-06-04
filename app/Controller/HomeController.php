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
use App\Model\Post;

class HomeController extends Controller
{
    /**
     * Halaman beranda
     */
    public function index()
    {
        $Post = new Post();
        $posts = $Post->get();
        
        echo view('beranda', compact('posts'));
    }

}
