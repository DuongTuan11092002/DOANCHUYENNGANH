<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IndexController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('IndexModel');
		$this->load->library('cart');
		$this->data['Category'] = $this->IndexModel-> getCategoryHome();
		$this->data['AutoMaker'] = $this->IndexModel-> getAutoMakerHome();
	}

	public function index()
	{
		$this->data['AllProductCar'] = $this->IndexModel-> getAllProducts(); //load data
		$this->load->view('Pages/Template/Header',$this->data);
		$this->load->view('Pages/Home',$this->data);
		$this->load->view('Pages/Template/Footer');
		
	}
/* -------------------------------------------------------------------------- */
/*                                  DANH MỤC                                  */

public function Category($id)
{
	$this->data['Category_Product'] = $this->IndexModel->getCategoryProduct($id); //load data
	$this->data['title'] = $this->IndexModel->getCategoryTitle($id); //title
	$this->load->view('Pages/Template/Header',$this->data);
	$this->load->view('Pages/Category',$this->data);
	$this->load->view('Pages/Template/Footer');
	
}


public function AutoMaker($AutoMakerID)
{
	$this->data['AutoMaker_Product'] = $this->IndexModel->getAutoMakerProduct($AutoMakerID); //load data
	$this->data['title'] = $this->IndexModel->getAutoMakerTitle($AutoMakerID);
	$this->load->view('Pages/Template/Header',$this->data);
	$this->load->view('Pages/Brand',$this->data );
	$this->load->view('Pages/Template/Footer');
	
}
/* -------------------------------------------------------------------------- */
/* -------------------------------------------------------------------------- */
/*                              CHI TIẾT SẢN PHẨM                             */

public function ProductCar($id)
{
	$this->data['Product_Detail'] = $this->IndexModel->getProductDetail($id); //load data
	$this->data['AllProductCar'] = $this->IndexModel-> getAllProducts(); //load data

	$this->load->view('Pages/Template/Header', $this->data);
	$this->load->view('Pages/Product_detail', $this->data);
	$this->load->view('Pages/Template/Footer');
	
}
/* -------------------------------------------------------------------------- */


	/* -------------------------------------------------------------------------- */
	/*                                  GIỎ HÀNG                                  */

	public function Cart()
	{

		$this->load->view('Pages/Template/Header', $this->data);
		$this->load->view('Pages/Cart');
		$this->load->view('Pages/Template/Footer');
		
	}

//Chức năng đặt hàng và số lượng trong trang chi tiết sản phẩm
	public function AddToCart(){
		 $product_id = $this->input->post('product_id');
		 $quantity = $this->input->post('quantity');
		$this->data['Product_Detail'] = $this->IndexModel->getProductDetail($product_id); //load data
		//DAT-HANG có thư viện có sẵn của CodeIgniter
		foreach ($this->data['Product_Detail'] as $key => $value){
		$cart = array(
			'id'      => $value -> productCarID,
			'qty'     => $quantity,
			'price'   => $value -> giasanpham,
			'name'    => $value -> productCarDetailName,
			'options' => array('image' => $value -> images)
		);
		//hàm thêm giỏ hàng
		$this->cart->insert($cart);
		redirect(base_url().'gio-hang','refresh');
	}

	}
	/* -------------------------------------------------------------------------- */
	/* -------------------------------------------------------------------------- */
	/*                            XÓA GIỎ HÀNG                            */
	//xóa tất cả
	public function DeleteAllCart(){
		$this->cart->destroy();
		redirect(base_url().'gio-hang','refresh');
	}
	
	//xóa từng sản phẩm
	public function DeleteItemCart($rowid){
		$this->cart->remove($rowid);
		redirect(base_url().'gio-hang','refresh');
	}
	/*                            CẬP NHẬT GIỎ HÀNG                            */
	public function UpdateCart(){
		$rowid = $this->input->post('rowid');
		$quantity = $this->input->post('quantity');
		foreach($this->cart->contents() as $items) {
			if($rowid == $items['rowid']) {
				$cart = array( //cho phép chỉnh sửa số lượng
					'rowid' => $rowid, //tip: cần phải có rowid mới cập nhật số lượng được
					'qty'     => $quantity, //tip: số lượng tăng hoặc giảm
				);
			
			}
		}
		$this->cart->update($cart);
		//redirect(base_url().'gio-hang','refresh');
		redirect($_SERVER['HTTP_REFERER']);
	}
