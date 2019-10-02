<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorie extends Base_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('tank_auth');
        $this->load->model('categories_model', 'catgs');
    }

    public function index()
    {
        $catgs = $this ->catgs ->fetchAll();
        $this->load->view('admin/categorie/index', array('catgs' =>$catgs));
    }

    public function newCatg()
    {
        $this->load->view('admin/categorie/new');
    }

    public function add()
    {
        $this ->catgs ->create();
        redirect('categorie');
    }

    public function show($id)
    {
        $catg = $this ->catgs ->get($id) ->row();
        $pdts = $this ->catgs ->get_catg_pdts($id);

        $this ->load ->view('admin/categorie/show', array('catg' =>$catg, 'pdts' =>$pdts));
    }

    public function edit($id)
    {
        $catg = $this ->catgs ->get($id) ->row();

        $this ->load ->view('admin/categorie/edit', array('catg' =>$catg));
    }

    public function update($id)
    {
        $this ->catgs ->update($id);
        redirect('categorie/edit/'.$id);
    }
}
