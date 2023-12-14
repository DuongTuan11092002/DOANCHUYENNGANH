<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NewController extends CI_Controller {


	public function index()
	{
		$this->load->view('TemplateAD/header');
		$this->load->view('TemplateAD/navbar');
		$this->load->view('NewAD/index'); // danh sach
		$this->load->view('TemplateAD/footer');
	}


    public function create()
	{	
		$this->load->view('TemplateAD/header');
		$this->load->view('TemplateAD/navbar');
		$this->load->view('NewAD/create');
		$this->load->view('TemplateAD/footer');
        
	}


    public function list()
	{	
		$this->load->view('TemplateAD/header');
		$this->load->view('TemplateAD/navbar');
		$this->load->model('NewModel');
        $data['New'] = $this->NewModel->selectNewList();
		$this->load->view('NewAD/list', $data);
		$this->load->view('TemplateAD/footer');
        
	}


/* -------------------------------------------------------------------------- */
/*                                Thêm tin tức                                */
	public function  formNew(){
		$this->form_validation->set_rules('newName', 'Tên tin tức', 'trim|required', ['required' => 'Vui lòng nhập %s']);
		$this->form_validation->set_rules('newDesc','mô tả', 'trim|required', ['required' => 'Vui lòng nhập %s ']);
		$this->form_validation->set_rules('newTime','Giá', 'trim|required', ['required' => 'Vui lòng nhập %s ']);
		if ($this->form_validation->run() == true) 
				{
					// upload file image
						$ori_filename = $_FILES['newIMG']['name'];
						$new_name = time()."".str_replace(' ','-', $ori_filename);
						$config = [
							'upload_path' => './uploads/New', // xem đường dẫn file có đúng không
							'allowed_types' => 'gif|jpg|png|jpeg',
							'file_name' => $new_name,
						];
						//này phải có library upload mới thực hiện đc
						$this->load->library('upload', $config);

						if ( ! $this->upload->do_upload('newIMG'))
                		{
                       		 $error = array('error' => $this->upload->display_errors());
								$this->load->view('TemplateAD/header');
								$this->load->view('TemplateAD/navbar');
								$this->load->view('NewAD/create',$error);
								$this->load->view('TemplateAD/footer');
                     
               			}else{
							// hàm upload product
							$newAD_filename = $this->upload->data('file_name');
							//mảng data insert
							$data = [
								// các cột database------------lấy từ các input 
								'newsHeading' => $this->input->post('newName'),
								'description' => $this->input->post('newDesc'),
								'create_at' => $this->input->post('newTime'),
								'thumnail' => $newAD_filename

							];
							// hàm gọi 
							$this->load->model('NewModel');
							$this->NewModel->insertNew($data); // kiểm tra đúng hàm sử dụng hay không?
							$this->session->set_flashdata('success','thêm thành công');
							redirect(base_url('New/create'));
						}
				}
				else
				{
						$this->create();
				}
	
	}


	/* ------------------------------ Edit function ----------------------------- */
	public function edit($newsID){
		$this->load->view('TemplateAD/header');
		$this->load->view('TemplateAD/navbar');
		$this->load->model('NewModel');
		$data['NewEdit'] = $this->NewModel->selectNewById($newsID);
		$this->load->view('NewAD/edit', $data);
		$this->load->view('TemplateAD/footer');
	}

	/* ----------------------------- UPDATE FUNCTION ---------------------------- */
	public function update($newsID){
		$this->form_validation->set_rules('newName', 'Tên tin tức', 'trim|required', ['required' => 'Vui lòng nhập %s']);
		$this->form_validation->set_rules('newDesc','mô tả', 'trim|required', ['required' => 'Vui lòng nhập %s ']);
		$this->form_validation->set_rules('newTime','Giá', 'trim|required', ['required' => 'Vui lòng nhập %s ']);
		if ($this->form_validation->run() == true) 
				{
					if(!empty($_FILES['newIMG']['name'])){
					// upload file image
						$ori_filename = $_FILES['newIMG']['name'];
						$new_name = time()."".str_replace(' ','-', $ori_filename);
						$config = [
							'upload_path' => './uploads/New', // xem đường dẫn file có đúng không
							'allowed_types' => 'gif|jpg|png|jpeg',
							'file_name' => $new_name,
						];
						//này phải có library upload mới thực hiện đc
						$this->load->library('upload', $config);

						if ( ! $this->upload->do_upload('newIMG'))
                		{
                       		 $error = array('error' => $this->upload->display_errors());
								$this->load->view('TemplateAD/header');
								$this->load->view('TemplateAD/navbar');
								$this->load->view('NewAD/create',$error);
								$this->load->view('TemplateAD/footer');
                     
               			}else{
							// hàm upload product
							$newAD_filename = $this->upload->data('file_name');
							//mảng data insert
							$data = [
								// các cột database------------lấy từ các input 
								'newsHeading' => $this->input->post('newName'),
								'description' => $this->input->post('newDesc'),
								'create_at' => $this->input->post('newTime'),
								'thumnail' => $newAD_filename

							];
						}
					}else{
						$data = [
							// các cột database------------lấy từ các input 
							'newsHeading' => $this->input->post('newName'),
							'description' => $this->input->post('newDesc'),
							'create_at' => $this->input->post('newTime'),

						];
					}
						// hàm gọi 
						$this->load->model('NewModel');
						$this->NewModel->update($newsID,$data); // kiểm tra đúng hàm sử dụng hay không?
						$this->session->set_flashdata('success','thêm thành công');
						redirect(base_url('New/list'));
				}
				else
				{
						$this->edit($newsID);
				}

			}
	/* ----------------------------- FUNCTION DELETE ---------------------------- */
	public function delete($newsID){
		$this->load->model('NewModel');
		$this->NewModel->delete($newsID);
		$this->session->set_flashdata('success','Xoá thành công');
		redirect(base_url('New/list'));
	}


}