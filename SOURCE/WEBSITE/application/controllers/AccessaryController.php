<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AccessaryController extends CI_Controller {


	public function index()
	{
		$this->load->view('TemplateAD/header');
		$this->load->view('TemplateAD/navbar');
		$this->load->view('productAccessaryAD/index'); // danh sach
		$this->load->view('TemplateAD/footer');
	}


    public function create()
	{	
		$this->load->view('TemplateAD/header');
		$this->load->view('TemplateAD/navbar');
		$this->load->view('productAccessaryAD/create');
		$this->load->view('TemplateAD/footer');
        
	}


    public function list()
	{	
		$this->load->view('TemplateAD/header');
		$this->load->view('TemplateAD/navbar');
		$this->load->model('AccessaryModel');
        $data['productAccessary'] = $this->AccessaryModel->selectAccessaryProduct();
		$this->load->view('productAccessaryAD/list', $data);
		$this->load->view('TemplateAD/footer');
        
	}



    public function formCreateAccessary()
	{
		//check product
				$this->form_validation->set_rules('accessaryName', 'sản phẩm phụ tùng', 'trim|required', ['required' => 'Vui lòng nhập %s']);
				$this->form_validation->set_rules('accessaryDesc','mô tả', 'trim|required', ['required' => 'Vui lòng nhập %s ']);
				$this->form_validation->set_rules('accessaryPrice','Giá', 'trim|required', ['required' => 'Vui lòng nhập %s ']);
				$this->form_validation->set_rules('accessaryTime','Ngày', 'trim|required', ['required' => 'Vui lòng nhập %s ']);
				if ($this->form_validation->run() == true) 
				{
					// upload file image
						$ori_filename = $_FILES['accessaryIMG']['name'];
						$new_name = time()."".str_replace(' ','-', $ori_filename);
						$config = [
							'upload_path' => './uploads/productAccessary', // xem đường dẫn file có đúng không
							'allowed_types' => 'gif|jpg|png|jpeg',
							'file_name' => $new_name,
						];
						//này phải có library upload mới thực hiện đc
						$this->load->library('upload', $config);

						if ( ! $this->upload->do_upload('accessaryIMG'))
                		{
                       		 $error = array('error' => $this->upload->display_errors());
								$this->load->view('TemplateAD/header');
								$this->load->view('TemplateAD/navbar');
								$this->load->view('productAccessaryAD/create',$error);
								$this->load->view('TemplateAD/footer');
                     
               			}else{
							// hàm upload product
							$productAccessary_filename = $this->upload->data('file_name');
							//mảng data insert
							$data = [
								// các cột database------------lấy từ các input 
								'accessaryName' => $this->input->post('accessaryName'),
								'description' => $this->input->post('accessaryDesc'),
								'price'=> $this->input->post('accessaryPrice'),
								'create_at' => $this->input->post('accessaryTime'),
								'thumnail' => $productAccessary_filename

							];
							// hàm gọi 
							$this->load->model('AccessaryModel');
							$this->AccessaryModel->insertAccessaryProduct($data); // kiểm tra đúng hàm sử dụng hay không?
							$this->session->set_flashdata('success','thêm thành công');
							redirect(base_url('productAccessaryAD/create'));
						}
						


				}
				else
				{
						$this->create();
				}
	}


	//section for edit accessary
	//phần này mới lấy giao diện edit 
	public function edit($accessaryID){
		$this->load->view('TemplateAD/header');
		$this->load->view('TemplateAD/navbar');
		$this->load->model('AccessaryModel');
		$data['productAccessary'] = $this->AccessaryModel->selectAccessaryProductById($accessaryID);
		$this->load->view('productAccessaryAD/edit', $data);
		$this->load->view('TemplateAD/footer');
	}

	//This is section handling for edit accessary
	public function update($accessaryID){
		//check form text
		$this->form_validation->set_rules('accessaryName', 'sản phẩm phụ tùng', 'trim|required', ['required' => 'Vui lòng nhập %s']);
		$this->form_validation->set_rules('accessaryDesc','mô tả', 'trim|required', ['required' => 'Vui lòng nhập %s ']);
		$this->form_validation->set_rules('accessaryPrice','Giá', 'trim|required', ['required' => 'Vui lòng nhập %s ']);
		$this->form_validation->set_rules('accessaryTime','Ngày', 'trim|required', ['required' => 'Vui lòng nhập %s ']);
		if ($this->form_validation->run() == true) 
				{
					if(!empty($_FILES['accessaryIMG']['name'])){
					// upload file image
						$ori_filename = $_FILES['accessaryIMG']['name'];
						$new_name = time()."".str_replace(' ','-', $ori_filename);
						$config = [
							'upload_path' => './uploads/productAccessary',
							'allowed_types' => 'gif|jpg|png|jpeg', // type image
							'file_name' => $new_name,
						];
						//này phải có library upload mới thực hiện đc
						$this->load->library('upload', $config);

						if ( ! $this->upload->do_upload('accessaryIMG'))
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
								'accessaryName' => $this->input->post('accessaryName'),
								'description' => $this->input->post('accessaryDesc'),
								'price'=> $this->input->post('accessaryPrice'),
								'create_at' => $this->input->post('accessaryTime'),
								'thumnail' => $product_filename

							];
							
						}
						
					}else {
						//if image is not have change
						$data = [
							// các cột database------------lấy từ các input 
							'accessaryName' => $this->input->post('accessaryName'),
							'description' => $this->input->post('accessaryDesc'),
							'price'=> $this->input->post('accessaryPrice'),
							'create_at' => $this->input->post('accessaryTime'),

						];
					}

					// hàm gọi 
					$this->load->model('AccessaryModel');
					$this->AccessaryModel->updateAccessaryProduct($accessaryID,$data);
					$this->session->set_flashdata('success','sửa thành công');
					redirect(base_url('productAccessary/list'));
				}
				else
				{
						$this->edit();
				}
	}


}