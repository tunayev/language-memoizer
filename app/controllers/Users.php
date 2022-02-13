<?php

class Users extends Controller {
    public function __construct() {
        $this->userModel = $this->model('User');
    }

    public function register() {
        // Check for Post
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form

            // Sanitize data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'name_error' => '',
                'email_error' => '',
                'password_error' => '',
                'confirm_password_error' => ''

            ];

            // Validate data
            if(empty($data['email'])) {
                $data['email_err'] = "Please enter email";
            } else {
                if($this->userModel->findEmail($data['email'])) {
                $data['email_err'] = "There is an email";
                }
            }

            if(empty($data['name'])) {
                $data['name_err'] = "Please enter name";
            }

            if(empty($data['password'])) {
                $data['password_err'] = "Please enter password";
            } elseif(strlen($data['password']) < 6) {
                $data['password_err'] = "Password must be at least 6 characters";
            }

            if(empty($data['confirm_password'])) {
                $data['confirm_password_err'] = "Please confirm password";
            } elseif($data['confirm_password'] !== $data['password']) {
                $data['confirm_password_err'] = "Passwords do not match!";
            }

            // Make sure errors are empty
            if(empty($data['name_err']) && empty($data['email_err']) && empty($data['confirm_password_err']) && empty($data['password_err'])) {
                // Hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                // Register User
                if ($this->userModel->register($data)) {
                    flash('register_success', 'You are successfully registered and login');
                    redirect('users/login');
                } else {
                    die('Something went wrong');
                }
            } else {
                $this->view('users/register', $data);
            }
        } else {
            // Inıt data - load form
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'name_error' => '',
                'email_error' => '',
                'password_error' => '',
                'confirm_password_error' => ''

            ];
            
            //Load view
            $this->view('users/register', $data);
        }
    }

    public function login() {
        // Check for Post
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form

            // Sanitize data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_error' => '',
                'password_error' => ''

            ];

            // Validate data
            if(empty($data['email'])) {
                $data['email_err'] = "Please enter email";
            }

            if(empty($data['password'])) {
                $data['password_err'] = "Please enter password";
            }

            // Check for user/mail
            if ($this->userModel->findEmail($data['email'])) {  
                // User found
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);
                
                if($loggedInUser) {
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['password_err'] = 'Incorrect password.';
                }
            } else {
                $data['email_err'] = 'No user found';
            }

            // Make sure errors are empty
            if(empty($data['email_err']) && empty($data['password_err'])) {
                // Validated
                die('SUCCESS');
            } else {
                $this->view('users/login', $data);
            }
        } else {
            // Inıt data - load form
            $data = [
                'email' => '',
                'password' => '',
                'email_error' => '',
                'password_error' => '',

            ];
            
            //Load view
            $this->view('users/login', $data);
        }
    }

    public function createUserSession($user) {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->name;
        $_SESSION['is_admin'] = $user->is_admin;

        redirect('vocabs');
    }

    public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('users/login');
    }
}