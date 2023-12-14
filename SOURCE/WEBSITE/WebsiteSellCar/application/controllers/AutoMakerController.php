<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AutoMakerController extends CI_Controller {

/* ------------------------------ SHOW FRONTEND ----------------------------- */
	public function index()
	{
        $this->load->view('TemplateAD/header');
        $this->load->view('TemplateAD/navbar');
        $this->load->view('AutoMakerAD/index');
        $this->load->view('TemplateAD/footer');

	}

    public function create()
	{
        $this->load->view('TemplateAD/header');
        $this->load->view('TemplateAD/navbar');
        $this->load->view('AutoMakerAD/create');
        $this->load->view('TemplateAD/footer');

	}

        public function list()
	{	
		$this->load->view('TemplateAD/header');
		$this->load->view('TemplateAD/navbar');
		$this->load->model('AutoMakerModel');
        $data['autoMaker'] = $this->AutoMakerModel->selectAutoMaker();
		$this->load->view('AutoMakerAD/list', $data);
		$this->load->view('TemplateAD/footer');
        
	}

/* ---------------------------- END SHOW FRONTEND --------------------------- */


	/* -------------------------------- FUNCTION -------------------------------- */

/* -------------------------------------------------------------------------- */
/*                                   CREATE                                   */

public function formCreateAutoMaker()
{
	//check product
			$this->form_validation->set_rules('autoMakerName', 'hãng xe', 'trim|required', ['required' => 'Vui lòng nhập %s']);
			
			if ($this->form_validation->run() == true) 
			{
						$data = [
							// các cột database------------lấy từ các input 				
							'autoMakerName' => $this->input->post('autoMakerName'),
						];
				
						// hàm gọi 
						$this->load->model('AutoMakerModel');
						$this->AutoMakerModel->insert($data); // kiểm tra đúng hàm sử dụng hay không?
						$this->session->set_flashdata('success','thêm thành công');
						redirect(base_url('AutoMaker/create'));
					
			}
			else
			{
					$this->create();
			}
}

/* -------------------------------------------------------------------------- */

   
/* -------------------------------------------------------------------------- */
/*                                    EDIT                                    */

			public function edit($autoMakerID){
				$this->load->view('TemplateAD/header');
				$this->load->view('TemplateAD/navbar');
				$this->load->model('AutoMakerModel');
				$data['autoMaker'] = $this->AutoMakerModel->selectAutoMakerById($autoMakerID);
				$this->load->view('AutoMakerAD/edit', $data);
				$this->load->view('TemplateAD/footer');
			}

/* -------------------------------------------------------------------------- */

/* -------------------------------------------------------------------------- */
/*                                   UPDATE                                   */

public function	update($autoMakerID)
		{
				//check product
				$this->form_validation->set_rules('autoMakerName', 'hãng xe', 'trim|required', ['required' => 'Vui lòng nhập %s']);
						
				if ($this->form_validation->run() == true) 
				{					
							$data = [
								// các cột database------------lấy từ các input 				
								'autoMakerName' => $this->input->post('autoMakerName'),
							];
							
							// hàm gọi 
							$this->load->model('AutoMakerModel');
							$this->AutoMakerModel-> update($autoMakerID, $data); // kiểm tra đúng hàm sử dụng hay không?
							$this->session->set_flashdata('success','cập nhật thành công');
							redirect(base_url('AutoMaker/list'));
						
				}
				else
				{
						$this->edit();
				}
		}

/* -------------------------------------------------------------------------- */
	


/* -------------------------------------------------------------------------- */
/*                                   DELETE                                   */

		public function delete($autoMakerID){
			$this->load->model('AutoMakerModel');
			$this->AutoMakerModel->delete($autoMakerID);
			$this->session->set_flashdata('success','xoá thành công');
			redirect(base_url('AutoMaker/list'));
			}

/* -------------------------------------------------------------------------- */

}


