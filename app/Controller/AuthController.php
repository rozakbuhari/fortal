<?php

namespace App\Controller;

use App\Core\Controller;
use App\Model\User;
use Gregwar\Captcha\CaptchaBuilder;

class AuthController extends Controller {
    public function login() {
        
        $email = NULL;
        $password = NULL;
        
        $error = isset($_GET['error']) ? $_GET['error'] : FALSE;
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            if (!empty($_POST["email"]) && !empty($_POST["password"])) {
                $email = $_POST["email"];
                $password = $_POST["password"];
                
                $User = new User();
                $user = $User->getWhere(['email' => $email, 'password' => $password]);
                $user->roles = $User->roles($user->id);
    
    
                if (isset($user->id)) {
                    $_SESSION["authenticated"] = TRUE;
                    $_SESSION['user'] = $user;
    
                    header('Location: ' . URL);
                } else {
                    header('Location: ' . URL . 'auth/login?error=1');
                }
                
            } else {
                header('Location: ' . URL . 'auth/login?error=1');
            }
        } else {
            require APP . 'view/auth/login.php';
        }
    }
    
    public function logout() {
        session_destroy();
        header('Location: ' . URL);
    }
    
    public function register() {
        // Cek apakah ini POST request, jika buka redirect ke error
        if (empty($_POST)) header('location: ' . URL . 'error');
    
        $params = $_POST;
        $User = new User();
        
        $insert = $User->insert($params);
        
        if ($insert) {
            $_SESSION['user'] = $User->find($insert);
            $_SESSION['authenticated'] = true;
            
            header('location: ' . URL);
        } else {
            header('location: ' . URL . 'error');
        }
    }
    
    
    public function forgot() {
        echo "Form lupa password";
    }
    
    public function captcha() {
        $builder = new CaptchaBuilder;
        $builder->build();
    
        header('Content-type: image/jpeg');
        $builder->output();
    }
    
    public function profile() {
        
        echo view('profile');
        
    }
    
}
