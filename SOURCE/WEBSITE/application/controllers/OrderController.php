<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrderController extends CI_Controller {


	public function index()
	{
        $this->load->view('TemplateAD/header');
        $this->load->view('TemplateAD/navbar');
        $this->load->model('OrderModel');
        $data['Order'] = $this->OrderModel->selectOrder();
        $this->load->view('OrderAD/list', $data);
        $this->load->view('TemplateAD/footer');
	}


}
