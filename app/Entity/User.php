<?php 
namespace App\Entity;
session_start();
use App\Database;
use PDO;

class User {
    private $id;
    private $nome;
    private $email;
    private $password;
    private $foto;

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }

    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email = $email;
    }

    public function getPassword(){
        return $this->password;
    }
    public function setPassword($password){
        $this->password = $password;
    }

    public function getFoto(){
        return $this->foto;
    }
    public function setFoto($foto){
        $this->foto = $foto;
    }

    public function create()
    {
        $db = new Database();
        $data = [
            ':nome' => $this->getNome(),
            ':email' => $this->getEmail(),
            ':password' => password_hash($this->getPassword(), PASSWORD_DEFAULT),
        ];

        $query = 'INSERT INTO users (nome, email, password) values (:nome, :email, :password)';
        $db->executeQuery($query, $data);

        $_SESSION['login'] = [
            'id' => $db->lastInsertId(),
            'nome' => $this->getNome(),
            'email' => $this->getEmail(),
        ];

        header('location: ../../index.php');
        exit;

    }

    public function findyByEmail($email) 
    {
        $db = new Database();
        return $db->findyByEmail('users', $email);
    }

}