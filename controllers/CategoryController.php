<?php
    class CategoryController{
        private Category $categoryModel;
        public function __construct()
        {
            $this->categoryModel = new Category();
        }
        public function index(){
            $categories = $this->categoryModel->getAll();
            $view = 'categories/index';
            $title = 'Danh sach danh muc';
            require_once PATH_VIEW_MAIN;
        }
        public function delete(){
            $id = $_POST['id'] ?? null;
            $category = $this->categoryModel->getById($id);
            if(!$category){
                $_SESSION['error'] = "Danh muc khong ton tai";
                header("Location: " . BASE_URL . "?action=categories");
                exit;
            }else{
                $_SESSION['success'] = "Danh muc da duoc xoa thanh cong";
                $this->categoryModel->delete($id);
                header("Location: " . BASE_URL . "?action=categories");
                exit;
            }
        }
        // Hien thi form them
        public function create(){
            $title = 'Them danh muc';
            $view = 'categories/create';
            require_once PATH_VIEW_MAIN;
        }
        // Xu ly them
        public function store(){
            $errors = $this->validate($_POST);
            if(!empty($errors)){
                $_SESSION['error'] = $errors;
                header("Location: " . BASE_URL . "?action=category/create");
                exit;
            }else{
                $data = [
                    'name' => $_POST['name'],
                ];
                if($this->categoryModel->create($data)){
                    $_SESSION['success'] = "Danh muc da duoc them thanh cong";
                    header("Location: " . BASE_URL . "?action=categories");
                    exit;
                }else{
                    $_SESSION['error'] = "Them danh muc that bai";
                    header("Location: " . BASE_URL . "?action=category/create");
                    exit;
                }
            }
        }
        // Hien thi form sua
        public function edit(){
            $id = $_GET['id'] ?? null;
            $category = $this->categoryModel->getById($id);
            if(!$category){
                $_SESSION['error'] = "Danh muc khong ton tai";
                header("Location: " . BASE_URL . "?action=categories");
                exit;
            }else{
                $title = 'Sua danh muc';
                $view = 'categories/edit';
                require_once PATH_VIEW_MAIN;
            }
        }
        // Xu ly sua
        public function update(){
            $id = $_POST['id'] ?? null;
            $category = $this->categoryModel->getById($id);
            if(!$category){
                $_SESSION['error'] = "Danh muc khong ton tai";
                header("Location: " . BASE_URL . "?action=categories");
                exit;
            }
            $errors = $this->validate($_POST);
            if(!empty($errors)){
                $_SESSION['error'] = $errors;
                header("Location: " . BASE_URL . "?action=category/edit&id=$id");
                exit;
            }else{
                $data = [
                    'id' => $id,
                    'name' => $_POST['name'],
                ];
                if($this->categoryModel->update($data)){
                    $_SESSION['success'] = "Danh muc da duoc cap nhat thanh cong";
                    header("Location: " . BASE_URL . "?action=categories");
                    exit;
                }else{
                    $_SESSION['error'] = "Cap nhat danh muc that bai";
                    header("Location: " . BASE_URL . "?action=category/edit&id=$id");
                    exit;
                }
            }
        }
        // Validate du lieu
        private function validate($data = []){
            $errors = [];
            if(empty($data['name'])){
                $errors[] = "Ten danh muc khong duoc de trong";
            }
            return $errors;
        }
    }
?>