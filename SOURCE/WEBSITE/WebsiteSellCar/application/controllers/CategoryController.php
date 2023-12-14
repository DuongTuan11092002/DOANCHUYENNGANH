<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CategoryController extends CI_Controller {


	public function index()
	{
        $this->load->view('TemplateAD/header');
        $this->load->view('TemplateAD/navbar');
        $this->load->view('CategoryAD/index');
        $this->load->view('TemplateAD/footer');
	}

    public function create()
	{
        $this->load->view('TemplateAD/header');
        $this->load->view('TemplateAD/navbar');
        $this->load->view('CategoryAD/create');
        $this->load->view('TemplateAD/footer');
	}


    public function list()
	{	
		$this->load->view('TemplateAD/header');
		$this->load->view('TemplateAD/navbar');
        $this->load->model('CategoryModel');
		$data['Category'] = $this->CategoryModel->selectCategory();
		$this->load->view('CategoryAD/list', $data);
		$this->load->view('TemplateAD/footer');
        
	}


    public function formCategory()
	{
		//check product
				$this->form_validation->set_rules('CategoryName', 'danh mục', 'trim|required', ['required' => 'Vui lòng nhập %s']);
				
				if ($this->form_validation->run() == true) 
				{
							//mảng data insert
							$data = [
								// các cột database------------lấy từ các input 
								'categoriesName' => $this->input->post('CategoryName')
								

							];
							// hàm gọi 
							$this->load->model('CategoryModel');
							$this->CategoryModel->insertCategory($data); // kiểm tra đúng hàm sử dụng hay không?
							$this->session->set_flashdata('success','thêm thành công');
							redirect(base_url('Category/list'));

				}
				else
				{
						$this->create();
				}
	}



    public function edit($categoriesID){
		$this->load->view('TemplateAD/header');
		$this->load->view('TemplateAD/navbar');
		$this->load->model('CategoryModel');
		$data['categoryEdit'] = $this->CategoryModel->selectCategoryById($categoriesID);
		$this->load->view('CategoryAD/edit', $data);
		$this->load->view('TemplateAD/footer');
	}


    public function update($categoriesID){
		//check product
				$this->form_validation->set_rules('CategoryName', 'danh mục', 'trim|required', ['required' => 'Vui lòng nhập %s']);
				
				if ($this->form_validation->run() == true) 
				{
							//mảng data insert
							$data = [
								'categoriesName' => $this->input->post('CategoryName'),
							];
							// hàm gọi 
							$this->load->model('CategoryModel');
							$this->CategoryModel->updateCategory($categoriesID,$data); // kiểm tra đúng hàm sử dụng hay không?
							$this->session->set_flashdata('success','thêm thành công');
							redirect(base_url('Category/list'));

				}
				else
				{
						$this->edit($categoriesID);
				}
	}


}
