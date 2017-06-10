<?php

namespace app\Controller;

use App\Core\Controller;

class DashboardController extends  Controller {
    
    public function index() {
        echo view('dashboard');
    }
}