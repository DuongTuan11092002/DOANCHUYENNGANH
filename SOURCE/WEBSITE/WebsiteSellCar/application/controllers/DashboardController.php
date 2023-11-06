<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {

   
	// trang index
	public function index()
	{	
		$this->load->view('TemplateAD/header');
		$this->load->view('TemplateAD/navbar');
		$this->load->view('dashboardAD/index');
		$this->load->view('TemplateAD/footer');
        
	}

// hàm đăng xuất
    public function logout() 
    {

        $this->session->unset_userdata('loggedIn');
        $this->session->set_flashdata('message', 'Logout Success');
        redirect(base_url('/login'));
    }

}


