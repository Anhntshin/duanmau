<?php
    class AuthController{
        private User $userModel;
        public function __construct()
        {
            $this->userModel = new User();
        }

        // Hien thi form dang nhap
        public function loginForm(){
            // Neu da dang nhap roi thi chuyen ve trang chu
            if(!empty($_SESSION['user'])){
                header("Location: " . BASE_URL . "?action=products");
                exit;
            }
            $title = 'Dang nhap';
            $view = 'auth/login';
            require_once PATH_VIEW_MAIN;
        }

        // Xu ly dang nhap
        public function login(){
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            // Validate
            $errors = [];
            if(empty($email)){
                $errors[] = "Email khong duoc de trong";
            }
            if(empty($password)){
                $errors[] = "Mat khau khong duoc de trong";
            }
            if(!empty($errors)){
                $_SESSION['error'] = $errors;
                header("Location: " . BASE_URL . "?action=login");
                exit;
            }

            // Kiem tra tai khoan
            $user = $this->userModel->getByEmail($email);
            if(!$user || !password_verify($password, $user['password'])){
                $_SESSION['error'] = ["Email hoac mat khau khong dung"];
                header("Location: " . BASE_URL . "?action=login");
                exit;
            }

            // Luu session
            $_SESSION['user'] = [
                'id' => $user['id'],
                'name' => $user['name'],
                'email' => $user['email']
            ];
            $_SESSION['success'] = "Dang nhap thanh cong";
            header("Location: " . BASE_URL . "?action=products");
            exit;
        }

        // Hien thi form dang ky
        public function registerForm(){
            if(!empty($_SESSION['user'])){
                header("Location: " . BASE_URL . "?action=products");
                exit;
            }
            $title = 'Dang ky';
            $view = 'auth/register';
            require_once PATH_VIEW_MAIN;
        }

        // Xu ly dang ky
        public function register(){
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $confirmPassword = $_POST['confirm_password'] ?? '';

            // Validate
            $errors = [];
            if(empty($name)){
                $errors[] = "Ten khong duoc de trong";
            }
            if(empty($email)){
                $errors[] = "Email khong duoc de trong";
            }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errors[] = "Email khong hop le";
            }
            if(empty($password)){
                $errors[] = "Mat khau khong duoc de trong";
            }elseif(strlen($password) < 6){
                $errors[] = "Mat khau phai co it nhat 6 ky tu";
            }
            if($password !== $confirmPassword){
                $errors[] = "Mat khau xac nhan khong khop";
            }

            // Kiem tra email da ton tai chua
            if(empty($errors)){
                $existingUser = $this->userModel->getByEmail($email);
                if($existingUser){
                    $errors[] = "Email nay da duoc su dung";
                }
            }

            if(!empty($errors)){
                $_SESSION['error'] = $errors;
                header("Location: " . BASE_URL . "?action=register");
                exit;
            }

            // Tao tai khoan
            $data = [
                'name' => $name,
                'email' => $email,
                'password' => password_hash($password, PASSWORD_DEFAULT)
            ];

            if($this->userModel->create($data)){
                $_SESSION['success'] = "Dang ky thanh cong, vui long dang nhap";
                header("Location: " . BASE_URL . "?action=login");
                exit;
            }else{
                $_SESSION['error'] = ["Dang ky that bai, vui long thu lai"];
                header("Location: " . BASE_URL . "?action=register");
                exit;
            }
        }

        // Dang xuat
        public function logout(){
            unset($_SESSION['user']);
            session_destroy();
            header("Location: " . BASE_URL . "?action=login");
            exit;
        }
    }
?>