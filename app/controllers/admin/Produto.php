<?php
defined('ROOTPATH') OR exit("Access denied.");
class Produto extends Controller
{
    use Model;

    public function __construct(){
        Session::start();
        Session::set('pagina', 'Produtos');
        $this->blocker('admin/login');
        $this->view('master');
    }

    public function index(){
        $this->view('admin/header');
        $this->view('admin/produto/home');
    }
    
    
}