<?php
switch ($menu) {
    case 'home':
        if(filter_input($id = INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)){
            require './login/allatkivalasztas.php';
        }else{
            require_once './login/home.php';
        }
        break;
    case 'orokbefogadas':
        require_once './login/orokbefogadasUser.php';
        break;
    case 'logout':
        require_once './login/logout.php';
        break;
    case 'orokbefogadasGuest':
        require_once './login/orokbefogadasGuest.php';
        break;
    case 'login':
        require_once './login/login.php';
        break;
    case 'register':
        require_once './login/regisztracio.php';
        break;
    case 'rolunk':
        require_once './login/rolunk.php';
        break;
    default:
        require_once './login/home.php';
        break;
}