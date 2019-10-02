<?php
/***
 * Ephraim 
**/
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Base_Controller
{

	
    public function __construct()
    {
		parent::__construct();
		$this->load->helper('url');
        $this->load->library('tank_auth');
        $this ->load ->model('Users_model', 'users');
    }

    public function index()
    {
        $this->load->view('admin/login');
    }

    public function login()
    {
        redirect('admin/dashboard');
    }

    public function sign_in()
    {
        $data = $this ->users ->check();

        var_dump($this ->input ->post('email'));

        /*if ($data == null) {
            $this ->session ->flashdata('Adresse email ou mot de passe incorrect');
        }

        $info = $data ->row();

        $_SESSION['id'] = $info ->id;
        $_SESSION['username'] = $info ->username;
        $_SESSION['email'] = $info ->email;

        redirect('admin/dashboard');*/
    }

    public function dashboard()
    {
        $this ->load ->view('admin/dahboard');
    }
}
