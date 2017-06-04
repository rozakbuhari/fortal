<?php

namespace App\Core;

class Controller {
    
    public $Auth = NULL;
    private $User = NULL;
    private $AuthItem = NULL;
    private $isAdmin = FALSE;
    
    public function __construct() {
        $this->Auth = new \stdClass();
        $this->User = isset($_SESSION['user']) ? $_SESSION['user'] : null ;
//        self::setAuthItem($this->User->roles);
//
        $this->Auth->user = $this->User;
//        $this->Auth->items = $this->AuthItem;
//        $this->Auth->isAdmin = $this->isAdmin;
    
    }
    
    private function setAuthItem($roles) {
        $items = [];
        foreach ($roles as $role) {
            
            switch ($role->name) {
                case 'admin':
                    $items[] = ['icon' => 'assignment_ind', 'label' => 'Pinjaman', 'link' => URL . 'borrows'];
                    $items[] = ['icon' => 'assignment_ind', 'label' => 'Anggota', 'link' => URL . 'members'];
                    $this->isAdmin = TRUE;
                default:
                    $items[] = ['icon' => 'book', 'label' => 'Buku', 'link' => URL . 'books'];
                    $items[] = ['icon' => 'dashboard', 'label' => 'Beranda', 'link' => URL];
            }
        }
        rsort($items);
        $this->AuthItem = $items;
    }
    
    
}