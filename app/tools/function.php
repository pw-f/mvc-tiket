<?php

function getLoginAccount(){
    if (isset($_SESSION['user'])) {
        return $_SESSION['user'];
    } else {
        return null;
    }
};

function dd($vars){
    var_dump($vars);
    die;
}

function redirect($location) {
    $path = BASEURL . "/$location";
    header("Location: $path");
    die;
}


function login($data){
    if(isset($data['password'])){
        unset($data['password']);
    }

    $_SESSION['user'] = $data;
}


function logout(){
    $user = getLoginAccount();

    if($user != null){
        unset($_SESSION['user']);
        return redirect('login');
    }
}

function login_required() {
    $user = getLoginAccount();
    if ($user == null) {
        return redirect('login');
    }
}

function http_post_only() {
    $method = strtoupper($_SERVER['REQUEST_METHOD']);
    if ($method != 'POST') {
        return redirect('home');
    }
}

function e($str) {
    if ($str == null) {
        return null;
    }

    return htmlspecialchars($str);
}

function component($component, $data = []) {
    require_once "../app/views/components/{$component}.php";
}

function uploadFile($requestFile, $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }

    $fileName = basename($requestFile['name']);
    $targetFilePath = $dir . DIRECTORY_SEPARATOR . $fileName;

    if (move_uploaded_file($requestFile['tmp_name'], $targetFilePath)) {
        return $targetFilePath;
    } else {
        return false;
    }
}


function renderStorageUrl($storagePath) {
    if (!file_exists($storagePath)) {
        return false;
    }

    $baseUrl = BASEURL;
    $relativePath = str_replace($_SERVER['DOCUMENT_ROOT'], '', realpath($storagePath));

    $publicUrl = $baseUrl . '/' . ltrim($relativePath, '/');

    return $publicUrl;
}
