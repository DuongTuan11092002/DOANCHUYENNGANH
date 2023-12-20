<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IndexController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('IndexModel');
		$this->data['Category'] = $this->IndexModel-> getCategoryHome();
		$this->data['AutoMaker'] = $this->IndexModel-> getAutoMakerHome();
	}

	public function index()
	{
		$this->data['ProductCar'] = $this->IndexModel-> getAllProducts();
		$this->load->view('Pages/Template/Header',$this->data);
		$this->load->view('Pages/Home',$this->data);
		$this->load->view('Pages/Template/Footer');
		
	}

	public function Category($id)
	{

		$this->load->view('Pages/Template/Header',$this->data);
		$this->load->view('Pages/Category',$this->data);
		$this->load->view('Pages/Template/Footer');
		
	}


	public function AutoMaker($AutoMakerID)
	{

		$this->load->view('Pages/Template/Header');
		$this->load->view('Pages/Brand');
		$this->load->view('Pages/Template/Footer');
		
	}

	public function Product($id)
	{

		$this->load->view('Pages/Template/Header');
		$this->load->view('Pages/Product_detail');
		$this->load->view('Pages/Template/Footer');
		
	}

	public function Cart()
	{

		$this->load->view('Pages/Template/Header');
		$this->load->view('Pages/Cart');
		$this->load->view('Pages/Template/Footer');
		
	}

	public function Login()
	{

		$this->load->view('Pages/Template/Header');
		$this->load->view('Pages/Login');
		$this->load->view('Pages/Template/Footer');
		
	}


}
