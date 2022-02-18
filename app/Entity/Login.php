<?php 

namespace App\Entity;

class Login {
    public function login($email, $senha) 
    {
        $user = New User();
        $objUser = $user->findyByEmail($email);
        echo "<pre>"; print_r($objUser); echo '</pre>';exit;
    }
}