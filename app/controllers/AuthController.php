<?php

require_once './app/models/UserModel.php';
require_once './app/views/AuthView.php';
require_once './app/helpers/AuthHelper.php';

class AuthController
{
    private $model;
    private $view;

    public function __construct()
    {
        $this->view = new AuthView();
        $this->model = new UserModel();
    }

    public function login()
    {
        $this->view->showLogin();
    }

    public function auth()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (empty($username) || empty($password)) {
            $this->view->showLogin('Faltan completar datos');
            return;
        }

        $user = $this->model->getByUser($username);

        if (!$user) {
            $this->view->showLogin('Usuario no encontrado');
            return; // retorna si no encuentra user
        }

        if ($user && password_verify($password, $user->password)) { //checkeamos que el user este en la db
            AuthHelper::login($user);
            header('Location: ' . BASE_URL . 'songs');
        } else {
            $this->view->showLogin('Usuario y/o contraseña inválidos');
        }
    }

    public function logout()
    {
        AuthHelper::logout();
        header('Location: ' . BASE_URL . 'songs');
    }
}