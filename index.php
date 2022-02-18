<?php 
session_start();

require __DIR__ . '/vendor/autoload.php';

include __DIR__ . '/app/templates/app.php';

if(empty($_SESSION['login'])) {
    header('Location: /app/pages/login.php');
    exit;
}