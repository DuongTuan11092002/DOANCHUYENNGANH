<?php

use Carbon\Carbon;

defined('BASEPATH') or exit('No direct script access allowed');

class IndexController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('IndexModel');
		$this->load->library("cart");
		$this->load->library('email');
		$this->data['Category'] = $this->IndexModel->getCategoryHome();
		$this->data['Category_blog'] = $this->IndexModel->getCategoryBlogHome();
		$this->data['AutoMaker'] = $this->IndexModel->getAutoMakerHome();
		$this->data['All_post'] = $this->IndexModel->getPost();

		// $this->load->library('pagination');
	}

	public function Error404()
	{
		$this->load->view('Pages/Template/Header', $this->data);
		$this->load->view('404/index', $this->data);
		$this->load->view('Pages/Template/Footer');
	}



	public function index()
	{
		/* ------------------------------- carbon time ------------------------------ */
		// echo Carbon::now('Asia/Ho_Chi_Minh');
		/* ----------------------------- PANIGATION-PAGE ---------------------------- */

		/* ------------------------------- FILTER ------------------------------ */

		$this->data['min_price'] = $this->IndexModel->getMinProductPrice(); //set minimum price
		$this->data['max_price'] = $this->IndexModel->getMaxProductPrice(); //set maximun price
		if (isset($_GET['kytu'])) {
			$kytu = $_GET['kytu'];
			$this->data['AllProductCar'] = $this->IndexModel->getProductKytu($kytu);
		} else if (isset($_GET['gia'])) {
			$gia = $_GET['gia'];
			$this->data['AllProductCar'] = $this->IndexModel->getProductGia($gia);
		} else if (isset($_GET['to']) && $_GET['from']) {

			$from_price = $_GET['from'];
			$to_price = $_GET['to'];

			$this->data['AllProductCar'] = $this->IndexModel->getProductPriceRange($from_price, $to_price);
		} else {
			$this->data['AllProductCar'] = $this->IndexModel->getAllProducts(); //load data

		}

		// phân danh mục sản phẩm trang chủ
		$this->data['itemsAutomaker'] = $this->IndexModel->ItemsAutoMaker();

		$this->load->view('Pages/Template/Header', $this->data);
		$this->load->view('Pages/Home', $this->data);
		$this->load->view('Pages/Template/Footer');
	}
	/* -------------------------------------------------------------------------- */
	/*                                  DANH MỤC                                  */

	public function Category($id) //finished with category
	{

		$this->data['min_price'] = $this->IndexModel->getMinCategoryPrice($id); //set minimum price
		$this->data['max_price'] = $this->IndexModel->getMaxCategoryPrice($id); //set maximun price

		/* --------------------------------- FILTER --------------------------------- */
		if (isset($_GET['kytu'])) {
			$kytu = $_GET['kytu'];
			$this->data['Category_Product'] = $this->IndexModel->getCategoryKytu($id, $kytu);
		} else if (isset($_GET['gia'])) {
			$gia = $_GET['gia'];
			$this->data['Category_Product'] = $this->IndexModel->getCategoryGia($id, $gia);
		} else if (isset($_GET['to']) && $_GET['from']) {
			$from_price = $_GET['from'];
			$to_price = $_GET['to'];

			$this->data['Category_Product'] = $this->IndexModel->getCategoryPriceRange($id, $from_price, $to_price);
		} else {
			$this->data['Category_Product'] = $this->IndexModel->getCategoryProduct($id); //load data

		}




		$this->data['title'] = $this->IndexModel->getCategoryTitle($id); //title
		$this->load->view('Pages/Template/Header', $this->data);
		$this->load->view('Pages/Category', $this->data);
		$this->load->view('Pages/Template/Footer');
	}


	public function AutoMaker($AutoMakerID)
	{
		/* --------------------------------- FILTER --------------------------------- */

		$this->data['min_price'] = $this->IndexModel->getMinAutoMakerPrice($AutoMakerID); //set minimum price
		$this->data['max_price'] = $this->IndexModel->getMaxAutoMakerPrice($AutoMakerID); //set maximun price

		if (isset($_GET['kytu'])) {
			$kytu = $_GET['kytu'];
			$this->data['AutoMaker_Product'] = $this->IndexModel->getAutoMakerKytu($AutoMakerID, $kytu);
		} else if (isset($_GET['gia'])) {
			$gia = $_GET['gia'];
			$this->data['AutoMaker_Product'] = $this->IndexModel->getAutoMakerGia($AutoMakerID, $gia);
		} else if (isset($_GET['to']) && $_GET['from']) {

			$from_price = $_GET['from'];
			$to_price = $_GET['to'];

			$this->data['AutoMaker_Product'] = $this->IndexModel->getAutoMakerPriceRange($AutoMakerID, $from_price, $to_price);
		} else {
			$this->data['AutoMaker_Product'] = $this->IndexModel->getAutoMakerProduct($AutoMakerID);
		}




		// $this->data['AutoMaker_Product'] = $this->IndexModel->getAutoMakerProduct($AutoMakerID); //load data
		$this->data['title'] = $this->IndexModel->getAutoMakerTitle($AutoMakerID);
		$this->load->view('Pages/Template/Header', $this->data);
		$this->load->view('Pages/Brand', $this->data);
		$this->load->view('Pages/Template/Footer');
	}
	/* -------------------------------------------------------------------------- */
	/* -------------------------------------------------------------------------- */
	/*                              CHI TIẾT SẢN PHẨM                             */

	public function ProductCar($id)
	{
		$this->data['Product_Detail'] = $this->IndexModel->getProductDetail($id); //load data 
		// những sản phẩm khác cùng một danh mục

		foreach ($this->data['Product_Detail'] as $key => $val) {
			$category_id = $val->tendanhmuc;
		}
		$this->data['Product_related'] = $this->IndexModel->getProductRelated($id, $category_id); //load dữ liệu về sản phẩm khác trong cùng một danh mục

		//khi nhấn vào xem chi tiết của một sản phẩm thì trang đó có những sản phẩm khác


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
	public function AddToCart()
	{
		$product_id = $this->input->post('product_id'); // Sản phẩm đã thêm
		$quantity = $this->input->post('quantity');
		$this->data['Product_Detail'] = $this->IndexModel->getProductDetail($product_id); // Load data

		$cart = array(); // Khởi tạo biến $cart trước khi sử dụng

		// Đặt hàng có thư viện có sẵn của CodeIgniter
		$existing_product = false; // Biến để kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng hay chưa

		// Kiểm tra có sản phẩm có hay không
		foreach ($this->cart->contents() as $items) {
			if ($items['id'] == $product_id) { // Nếu sản phẩm đã có trong giỏ hàng thì thông báo
				$existing_product = true;
				break;
			}
		}

		if ($existing_product) {
			$this->session->set_flashdata('error', 'Sản phẩm đã có trong giỏ hàng, vui lòng cập nhật số lượng trong giỏ hàng!');
			redirect(base_url() . 'gio-hang', 'refresh');
		} else {
			// Thêm sản phẩm từ trang chi tiết
			foreach ($this->data['Product_Detail'] as $key => $value) {
				// Câu lệnh kiểm tra số lượng đặt nếu cao hơn số lượng sản phẩm đặt
				if ($value->soluong >= $quantity) { // Kiểm tra số lượng ở trang chi tiết
					$cart = array( // Dữ liệu có trong thư viện CodeIgniter
						'id'      => $value->productCarID,
						'qty'     => $quantity,
						'price'   => $value->giasanpham,
						'name'    => $value->productCarDetailName,
						'options' => array('image' => $value->images, 'quantity_current' => $value->soluong)
					);
				} else {
					$this->session->set_flashdata('error', 'Vui lòng đặt hàng thấp hơn số lượng hiện tại của sản phẩm');
					redirect($_SERVER['HTTP_REFERER']);
				}
			}

			// Hàm thêm giỏ hàng
			$this->cart->insert($cart);
			Redirect(base_url() . 'gio-hang', 'refresh');
		}
	}
	/* -------------------------------------------------------------------------- */
	/* -------------------------------------------------------------------------- */
	/*                            XÓA GIỎ HÀNG                            */
	//xóa tất cả
	public function DeleteAllCart()
	{
		$this->cart->destroy();
		redirect(base_url() . 'gio-hang', 'refresh');
	}

	//xóa từng sản phẩm
	public function DeleteItemCart($rowid)
	{
		$this->cart->remove($rowid);
		redirect(base_url() . 'gio-hang', 'refresh');
	}
	/*                            CẬP NHẬT GIỎ HÀNG                            */
	public function UpdateCart()
	{
		$rowid = $this->input->post('rowid');
		$quantity = $this->input->post('quantity');
		foreach ($this->cart->contents() as $items) {
			if ($rowid == $items['rowid']) {
				// dòng lệnh kiểm tra xem người dùng chỉnh số lượng trong giỏ hàng nếu thấp thì đc không thì giới hạn số lượng trong kho
				if ($quantity < $items['options']['quantity_current']) {
					$cart = array( //cho phép chỉnh sửa số lượng
						'rowid' => $rowid, //tip: cần phải có rowid mới cập nhật số lượng được
						'qty'     => $quantity, //tip: số lượng tăng hoặc giảm
					);
				} elseif ($quantity >= $items['options']['quantity_current']) {
					$cart = array( //cho phép chỉnh sửa số lượng
						'rowid' => $rowid, //tip: cần phải có rowid mới cập nhật số lượng được
						'qty'     => $items['options']['quantity_current'], //tip: số lượng tăng hoặc giảm
					);
				}
			}
		}
		$this->cart->update($cart);
		//redirect(base_url().'gio-hang','refresh');
		redirect($_SERVER['HTTP_REFERER']);
	}
	/* -------------------------------------------------------------------------- */
	/* --------------------------- KIỂM-TRA-THANH-TOÁN -------------------------- */
	public function Checkout()
	{
		//kiểm tra khi customer login chưa nếu cố vào trang thanh toán(Checkout) thì đây ra trang giỏ hàng
		if ($this->session->userdata('loggedInCustomer') && $this->cart->contents()) {
			$this->load->view('Pages/Template/Header', $this->data);
			$this->load->view('Pages/Checkout');
			$this->load->view('Pages/Template/Footer');
		} else {
			//kiểm tra xem có login chưa nếu không có thì thông báo
			if (!$this->session->userdata('loggedInCustomer') && $this->cart->contents()) {
				echo "<script>
					alert('Vui lòng đăng nhập tài khoản mới được xác nhận đặt hàng');	
				</script>";
			}
			redirect(base_url() . 'gio-hang', 'refresh');
		}
	}



	/* ------------------------------------ - ----------------------------------- */

	/* -------------------------------------------------------------------------- */
	/*                            DANG-NHAP-KHACH-HANG                            */
	public function Login()
	{

		$this->load->view('Pages/Template/Header', $this->data);
		$this->load->view('Pages/Login', $this->data);
		$this->load->view('Pages/Template/Footer');
	}


	public function loginCustomer()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required', ['required' => 'Vui lòng nhập %s của bạn']);
		$this->form_validation->set_rules('password', 'Password', 'trim|required', ['required' => 'Vui lòng nhập %s của bạn']);

		if ($this->form_validation->run() == true) {
			//$this->load->view('myform');
			$email = $this->input->post('email'); //create a variable for the email 
			$password = md5($this->input->post('password')); //create a variable for the password
			$this->load->model('LoginModel'); //this is use all functions in file
			$result = $this->LoginModel->checkLoginCustomer($email, $password); //hàm checkLogin(có 2 biến đã tạo) được sử dụng trong model->LoginModel để kiểm tra dữ liệu

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
				$this->session->set_userdata('loggedInCustomer', $session_array);
				//lệnh thông báo khi đăng nhập thành công
				$this->session->set_flashdata('success', 'Đăng nhập thành công');
				//nhảy trang khi đăng nhập thành công
				redirect(base_url('/gio-hang'));
			} else {
				$this->session->set_flashdata('error', 'Sai tài khoản hoặc mật khẩu hoặc chưa kích hoạt tài khoản');
				redirect(base_url('/dang-nhap'));
			}
		} else {
			$this->Login();
		}
	}



	public function Logout()
	{
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

	public function registerCustomer()
	{
		$this->form_validation->set_rules('account', 'Tài khoản', 'trim|required', ['required' => 'Vui lòng nhập %s của bạn']);
		$this->form_validation->set_rules('fullname', 'Họ và tên', 'trim|required', ['required' => 'Vui lòng nhập %s của bạn']);
		$this->form_validation->set_rules('address', 'Địa chỉ', 'trim|required', ['required' => 'Vui lòng nhập %s của bạn']);
		$this->form_validation->set_rules('phone', 'Số điện thoại', 'trim|required', ['required' => 'Vui lòng nhập %s của bạn']);
		$this->form_validation->set_rules('email', 'Email', 'trim|required', ['required' => 'Vui lòng nhập %s của bạn']);
		$this->form_validation->set_rules('password', 'Password', 'trim|required', ['required' => 'Vui lòng nhập %s của bạn']);

		if ($this->form_validation->run() == true) {
			//$this->load->view('myform');
			$account = $this->input->post('account');
			$fullname = $this->input->post('fullname');
			$address = $this->input->post('address');
			$phone = $this->input->post('phone');
			$email = $this->input->post('email'); //create a variable for the email 
			$password = md5($this->input->post('password')); //create a variable for the password
			$token = rand(0000, 9999); // ngẫu nhiên mã số
			$datetime = Carbon::now('Asia/Ho_Chi_Minh');

			$data = array(
				'account' => $account,
				'fullname' => $fullname,
				'address' => $address,
				'phone' => $phone,
				'email' => $email,
				'password' => $password,
				'token' => $token,
				'date_created	' => $datetime

			);
			$this->load->model('LoginModel'); //this is use all functions in file
			$result = $this->LoginModel->RegisterCustomer($data); //hàm checkLogin(có 2 biến đã tạo) được sử dụng trong model->LoginModel để kiểm tra dữ liệu

			//cho điều kiện if else
			if ($result) {
				//mảng session 
				// $session_array = array(
				// 	//dòng id sẽ lấy kết quả $result[0] đầu tiên tham chiếu trong cột id database
				// 	'accountName' => $account,
				// 	//dòng fullname sẽ lấy kết quả $result[0] đầu tiên tham chiếu trong cột fullname database
				// 	'fullname' => $fullname,
				// 	//dòng email sẽ lấy kết quả $result[0] đầu tiên tham chiếu trong cột email database
				// 	'email' => $email,
				// );
				// $this->session->set_userdata('loggedInCustomer', $session_array);
				// //lệnh thông báo khi đăng nhập thành công
				// $this->session->set_flashdata('success', 'Đăng nhập thành công');
				//gửi email
				$fullurl = base_url() . 'xac-thuc-dang-ky/?token=' . $token . '&email=' . $email;
				$title = "Đăng ký tài khoản tại cửa hàng F8-Car thành công";
				$message = "Vui lòng nhấn vào đường dẫn để kích hoạt tài khoản:" . $fullurl;
				$to_email = $email;
				$this->SendEmail($to_email, $title, $message);

				//nhảy trang khi đăng nhập thành công
				redirect(base_url('/gio-hang'));
			} else {
				$this->session->set_flashdata('error', 'Sai tài khoản hoặc mật khẩu');
				redirect(base_url('dang-ky'));
			}
		} else {
			$this->Register();
		}
	}

	/* --------------------------- xác thực tài khoản --------------------------- */
	public function AuthenticationCustomer()
	{
		if (isset($_GET['email']) && $_GET['token']) {
			$token = $_GET['token'];
			$email = $_GET['email'];
		}

		$data['get_customer'] = $this->IndexModel->getCustomerToken($email);

		//Authentication
		$timenow = Carbon::now('Asia/Ho_Chi_Minh')->addMinutes(5); //take time now plus 5 minutes
		$newtoken = rand(0000, 9999);
		foreach ($data['get_customer'] as $key => $value) {
			if ($token != $value->token) {
				$this->session->set_flashdata('success', 'Kích hoạt tài khoản thất bại, mời bạn đăng ký lại');
				redirect(base_url('/dang-nhap'));
			}
			$data_customer = [
				'status' => 1,
				'token' => $newtoken
			];

			if ($value->date_created < $timenow) {
				$active_customer = $this->IndexModel->ActiveCustomer($email, $data_customer);
				$this->session->set_flashdata('success', 'Kích hoạt tài khoản thành công, mời bạn đăng nhập lại');
				redirect(base_url('/dang-nhap'));
			} else {
				$this->session->set_flashdata('error', 'Kích hoạt tài khoản thất bại, mời bạn đăng ký lại');
				redirect(base_url('/dang-ky'));
			}
		}
	}

	/* -------------------------------------------------------------------------- */

	/* -------------------------------------------------------------------------- */
	/*                               XỬ-LÝ-ĐẶT-HÀNG  GỬI ĐƠN                             */
	public function ConfirmCheckout()
	{
		$this->form_validation->set_rules('Fullname', 'Họ và tên', 'trim|required', ['required' => 'Vui lòng nhập %s của bạn']);
		$this->form_validation->set_rules('Address', 'Địa chỉ', 'trim|required', ['required' => 'Vui lòng nhập %s của bạn']);
		$this->form_validation->set_rules('Phone', 'Số điện thoại', 'trim|required', ['required' => 'Vui lòng nhập %s của bạn']);
		$this->form_validation->set_rules('Email', 'Email', 'trim|required', ['required' => 'Vui lòng nhập %s của bạn']);
		if ($this->form_validation->run() == true) {
			$fullname = $this->input->post('Fullname');
			$address = $this->input->post('Address');
			$phone = $this->input->post('Phone');
			$email = $this->input->post('Email'); //email
			$method = $this->input->post('hinh-thuc-thanh-toan'); //create a variable for the email 

			$data = array(
				'fullname' => $fullname,
				'address' => $address,
				'phone' => $phone,
				'email' => $email,
				'method' => $method

			);
			$this->load->model('LoginModel');

			$result = $this->LoginModel->NewShipping($data);

			//cho điều kiện if else
			if ($result) {
				//Phần Order			
				// Cho ngẫu nhiên về mã đơn hàng
				$order_code = rand(00, 99999);
				$data_order = array(
					'order_code' => $order_code,
					'shippingID' => $result,
					'status' => 1

				);
				$them_order = $this->LoginModel->them_order($data_order);

				//Order Detail
				foreach ($this->cart->contents() as $items) {
					$data_order_detail = array(
						'orderCode' => $order_code,
						'productCarID' => $items['id'],
						'quantity' => $items['qty'],

					);
					$them_order_detail = $this->LoginModel->them_order_detail($data_order_detail);
				}
				$this->session->set_flashdata('success', 'Đã đặt hàng thành công chúng tôi sẽ liên hệ sớm nhất');
				$this->cart->destroy(); // sau khi thanh toán xong thì xóa sản phẩm khỏi giỏ hàng
				//Gửi email sau khi khách hàng xác nhận mua hàng

				// set email
				$to_email = $email;
				$title = "Đặt hàng thành công tại F8-Car cho bạn";
				$message = "Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất";
				//send email
				$this->sendEmail($to_email, $title, $message);
				redirect(base_url('/cam-on'));
			} else {
				$this->session->set_flashdata('error', 'Xác nhận thanh toán không thành công');
				redirect(base_url('/kiem-tra-thanh-toan'));
			}
		} else {
			$this->Checkout();
		}
	}

	/* -------------------------------------------------------------------------- */

	/* -------------------------------------------------------------------------- */
	/*                                 CẢM-ƠN-PAGE                                */
	public function Thank()
	{

		$this->load->view('Pages/Template/Header');
		$this->load->view('Pages/Thank');
		$this->load->view('Pages/Template/Footer');
	}
	/* -------------------------------------------------------------------------- */

	/* -------------------------------------------------------------------------- */
	/*                                  TÌM-KIẾM                                  */
	public function Search()
	{
		if (isset($_GET['keyword']) && $_GET['keyword'] != '') {
			$Keyword = $_GET['keyword'];
		}
		$this->data['Product'] = $this->IndexModel->getProductByKeyWord($Keyword); //load data
		$this->data['title'] = $Keyword; //title
		$this->config->config['pagetitle'] = 'Tìm kiếm từ khóa:' . $Keyword;
		$this->load->view('Pages/Template/Header', $this->data);
		$this->load->view('Pages/Search', $this->data);
		$this->load->view('Pages/Template/Footer');
	}
	/* -------------------------------------------------------------------------- */

	/* -------------------------------------------------------------------------- */
	/*                             PHÂN-TRANG-SẢN-PHẨM                            */

	/* -------------------------------------------------------------------------- */


	/* -------------------------------------------------------------------------- */
	/*                                  GỬI-EMAIL                                 */
	public function SendEmail($to_email, $title, $message)
	{
		$config = array();
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'ssl://smtp.gmail.com';
		$config['smtp_user'] = 'Kim884740@gmail.com';
		$config['smtp_pass'] = 'eqfvwielrqtyecnh'; // mật khẩu ứng dụng
		$config['smtp_port'] = 465;
		$config['charset'] = 'utf-8';
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");
		//config
		$this->email->from('Kim884740@gmail.com', 'Công ty F8-Car'); // email gửi
		$this->email->to($to_email); // email nhận
		// $this->email->cc('another@another-example.com');
		// $this->email->bcc('them@their-example.com');

		$this->email->subject($title);
		$this->email->message($message);

		$this->email->send();
	}
	/* -------------------------------------------------------------------------- */

	/* -------------------------------------------------------------------------- */
	/*                                   CONTACT                                  */
	public function Contact()
	{
		$this->load->view('Pages/Template/Header', $this->data);
		$this->load->view('Pages/Contact', $this->data);
		$this->load->view('Pages/Template/Footer');
	}


	public function SendContact()
	{
		$data = array(
			'fullname' => $this->input->post('fullname'),
			'email' => $this->input->post('email'),
			'phone' => $this->input->post('phone'),
			'address' => $this->input->post('address'),
			'subject' => $this->input->post('subject'),
			'message' => $this->input->post('message'),
		);
		$result = $this->IndexModel->insertContact($data);
		if ($result) {
			$to_email =  $this->input->post('email');
			$title =   "Tiêu đề khách hàng cần liên hệ:" .  $this->input->post('subject');
			$message = "Thông tin ghi chú của khách hàng" . $this->input->post('message');
			$this->SendEmail($to_email, $title, $message);
		}
		$this->session->set_flashdata('success', 'Gửi  thành công , chúng tôi sẽ liên hệ sớm nhất');
		//nhảy trang khi đăng nhập thành công
		redirect(base_url('/lien-he'));
	}
	/* -------------------------------------------------------------------------- */
	public function CategoryBlog($id)
	{

		$this->data['Slug'] = $this->IndexModel->getCategorySlugBlog($id); //load title slug
		$this->data['Category_blog_with_id'] = $this->IndexModel->getCategoryBlogByID($id); //load blog

		$this->data['title'] = $this->IndexModel->getCategoryBlogTitle($id); //title
		$this->load->view('Pages/Template/Header', $this->data);
		$this->load->view('Pages/Category_Blog', $this->data);
		$this->load->view('Pages/Template/Footer');
	}

	public function Blog($id)
	{
		$this->data['post_with_id'] = $this->IndexModel->getBlogByID($id); //load title slug

		$this->load->view('Pages/Template/Header', $this->data);
		$this->load->view('Pages/Blog', $this->data);
		$this->load->view('Pages/Template/Footer');
	}
}
