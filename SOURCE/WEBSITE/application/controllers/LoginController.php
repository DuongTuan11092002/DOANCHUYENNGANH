<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{
		$this->load->view('TemplateLogin/header');
		$this->load->view('login/index');
		$this->load->view('TemplateLogin/footer');
	}

	public function login()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required', ['required' => 'Vui lòng nhập %s của bạn']);
		$this->form_validation->set_rules('password', 'Password', 'trim|required', ['required' => 'Vui lòng nhập %s của bạn']);

		if ($this->form_validation->run() == true) {
			//$this->load->view('myform');
			$email = $this->input->post('email'); //create a variable for the email 
			$password = md5($this->input->post('password')); //create a variable for the password
			$this->load->model('LoginModel'); //this is use all functions in file
			$result = $this->LoginModel->checkLogin($email, $password); //hàm checkLogin(có 2 biến đã tạo) được sử dụng trong model->LoginModel để kiểm tra dữ liệu

			//cho điều kiện if else
			if (count($result) > 0) {
				//mảng session 
				$session_array = array(
					//dòng id sẽ lấy kết quả $result[0] đầu tiên tham chiếu trong cột id database
					'accountName' => $result[0]->accountName,
					//dòng fullname sẽ lấy kết quả $result[0] đầu tiên tham chiếu trong cột fullname database
					'fullname' => $result[0]->fullname,
					//dòng email sẽ lấy kết quả $result[0] đầu tiên tham chiếu trong cột email database
					'email' => $result[0]->email,
				);
				$this->session->set_userdata('loggedIn', $session_array);
				//lệnh thông báo khi đăng nhập thành công
				$this->session->set_flashdata('success', 'Đăng nhập thành công');
				//nhảy trang khi đăng nhập thành công
				redirect(base_url('/dashboard'));
			} else {
				$this->session->set_flashdata('error', 'vui lòng đăng nhập lại');
				redirect(base_url('login'));
			}
		} else {
			$this->index();
		}
	}


	/* -------------------------------------------------------------------------- */
	/*                                ĐĂNG-KÝ-ADMIN                               */

	public function Register()
	{
		$this->load->view('TemplateLogin/header');
		$this->load->view('login/Register');
		$this->load->view('TemplateLogin/footer');
	}


	public function RegisterInsert()
	{
		$this->form_validation->set_rules('account', 'Tài khoản', 'trim|required', ['required' => 'Vui lòng nhập %s của bạn']);
		$this->form_validation->set_rules('email', 'Email', 'trim|required', ['required' => 'Vui lòng nhập %s của bạn']);
		$this->form_validation->set_rules('password', 'Password', 'trim|required', ['required' => 'Vui lòng nhập %s của bạn']);
		$this->form_validation->set_rules('fullname', 'Họ và Tên', 'trim|required', ['required' => 'Vui lòng nhập %s của bạn']);
		$this->form_validation->set_rules('address', 'Địa chỉ', 'trim|required', ['required' => 'Vui lòng nhập %s của bạn']);
		$this->form_validation->set_rules('phone', 'Số điện thoại', 'trim|required', ['required' => 'Vui lòng nhập %s của bạn']);

		if ($this->form_validation->run() == true) {
			//$this->load->view('myform');
			$account = $this->input->post('account');
			$email = $this->input->post('email'); //create a variable for the email 
			$password = md5($this->input->post('password')); //create a variable for the password
			$fullname = $this->input->post('fullname');
			$address = $this->input->post('address');
			$phone = $this->input->post('phone');
			$data = [
				// các cột database------------lấy từ các input 				
				'account' => $account,
				'email' => $email,
				'password' => $password,
				'fullname' => $fullname,
				'address' => $address,
				'phone' => $phone,
				'status' => 1,
			];
			$this->load->model('LoginModel');
			$result = $this->LoginModel->insertAdmin($data);

			//cho điều kiện if else
			if ($result) {

				//lệnh thông báo khi đăng nhập thành công
				$this->session->set_flashdata('success', 'Đăng ký thành công');
				//nhảy trang khi đăng nhập thành công
				redirect(base_url('/login'));
			} else {
				$this->session->set_flashdata('error', 'vui lòng đăng ký lại');
				redirect(base_url('register_admin'));
			}
		} else {
			$this->Register();
		}
	}
	/* -------------------------------------------------------------------------- */
}
