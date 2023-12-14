<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AccessaryMakerController extends CI_Controller {

/* ------------------------------ SHOW FRONTEND ----------------------------- */
	public function index()
	{
        $this->load->view('TemplateAD/header');
        $this->load->view('TemplateAD/navbar');
        $this->load->view('AccessaryMakerAD/index');
        $this->load->view('TemplateAD/footer');

	}

    public function create()
	{
        $this->load->view('TemplateAD/header');
        $this->load->view('TemplateAD/navbar');
        $this->load->view('AccessaryMakerAD/create');
        $this->load->view('TemplateAD/footer');

	}

        public function list()
	{	
		$this->load->view('TemplateAD/header');
		$this->load->view('TemplateAD/navbar');
		$this->load->model('AccessaryMakerModel');
        $data['accessaryMaker'] = $this->AccessaryMakerModel->selectAccessaryMaker();
		$this->load->view('AccessaryMakerAD/list', $data);
		$this->load->view('TemplateAD/footer');
        
	}

/* ---------------------------- END SHOW FRONTEND --------------------------- */


	/* -------------------------------- FUNCTION -------------------------------- */

/* -------------------------------------------------------------------------- */
/*                                   CREATE                                   */

public function formCreateAccessaryMaker()
{
	//check product
			$this->form_validation->set_rules('accessaryMakerName', 'hãng phụ tùng', 'trim|required', ['required' => 'Vui lòng nhập %s']);
			
			if ($this->form_validation->run() == true) 
			{
                    $data = [
                        // các cột database------------lấy từ các input 				
                        'accessaryMakerName' => $this->input->post('accessaryMakerName'),
                    ];
				
						// hàm gọi 
						$this->load->model('AccessaryMakerModel');
						$this->AccessaryMakerModel->insert($data); // kiểm tra đúng hàm sử dụng hay không?
						$this->session->set_flashdata('success','thêm thành công');
						redirect(base_url('AccessaryMaker/create'));
					
			}
			else
			{
					$this->create();
			}
}

/* -------------------------------------------------------------------------- */

   
/* -------------------------------------------------------------------------- */
/*                                    EDIT                                    */

			public function edit($accessaryMakerID){
				$this->load->view('TemplateAD/header');
				$this->load->view('TemplateAD/navbar');
				$this->load->model('AccessaryMakerModel');
				$data['accessaryMaker'] = $this->AccessaryMakerModel->selectAccessaryMakerById($accessaryMakerID);
				$this->load->view('AccessaryMakerAD/edit', $data);
				$this->load->view('TemplateAD/footer');
			}

/* -------------------------------------------------------------------------- */

/* -------------------------------------------------------------------------- */
/*                                   UPDATE                                   */

public function	update($accessaryMakerID)
		{
				//check product
				$this->form_validation->set_rules('accessaryMakerName', 'hãng xe', 'trim|required', ['required' => 'Vui lòng nhập %s']);
						
				if ($this->form_validation->run() == true) 
				{					
							$data = [
								// các cột database------------lấy từ các input 				
								'accessaryMakerName' => $this->input->post('accessaryMakerName'),
							];
							
							// hàm gọi 
							$this->load->model('AccessaryMakerModel');
							$this->AccessaryMakerModel-> update($accessaryMakerID, $data); // kiểm tra đúng hàm sử dụng hay không?
							$this->session->set_flashdata('success','cập nhật thành công');
							redirect(base_url('AccessaryMaker/list'));
						
				}
				else
				{
						$this->edit();
				}
		}

/* -------------------------------------------------------------------------- */
	


/* -------------------------------------------------------------------------- */
/*                                   DELETE                                   */

		public function delete($accessaryMakerID){
			$this->load->model('AccessaryMakerModel');
			$this->AccessaryMakerModel->delete($accessaryMakerID);
			$this->session->set_flashdata('success','xoá thành công');
			redirect(base_url('AccessaryMaker/list'));
			}

/* -------------------------------------------------------------------------- */

}


