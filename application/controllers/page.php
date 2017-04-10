<?php if (!defined('BASEPATH')) exit ('No direct script access allowed');

class Page extends CI_Controller{
    public function __construct(){
        parent::__construct();
        echo '';
    }
    public function index(){
        echo "1";
    }
    public function home(){
        $this->load->view('header');
    }
    public function one($p1, $p2){
        echo "testing $p1 $p2";
    }
    public function two(){
        echo "test";
    }
}

?>