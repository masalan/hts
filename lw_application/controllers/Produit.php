<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produit extends Base_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Products_model', 'pdts');
        $this->load->model('categories_model', 'catgs');

        $this->load->helper('url');
        $this->load->library('tank_auth');
    }

    public function index()
    {
        $pdts = $this ->pdts ->fetchAll();
        $this->load->view('admin/produit/index', array('pdts' =>$pdts));
    }

    /**
     *  Ajoute Nouveau produit
     */
    public function newPdt()
    {
        $catgs = $this ->catgs ->fetchAll();
        $this->load->view('admin/produit/new', array('catgs' =>$catgs));
    }

    public function add()
    {

    }
}
