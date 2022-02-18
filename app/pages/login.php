<?php
session_start();
session_destroy();

use App\Entity\Login;

require '../../vendor/autoload.php';

$login = new Login();
if(!empty($_POST['email'])) {
    $login->login($_POST['email'], 'asdf');
}
include '../templates/html-login.php';