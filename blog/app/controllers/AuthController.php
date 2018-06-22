<?php

namespace App\Controllers;

use Sirius\Validation\Validator;
use App\Models\User;
use App\Log;

class AuthController extends BaseController {

    public function getLogin() {
        return $this->render('login.twig');
    }

    public function postLogin() {
        $validator = new Validator();
        $validator->add('email', 'required');
        $validator->add('email', 'email');
        $validator->add('password', 'required');

        if ($validator->validate($_POST)) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = User::where('email', $email)->first();
            if ($user) {
                if (password_verify($password, $user->password)) { 
                    // OK
                    $_SESSION['userId'] = $user->id;
                    Log::logInfo('Login userId: '. $user->id);
                    header('Location:' . BASE_URL . 'admin');
                    return null;
                }
            }

            // Not OK
            $validator->addMessage('email', 'Username and/or password does not match');
        } 

        $errors = $validator->getMessages();
        
        return $this->render('login.twig', [
            'errors' => $errors
        ]);
    }

    public function getLogout() {
        Log::logError('Login userId: '. $_SESSION['userId']);
        unset($_SESSION['userId']);
        header('Location: '. BASE_URL . 'auth/login');
    }
}