/* -------------------------------------------------------------------------- */
/* --------------------------- KIỂM-TRA-THANH-TOÁN -------------------------- */
	public function Checkout() {
		//kiểm tra khi customer login chưa nếu cố vào trang thanh toán(Checkout) thì đây ra trang giỏ hàng
		if($this->session->userdata('loggedInCustomer')){ 
			$this->load->view('Pages/Template/Header', $this->data);
			$this->load->view('Pages/Checkout');
			$this->load->view('Pages/Template/Footer');
		}else{
			redirect(base_url().'gio-hang', 'refresh');	
		}
	}



/* ------------------------------------ - ----------------------------------- */

/* -------------------------------------------------------------------------- */
/*                            DANG-NHAP-KHACH-HANG                            */
public function Login()
{
	
			$this->load->view('Pages/Template/Header');
			$this->load->view('Pages/Login');
			$this->load->view('Pages/Template/Footer');
			

	
}


public function loginCustomer()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required', ['required' => 'Vui lòng nhập %s của bạn']);
		$this->form_validation->set_rules('password','Password', 'trim|required', ['required' => 'Vui lòng nhập %s của bạn']);

		if ($this->form_validation->run() == true) 
		{
				//$this->load->view('myform');
				$email = $this->input->post('email'); //create a variable for the email 
				$password = md5($this->input->post('password')); //create a variable for the password
				$this->load->model('LoginModel'); //this is use all functions in file
				$result = $this->LoginModel->checkLoginCustomer($email, $password); //hàm checkLogin(có 2 biến đã tạo) được sử dụng trong model->LoginModel để kiểm tra dữ liệu
				
				//cho điều kiện if else
				if(count($result) > 0)
				{
					//mảng session 
					$session_array = array(
						//dòng id sẽ lấy kết quả $result[0] đầu tiên tham chiếu trong cột id database
						'accountName' => $result[0]->accountName,
						//dòng fullname sẽ lấy kết quả $result[0] đầu tiên tham chiếu trong cột fullname database
						'fullname' => $result[0]->fullname,
						//dòng email sẽ lấy kết quả $result[0] đầu tiên tham chiếu trong cột email database
						'email' => $result[0]->email,
					);
					$this->session->set_userdata('loggedInCustomer',$session_array);
					//lệnh thông báo khi đăng nhập thành công
					$this->session->set_flashdata('success','Đăng nhập thành công');
					//nhảy trang khi đăng nhập thành công
					redirect(base_url('/kiem-tra-thanh-toan'));
				}else{
					$this->session->set_flashdata('error','Sai tài khoản hoặc mật khẩu');
					redirect(base_url('/dang-nhap'));
				}
			}
		else
		{
				$this->Login();
		}
	}



	public function Logout() {
		$this->session->unset_userdata('loggedInCustomer');
		redirect(base_url('/dang-nhap'));
	}

/* -------------------------------------------------------------------------- */

/* -------------------------------------------------------------------------- */
/*                              ĐĂNG-KÝ-CUSTOMER                              */
public function Register()
{
	
			$this->load->view('Pages/Template/Header');
			$this->load->view('Pages/Register');
			$this->load->view('Pages/Template/Footer');
	
}

