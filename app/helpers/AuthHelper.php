<?php

class AuthHelper {

    public static function init() {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    //inicia la session con el usuario enviado por parámetro
    public static function login($user) {
        AuthHelper::init();
        $_SESSION['USER_ID'] = $user->id_user;
        $_SESSION['USER_NAME'] = $user->username; 
    }

     //destruye la session iniciada
    public static function logout() {
        AuthHelper::init();
        session_destroy();
    }

    //verifica que este logeado el usuario (controllers)
    public static function verify() {
        AuthHelper::init();
        if (!isset($_SESSION['USER_ID'])) {
            header('Location: ' . BASE_URL . 'login');
            die();
        }
    }

    //chequea si se encuentra o no iniciada una session (views)
    public static function check() {
        AuthHelper::init();
        return isset($_SESSION['USER_ID']);
    }
}