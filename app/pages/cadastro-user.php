<?php
session_start();
session_destroy();

use App\Database;
use App\Entity\User;

require '../../vendor/autoload.php';

$user = new User();
$db = new Database();

if(!empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['password'])) {
    $buscaPorEmail = $db->findyByEmail('users', $_POST['email']);
    if($buscaPorEmail == false) {
        $user->setNome($_POST['nome']);
        $user->setEmail($_POST['email']);
        $user->setPassword($_POST['password']);
        $user->create();
        $_SESSION['alert'] = [
            'success' => 'Salvo com sucesso!'
        ];
    } else {
        $_SESSION['alert'] = [
            'validar-dados' => 'Esse email ja está sendo utilizado'
        ];    
    }
} elseif((!empty($_POST) && (empty($_POST['nome']) or empty($_POST['email']) or empty($_POST['password'])))) {
    $_SESSION['alert'] = [
        'validar-dados' => 'Favor, verifique se todos os dados estão preechidos'
    ];
}

include '../templates/html-cadastro-user.php';
