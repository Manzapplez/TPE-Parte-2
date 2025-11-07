<?php

// require_once './app/helpers/AuthHelper.php';

class View
{
    protected $session; //define si está iniciada la session o no 

    public function __construct()
    {
        // $this->session = AuthHelper::check();
    }

    public function showError()
    {
        require './app/templates/error.phtml';
    }
}
