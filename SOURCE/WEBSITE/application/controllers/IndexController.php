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
		$this->load->view('Pages/Template/Header', $this->data);
		$this->load->view('Pages/Checkout');
		$this->load->view('Pages/Template/Footer');
	}



/* ------------------------------------ - ----------------------------------- */

	public function Login()
	{

		$this->load->view('Pages/Template/Header');
		$this->load->view('Pages/Login');
		$this->load->view('Pages/Template/Footer');
		
	}


}
