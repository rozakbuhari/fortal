<?php

namespace App\Controller;

use App\Core\Controller;
use App\Model\SecurityQuestion;
use App\Model\User;
use Auth;
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
                $user->roles = $User->role($user->id);
    
    
                if (isset($user->id)) {
                    Auth::setAuthenticated(TRUE);
                    Auth::setUserId($user->id);
    
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
        if (empty($_POST)) header('location: ' . URL . 'error?not-post');
    
        $params = $_POST;
        $User = new User();
        
        $insert = $User->insert([
            'password' => $params['password'],
            'fullname' => $params['fullname'],
            'email' => $params['email'],
            'gender' => $params['gender'],
            'security_question_id' => $params['question'],
            'answer' => $params['answer']
        ]);
        
        if ($insert) {
            Auth::setUserId($insert);
            Auth::setAuthenticated(TRUE);
            
            header('location: ' . URL);
        } else {
            header('location: ' . URL . 'error');
        }
    }
    
    public function profileUpdate() {
        // Cek apakah ini POST request, jika buka redirect ke error
        if (empty($_POST)) header('location: ' . URL . 'error?not-post');
    
        $params = $_POST;
        $User = new User();
    
        $update = $User->update($params['id'], [
            'password' => $params['password'],
            'fullname' => $params['fullname'],
            'email' => $params['email'],
            'gender' => $params['gender'],
            'security_question_id' => $params['question'],
            'answer' => $params['answer']
        ]);
    
        if ($update) {
            Auth::setUserId($params['id']);
            
            header('location: ' . URL . 'auth/profile');
        } else {
            header('location: ' . URL . 'error');
        }
    }
    
    
    public function forgot() {
        $question = new SecurityQuestion();
        $questions = $question->get();
    
        echo view('auth.forgot', compact('questions'));
    }
    
    public function reset() {
        $params = $_POST;
        
        $User = new User();
        $user = $User->search([
            'email' => $params['email'],
            'security_question_id' => $params['question'],
            'answer' => $params['answer']
        ]);
        
        if ($user) {
            echo view('auth.reset', compact('user'));
        } else {
            json("User Not Found!");
        }
    }
    
    public function resetUpdate() {
        $params = $_POST;
        
        $User = new User();
        $user = $User->find($params['user']);
    
    
        $update = $User->update($user->id, [
            'password' => $params['password'],
            'fullname' => $user->fullname,
            'email' => $user->email,
            'gender' => $user->gender,
            'security_question_id' => $user->security_question_id,
            'answer' => $user->answer
        ]);
        
        if ($update) {
            Auth::setAuthenticated(TRUE);
            Auth::setUserId($user->id);
    
            header('Location: ' . URL);
        } else {
            header('Location: ' . URL . 'error');
        }
        
    }
    
    public function captcha() {
        $builder = new CaptchaBuilder;
        $builder->build();
    
        header('Content-type: image/jpeg');
        $builder->output();
    }
    
    public function profile() {
        
        $SecurityQuestion = new SecurityQuestion();
        $questions = $SecurityQuestion->get();
        
        echo view('profile', compact('questions'));
        
    }
    
}
