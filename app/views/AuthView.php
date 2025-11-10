<?php
require_once 'View.php';

class AuthView extends View
{
    public function showLogin($error = null)
    {
        require './app/templates/formLogin.phtml';
    }
}
