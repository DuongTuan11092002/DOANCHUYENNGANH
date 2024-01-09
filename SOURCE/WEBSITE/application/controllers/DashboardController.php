<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('LoginModel');
	}

	// trang index
	public function index()
	{
		$this->load->view('TemplateAD/header');
		$this->load->view('TemplateAD/navbar');
		$this->load->model('IndexModel');
		$data['contact'] = $this->IndexModel->ContactList();
		$data['donhang_chuaxuly'] = $this->LoginModel->Count_order_chuaxuly();
		$data['donhang_daxuly'] = $this->LoginModel->Count_order_daxuly();
		$data['count_user'] = $this->LoginModel->Count_user();
		// $data['sum_order'] = $this->LoginModel->getTotalAmountForAllOrders();

		$this->load->view('dashboardAD/index', $data);
		$this->load->view('TemplateAD/footer');
	}

	// hàm đăng xuất
	public function logout()
	{

		$this->session->unset_userdata('loggedIn');
		$this->session->set_flashdata('message', 'Logout Success');
		redirect(base_url('/login'));
	}

	public function delete($contactID)
	{
		$this->load->model('IndexModel');
		$this->IndexModel->delete($contactID);
		$this->session->set_flashdata('success', 'xoá thành công');
		redirect(base_url('/dashboard'));
	}
}
