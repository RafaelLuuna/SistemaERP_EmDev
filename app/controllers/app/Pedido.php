<?php

defined("ROOTPATH") OR exit("Acces denied.");

class Pedido extends Controller
{
    use Model;

    public function __construct(){
        $this->blocker('login');
        $this->view('master');
    }

    public function index(){
        $this->view('app/header');
        $this->view('app/pedido/pedido');
    }
    
    
}