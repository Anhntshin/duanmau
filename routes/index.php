<?php

$action = $_GET['action'] ?? '/';

// Cac route KHONG can dang nhap
$publicActions = ['login', 'login/process', 'register', 'register/process'];

// Kiem tra dang nhap cho cac trang admin
if(!in_array($action, $publicActions) && $action !== '/'){
    if(empty($_SESSION['user'])){
        header("Location: " . BASE_URL . "?action=login");
        exit;
    }
}

match ($action) {
    '/'         => (new HomeController)->index(),

    // === Auth ===
    'login'             => (new AuthController)->loginForm(),
    'login/process'     => (new AuthController)->login(),
    'register'          => (new AuthController)->registerForm(),
    'register/process'  => (new AuthController)->register(),
    'logout'            => (new AuthController)->logout(),

    // === Product ===
    'products'       => (new ProductController)->index(),
    'product/delete' => (new ProductController)->delete(),
    'product/create' => (new ProductController)->create(),
    'product/store'  => (new ProductController)->store(),
    'product/edit'   => (new ProductController)->edit(),
    'product/update' => (new ProductController)->update(),

    // === Category ===
    'categories'      => (new CategoryController)->index(),
    'category/delete' => (new CategoryController)->delete(),
    'category/create' => (new CategoryController)->create(),
    'category/store'  => (new CategoryController)->store(),
    'category/edit'   => (new CategoryController)->edit(),
    'category/update' => (new CategoryController)->update(),

    default     => (new ProductController)->index(),
};