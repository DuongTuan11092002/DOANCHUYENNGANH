<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductDetailController extends CI_Controller {

   
	// trang index
	public function index()
	{	
		$this->load->view('TemplateAD/header');
		$this->load->view('TemplateAD/navbar');
		$this->load->view('productDetailAD/index');
		$this->load->view('TemplateAD/footer');
        
	}

    public function create()
	{	
		$this->load->view('TemplateAD/header');
		$this->load->view('TemplateAD/navbar');
		$this->load->model('ProductModel');
		$data['product'] = $this->ProductModel->selectAllProduct();
		$this->load->view('productCarDetailAD/create', $data);
		$this->load->view('TemplateAD/footer');
        
	}


    public function list()
	{	
		$this->load->view('TemplateAD/header');
		$this->load->view('TemplateAD/navbar');
		$this->load->model('ProductDetailModel');
		$data['productDetail'] = $this->ProductDetailModel->selectAllProduct();
		$this->load->view('productCarDetailAD/list', $data);
		$this->load->view('TemplateAD/footer');
        
	}


	// thêm sản phẩm
	public function formCreateProductDetail()
	{
		//check product
				$this->form_validation->set_rules('productCarDetailName', 'tên tiêu đề sản phẩm', 'trim|required', ['required' => 'Vui lòng nhập %s']);
				$this->form_validation->set_rules('DescEngine','mô tả động cơ', 'trim|required', ['required' => 'Vui lòng nhập %s ']);
				$this->form_validation->set_rules('DescInterio','mô tả nội thất', 'trim|required', ['required' => 'Vui lòng nhập %s ']);
				$this->form_validation->set_rules('DescTechniques','mô tả công nghệ', 'trim|required', ['required' => 'Vui lòng nhập %s ']);
				if ($this->form_validation->run() == true) 
				{
					// upload file image
						$ori_filename = $_FILES['productDetailIMG']['name'];
						$new_name = time()."".str_replace(' ','-', $ori_filename);
						$config = [
							'upload_path' => './uploads/libraryDetail',
							'allowed_types' => 'gif|jpg|png|jpeg',
							'file_name' => $new_name,
						];
						//này phải có library upload mới thực hiện đc
						$this->load->library('upload', $config);

						if ( ! $this->upload->do_upload('productDetailIMG'))
                		{
                       		 $error = array('error' => $this->upload->display_errors());
								$this->load->view('TemplateAD/header');
								$this->load->view('TemplateAD/navbar');
								$this->load->view('productCarDetailAD/create',$error);
								$this->load->view('TemplateAD/footer');
                     
               			}else{
							// hàm upload product
							$productDetail_filename = $this->upload->data('file_name');
							
							$data = [ // function insertProductDetail
								// các cột database------------lấy từ các input 
								'productCarDetailName' => $this->input->post('productCarDetailName'),
								'productCarDetailTextEngine' => $this->input->post('DescEngine'),
								'productCarDetailTextInterio' => $this->input->post('DescInterio'),
								'productCarDetailTextTechniques' => $this->input->post('DescTechniques'),
								'productCarID' => $this->input->post('productCar_id'),
								'images' => $productDetail_filename

							];
							// hàm gọi 
							$this->load->model('ProductDetailModel');
							$this->ProductDetailModel->insertProductDetail($data);
							$this->session->set_flashdata('success','thêm thành công');
							redirect(base_url('productCarDetail/list'));
						}
						


				}
				else
				{
						$this->create();
				}
	}

	public function edit($productCarDetailID){
		$this->load->view('TemplateAD/header');
		$this->load->view('TemplateAD/navbar');
		
		/* ---------------------------- hàm gọi sản phẩm ---------------------------- */
			$this->load->model('ProductModel');
			$data['products'] = $this->ProductModel->selectAllProduct();

			/* ---------------------------- hàm gọi chi tiết sản phẩm ---------------------------- */
			$this->load->model('ProductDetailModel');
			$data['productCarDetail'] = $this->ProductDetailModel->selectProductDetailById($productCarDetailID);

		$this->load->view('productCarDetailAD/edit', $data);
		$this->load->view('TemplateAD/footer');
	}



	public function	update($productCarDetailID){
		$this->form_validation->set_rules('productCarDetailName', 'Tên sản phẩm', 'trim|required', ['required' => 'Vui lòng nhập %s']);
		$this->form_validation->set_rules('DescEngine','mô tả động cơ', 'trim|required', ['required' => 'Vui lòng nhập %s ']);
		$this->form_validation->set_rules('DescInterio','Mô tả Nội thất', 'trim|required', ['required' => 'Vui lòng nhập %s ']);
		$this->form_validation->set_rules('DescTechniques','Mô tả công nghệ', 'trim|required', ['required' => 'Vui lòng nhập %s ']);
		if ($this->form_validation->run() == true) 
				{
					if(!empty($_FILES['productDetailIMG']['name'])){
					// upload file image
						$ori_filename = $_FILES['productDetailIMG']['name'];
						$new_name = time()."".str_replace(' ','-', $ori_filename);
						$config = [
							'upload_path' => './uploads/libraryDetail',
							'allowed_types' => 'gif|jpg|png|jpeg',
							'file_name' => $new_name,
						];
						//này phải có library upload mới thực hiện đc
						$this->load->library('upload', $config);

						if ( ! $this->upload->do_upload('productDetailIMG'))
                		{
                       		 $error = array('error' => $this->upload->display_errors());
								$this->load->view('TemplateAD/header');
								$this->load->view('TemplateAD/navbar');
								$this->load->view('productCarAD/create',$error);
								$this->load->view('TemplateAD/footer');
                     
               			}else{
							// hàm upload product
							$productDetail_filename = $this->upload->data('file_name');
							//mảng data insert
							$data = [
								// các cột database------------lấy từ các input 
								'productCarDetailName' => $this->input->post('productCarDetailName'),
								'productCarDetailTextEngine' => $this->input->post('DescEngine'),
								'productCarDetailTextInterio' => $this->input->post('DescInterio'),
								'productCarDetailTextTechniques' => $this->input->post('DescTechniques'),
								'productCarID' => $this->input->post('productCar_id'),
								'images' => $productDetail_filename


							];
							
						}
						
					}else {
						$data = [
							// các cột database------------lấy từ các input 
							'productCarDetailName' => $this->input->post('productCarDetailName'),
								'productCarDetailTextEngine' => $this->input->post('DescEngine'),
								'productCarDetailTextInterio' => $this->input->post('DescInterio'),
								'productCarDetailTextTechniques' => $this->input->post('DescTechniques'),
								'productCarID' => $this->input->post('productCar_id'),

							

						];
					}

					// hàm gọi 
					$this->load->model('ProductDetailModel');
					$this->ProductDetailModel->update($productCarDetailID,$data);
					$this->session->set_flashdata('success','sửa thành công');
					redirect(base_url('productCarDetail/list'));
				}
				else
				{
						$this->edit();
				}
	}


	//deleteProduct
	
	public function delete($productCarDetailID){
					$this->load->model('ProductDetailModel');
					$this->ProductDetailModel->deleteProductDetail($productCarDetailID);
					$this->session->set_flashdata('success','xoá thành công');
					redirect(base_url('productCarDetail/list'));
	}


}


