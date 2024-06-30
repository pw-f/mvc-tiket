<?php

function getLoginAccount(){
    if (isset($_SESSION['user'])) {
        return $_SESSION['user'];
    }
    return null;
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
        Flasher::set('danger', 'Please login first');
        return redirect('login');
    }
}

function admin_only()
{
    $user = getLoginAccount();
    if ($user == null) {
        Flasher::set('danger', 'Please login first');
        return redirect('login');
    }

    if ($user['id_role'] !== ADMIN_ROLE) {
        Flasher::set('danger', 'You do not have permission to access this page.');
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
    // Periksa apakah folder tujuan ada atau tidak
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }

    // Penamaan biar gampang
    $fileName = $requestFile['name'];
    $type = $requestFile['type'];
    $size = $requestFile['size'];
    $tmp_name = $requestFile['tmp_name'];
    $error = $requestFile['error'];

    // Cek error atau tidak
    if ($error > 0) {
        Flasher::set('danger', 'File upload failed with message: please fill all the fields');
        Flasher::set_user('File upload failed with message: please fill all the fields');
        return false;
    }

    // Cek tipe file
    if (!in_array($type, ['image/jpg', 'image/jpeg', 'image/png'])) {
        Flasher::set('danger', 'File type not supported (image/jpg, image/jpeg, image/png)');
        Flasher::set_user('File type not supported (image/jpg, image/jpeg, image/png)');
        return false;
    }

    // Cek ekstensi file
    $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    if (!in_array($ext, ['jpg', 'jpeg', 'png'])) {
        Flasher::set('danger', 'File extension not supported (jpg, jpeg, png)');
        Flasher::set_user('File extension not supported (jpg, jpeg, png)');
        return false;
    }

    // Cek ukuran file
    if ($size > 5000000) {
        Flasher::set('danger', 'File too large max size is 5mb');
        Flasher::set_user('File too large max size is 5mb');
        return false;
    }

    // Penamaan file baru
    $newFileName = uniqid() . '.' . $ext;
    $targetFilePath = $dir . DIRECTORY_SEPARATOR . $newFileName;

    // Upload file
    if (move_uploaded_file($tmp_name, $targetFilePath)) {
        Flasher::set('success', 'File uploaded successfully');
        Flasher::set_user('File uploaded successfully');
        //mengembalikan nama file agar diolah di controller menjadi localhost bukan local directory
        return $newFileName;
    } else {
        // Dapatkan pesan error terakhir
        $error = error_get_last();
        echo 'Move uploaded file error: ' . $error['message'] . '<br>';
        Flasher::set('danger', 'File not uploaded, unknown error: ' . $error['message']);
        Flasher::set_user('File not uploaded, unknown error: ' . $error['message']);
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
