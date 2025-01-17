<?php
    $url = $_SERVER['REQUEST_URI'];

    if($url == '/php/y/'){
        include './home.php';
    }else if($url == '/php/y/login'){
        include './components/login.php';
    }else if($url == '/php/y/signup'){
        include './components/signup.php';
    }else if($url == '/php/y/logout'){
        include './components/logout.php';
    }else{
        http_response_code(404);
        echo "404 - Page Not Found";
        exit;
    }
?>