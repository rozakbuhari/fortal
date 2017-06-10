<?php

use Jenssegers\Blade\Blade;

function view($filename, $data = []) {
    $blade = new Blade(VIEW_FOLDER, ROOT . '.cache');
    return $blade->make($filename, $data);
}


/*
 * Facade buat authentikasi
 */
class Auth {
    
    public static function user() {
        $User = new \App\Model\User();
        return isset($_SESSION['user_id']) ? $User->find($_SESSION['user_id']) : new stdClass();
    }
    
    public static function setUserId($id) {
        $_SESSION['user_id'] = $id;
    }
    
    public static function authenticated() {
        return isset($_SESSION['authenticated']);
    }
    
    public static function setAuthenticated($is_authenticated) {
        return $_SESSION['authenticated'] = $is_authenticated;
    }
}

function json($param) {
    header('Content-Type: application/json');
    echo json_encode($param);
    exit(0);
}
