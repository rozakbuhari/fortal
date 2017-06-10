<?php

namespace App\Core;

class Application {
    private $url_controller = NULL;
    
    private $url_action = NULL;
    
    private $url_params = array();
    
    public function __construct() {
        
        $this->splitUrl();
        
        // Tambah pengecualian auth middleware untuk controller auth
//        if ($this->url_controller != 'auth') {
//            $middleware = new Middleware();
//        }
        
        if (!$this->url_controller) {
            
            $page = new \App\Controller\HomeController();
            $page->index();
            
        } elseif (file_exists(APP . 'Controller/' . ucfirst($this->url_controller) . 'Controller.php')) {
            
            $controller = "\\App\\Controller\\" . ucfirst($this->url_controller) . 'Controller';
            $this->url_controller = new $controller();
            
            if (method_exists($this->url_controller, $this->url_action)) {
                
                if (!empty($this->url_params)) {
                    call_user_func_array(array($this->url_controller, $this->url_action), $this->url_params);
                } else {
                    $this->url_controller->{$this->url_action}();
                }
                
            } else {
                if (strlen($this->url_action) == 0) {
                    $this->url_controller->index();
                } else {
                    header('location: ' . URL . 'error');
                }
            }
        } else {
            header('location: ' . URL . 'error');
        }
    }
    
    private function splitUrl() {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);
    
        $this->url_controller = isset($url[0]) ? $url[0] : NULL;
        $this->url_action = isset($url[1]) ? $url[1] : NULL;
    
        unset($url[0], $url[1]);
    
        $this->url_params = array_values($url);
        
//        json([$this->url_controller, $this->url_action, $this->url_params]);
        
    }
}
