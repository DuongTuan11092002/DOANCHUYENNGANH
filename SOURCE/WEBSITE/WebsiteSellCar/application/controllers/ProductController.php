<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductController extends CI_Controller {

   
	// trang index
	public function index()
	{	
		$this->load->view('TemplateAD/header');
		$this->load->view('TemplateAD/navbar');
		
		

		$this->load->view('productCarAD/index');
		$this->load->view('TemplateAD/footer');
        
	}

    public function create()
	{	
		$this->load->view('TemplateAD/header');
		$this->load->view('TemplateAD/navbar');
		$this->load->view('productCarAD/create');
		$this->load->view('TemplateAD/footer');
        
	}


    public function list()
	{	
		$this->load->view('TemplateAD/header');
		$this->load->view('TemplateAD/navbar');
		$this->load->model('ProductModel');
		$data['products'] = $this->ProductModel->selectProduct();
		$this->load->view('productCarAD/list', $data);
		$this->load->view('TemplateAD/footer');
        
	}


	// thêm sản phẩm
	public function includeProduct()
	{
		//check product
				$this->form_validation->set_rules('productName', 'sản phẩm', 'trim|required', ['required' => 'Vui lòng nhập %s']);
				$this->form_validation->set_rules('productDesc','mô tả', 'trim|required', ['required' => 'Vui lòng nhập %s ']);
				$this->form_validation->set_rules('productPrice','Giá', 'trim|required', ['required' => 'Vui lòng nhập %s ']);
				$this->form_validation->set_rules('productTime','Ngày', 'trim|required', ['required' => 'Vui lòng nhập %s ']);
				if ($this->form_validation->run() == true) 
				{
					// upload file image
						$ori_filename = $_FILES['productIMG']['name'];
						$new_name = time()."".str_replace(' ','-', $ori_filename);
						$config = [
							'upload_path' => './uploads/productCar',
							'allowed_types' => 'gif|jpg|png|jpeg',
							'file_name' => $new_name,
						];
						//này phải có library upload mới thực hiện đc
						$this->load->library('upload', $config);

						if ( ! $this->upload->do_upload('productIMG'))
                		{
                       		 $error = array('error' => $this->upload->display_errors());
								$this->load->view('TemplateAD/header');
								$this->load->view('TemplateAD/navbar');
								$this->load->view('productCarAD/create',$error);
								$this->load->view('TemplateAD/footer');
                     
               			}else{
							// hàm upload product
							$product_filename = $this->upload->data('file_name');
							//mảng data insert
							$data = [
								// các cột database------------lấy từ các input 
								'productCarName' => $this->input->post('productName'),
								'description' => $this->input->post('productDesc'),
								'price'=> $this->input->post('productPrice'),
								'create_at' => $this->input->post('productTime'),
								'thumnail' => $product_filename

							];
							// hàm gọi 
							$this->load->model('ProductModel');
							$this->ProductModel->insertProduct($data);
							$this->session->set_flashdata('success','thêm thành công');
							redirect(base_url('productCar/create'));
						}
						


				}
				else
				{
						$this->create();
				}
	}

	public function edit($productCarID){
		$this->load->view('TemplateAD/header');
		$this->load->view('TemplateAD/navbar');
		$this->load->model('ProductModel');
		$data['product'] = $this->ProductModel->selectProductById($productCarID);
		$this->load->view('productCarAD/edit', $data);
		$this->load->view('TemplateAD/footer');
	}



	public function	update($productCarID){
		$this->form_validation->set_rules('productName', 'sản phẩm', 'trim|required', ['required' => 'Vui lòng nhập %s']);
		$this->form_validation->set_rules('productDesc','mô tả', 'trim|required', ['required' => 'Vui lòng nhập %s ']);
		$this->form_validation->set_rules('productPrice','Giá', 'trim|required', ['required' => 'Vui lòng nhập %s ']);
		$this->form_validation->set_rules('productTime','Ngày', 'trim|required', ['required' => 'Vui lòng nhập %s ']);
		if ($this->form_validation->run() == true) 
				{
					if(!empty($_FILES['productIMG']['name'])){
					// upload file image
						$ori_filename = $_FILES['productIMG']['name'];
						$new_name = time()."".str_replace(' ','-', $ori_filename);
						$config = [
							'upload_path' => './uploads/productCar',
							'allowed_types' => 'gif|jpg|png|jpeg',
							'file_name' => $new_name,
						];
						//này phải có library upload mới thực hiện đc
						$this->load->library('upload', $config);

						if ( ! $this->upload->do_upload('productIMG'))
                		{
                       		 $error = array('error' => $this->upload->display_errors());
								$this->load->view('TemplateAD/header');
								$this->load->view('TemplateAD/navbar');
								$this->load->view('productCarAD/create',$error);
								$this->load->view('TemplateAD/footer');
                     
               			}else{
							// hàm upload product
							$product_filename = $this->upload->data('file_name');
							//mảng data insert
							$data = [
								// các cột database------------lấy từ các input 
								'productCarName' => $this->input->post('productName'),
								'description' => $this->input->post('productDesc'),
								'price'=> $this->input->post('productPrice'),
								'create_at' => $this->input->post('productTime'),
								'thumnail' => $product_filename

							];
							
						}
						
					}else {
						$data = [
							// các cột database------------lấy từ các input 
							'productCarName' => $this->input->post('productName'),
							'description' => $this->input->post('productDesc'),
							'price'=> $this->input->post('productPrice'),
							'create_at' => $this->input->post('productTime'),

						];
					}

					// hàm gọi 
					$this->load->model('ProductModel');
					$this->ProductModel->updateProduct($productCarID,$data);
					$this->session->set_flashdata('success','sửa thành công');
					redirect(base_url('productCar/list'));
				}
				else
				{
						$this->edit();
				}
	}


	//deleteProduct
	public function delete($productCarID){
					$this->load->model('ProductModel');
					$this->ProductModel->deleteProduct($productCarID);
					$this->session->set_flashdata('success','xoá thành công');
					redirect(base_url('productCar/list'));
	}


}