public function registerCustomer(){
	$this->form_validation->set_rules('account', 'Tài khoản', 'trim|required', ['required' => 'Vui lòng nhập %s của bạn']);
	$this->form_validation->set_rules('fullname','Họ và tên', 'trim|required', ['required' => 'Vui lòng nhập %s của bạn']);
	$this->form_validation->set_rules('address', 'Địa chỉ', 'trim|required', ['required' => 'Vui lòng nhập %s của bạn']);
	$this->form_validation->set_rules('phone', 'Số điện thoại', 'trim|required', ['required' => 'Vui lòng nhập %s của bạn']);
	$this->form_validation->set_rules('email', 'Email', 'trim|required', ['required' => 'Vui lòng nhập %s của bạn']);
	$this->form_validation->set_rules('password','Password', 'trim|required', ['required' => 'Vui lòng nhập %s của bạn']);

	if ($this->form_validation->run() == true) 
	{
			//$this->load->view('myform');
			$account = $this->input->post('account');
			$fullname = $this->input->post('fullname');
			$address = $this->input->post('address');
			$phone = $this->input->post('phone');
			$email = $this->input->post('email'); //create a variable for the email 
			$password = md5($this->input->post('password')); //create a variable for the password
			$data = array(
				'account' => $account,
				'fullname' => $fullname,
				'address' => $address,
				'phone' => $phone,
				'email' => $email,
				'password' => $password

			);
			$this->load->model('LoginModel'); //this is use all functions in file
			$result = $this->LoginModel->RegisterCustomer($data); //hàm checkLogin(có 2 biến đã tạo) được sử dụng trong model->LoginModel để kiểm tra dữ liệu
			
			//cho điều kiện if else
			if($result)
			{
				//mảng session 
				$session_array = array(
					//dòng id sẽ lấy kết quả $result[0] đầu tiên tham chiếu trong cột id database
					'accountName' => $account,
					//dòng fullname sẽ lấy kết quả $result[0] đầu tiên tham chiếu trong cột fullname database
					'fullname' => $fullname,
					//dòng email sẽ lấy kết quả $result[0] đầu tiên tham chiếu trong cột email database
					'email' => $email,
				);
				$this->session->set_userdata('loggedInCustomer',$session_array);
				//lệnh thông báo khi đăng nhập thành công
				$this->session->set_flashdata('success','Đăng nhập thành công');
				//nhảy trang khi đăng nhập thành công
				redirect(base_url('/kiem-tra-thanh-toan'));
			}else{
				$this->session->set_flashdata('error','Sai tài khoản hoặc mật khẩu');
				redirect(base_url('dang-ky'));
			}
		}
	else
	{
			$this->Register();
	}
}

/* -------------------------------------------------------------------------- */

/* -------------------------------------------------------------------------- */
/*                               XỬ-LÝ-ĐẶT-HÀNG                               */
public function ConfirmCheckout() {
	$this->form_validation->set_rules('Fullname', 'Họ và tên', 'trim|required', ['required' => 'Vui lòng nhập %s của bạn']);
	$this->form_validation->set_rules('Address','Địa chỉ', 'trim|required', ['required' => 'Vui lòng nhập %s của bạn']);
	$this->form_validation->set_rules('Phone', 'Số điện thoại', 'trim|required', ['required' => 'Vui lòng nhập %s của bạn']);
	$this->form_validation->set_rules('Email', 'Email', 'trim|required', ['required' => 'Vui lòng nhập %s của bạn']);
	if ($this->form_validation->run() == true) 
	{
		$fullname = $this->input->post('Fullname');
		$address = $this->input->post('Address');
		$phone = $this->input->post('Phone');
		$email = $this->input->post('Email'); //create a variable for the email 
		$method = $this->input->post('hinh-thuc-thanh-toan'); //create a variable for the email 
	
		$data = array(
			'fullname' => $fullname,
			'address' => $address,
			'phone' => $phone,
			'email' => $email,
			'method' => $method

		);
			$this->load->model('LoginModel'); //this is use all functions in file
			$result = $this->LoginModel->NewShipping($data);
			
			//cho điều kiện if else
			if($result)
			{				
				$this->session->set_flashdata('success','Đã đặt hàng thành công chúng tôi sẽ liên hệ sớm nhất');
				redirect(base_url('/kiem-tra-thanh-toan'));
			}else{
				$this->session->set_flashdata('error','Xác nhận thanh toán không thành công');
				redirect(base_url('/kiem-tra-thanh-toan'));
			}
	}else{
		$this->Checkout();
	}
}

/* -------------------------------------------------------------------------- */
}
