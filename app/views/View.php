<?php

require_once './app/helpers/AuthHelper.php';

class View
{
    protected $session;

    public function __construct()
    {
        $this->session = AuthHelper::check();
    }

    public function showError()
    {
        require './app/templates/error.phtml';
    }
}
