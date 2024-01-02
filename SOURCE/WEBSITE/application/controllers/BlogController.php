<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BlogController extends CI_Controller
{

    /* ------------------------------ SHOW FRONTEND ----------------------------- */
    public function index()
    {
        $this->load->view('TemplateAD/header');
        $this->load->view('TemplateAD/navbar');
        $this->load->view('Category_blog/index');
        $this->load->view('TemplateAD/footer');
    }

    public function create()
    {
        $this->load->view('TemplateAD/header');
        $this->load->view('TemplateAD/navbar');
        $this->load->view('Category_blog/create');
        $this->load->view('TemplateAD/footer');
    }

    public function list()
    {
        $this->load->view('TemplateAD/header');
        $this->load->view('TemplateAD/navbar');
        $this->load->model('BlogModel');
        $data['category_blog'] = $this->BlogModel->selectBlog();
        $this->load->view('Category_blog/list', $data);
        $this->load->view('TemplateAD/footer');
    }

    /* ---------------------------- END SHOW FRONTEND --------------------------- */


    /* -------------------------------- FUNCTION -------------------------------- */

    /* -------------------------------------------------------------------------- */
    /*                                   CREATE                                   */

    public function formCreateBlog()
    {
        //check product
        $this->form_validation->set_rules('title', 'Tên danh mục tin ', 'trim|required', ['required' => 'Vui lòng nhập %s']);
        $this->form_validation->set_rules('description', 'mô tả', 'trim|required', ['required' => 'Vui lòng nhập %s ']);
        $this->form_validation->set_rules('slug', 'slug', 'trim|required', ['required' => 'Vui lòng nhập %s ']);


        if ($this->form_validation->run() == true) {
            // upload file image
            $ori_filename = $_FILES['image']['name'];
            $new_name = time() . "" . str_replace(' ', '-', $ori_filename);
            $config = [
                'upload_path' => './frontend/img/blog',
                'allowed_types' => 'gif|jpg|png|jpeg',
                'file_name' => $new_name,
            ];
            //này phải có library upload mới thực hiện đc
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('TemplateAD/header');
                $this->load->view('TemplateAD/navbar');
                $this->load->view('Category_blog/create', $error);
                $this->load->view('TemplateAD/footer');
            } else {
                // hàm upload product
                $blog_filename = $this->upload->data('file_name');
                //mảng data insert
                $data = [
                    // các cột database------------lấy từ các input 
                    'title' => $this->input->post('title'),
                    'description' => $this->input->post('description'),
                    'image' => $blog_filename,
                    'status' => $this->input->post('status'),
                    'slug' => $this->input->post('slug'),

                ];
                // hàm gọi 
                $this->load->model('BlogModel');
                $this->BlogModel->insertBlog($data);
                $this->session->set_flashdata('success', 'thêm thành công');
                redirect(base_url('Blog/list'));
            }
        } else {
            $this->create();
        }
    }

    /* -------------------------------------------------------------------------- */


    /* -------------------------------------------------------------------------- */
    /*                                    EDIT                                    */

    public function edit($id)
    {
        $this->load->view('TemplateAD/header');
        $this->load->view('TemplateAD/navbar');
        $this->load->model('BlogModel');
        $data['BlogID'] = $this->BlogModel->selectBlogById($id);
        $this->load->view('Category_blog/edit', $data);
        $this->load->view('TemplateAD/footer');
    }

    /* -------------------------------------------------------------------------- */

    /* -------------------------------------------------------------------------- */
    /*                                   UPDATE                                   */

    public function update($id)
    {
        //check product
        $this->form_validation->set_rules('title', 'Tên danh mục tin ', 'trim|required', ['required' => 'Vui lòng nhập %s']);
        $this->form_validation->set_rules('description', 'mô tả', 'trim|required', ['required' => 'Vui lòng nhập %s ']);
        $this->form_validation->set_rules('slug', 'slug', 'trim|required', ['required' => 'Vui lòng nhập %s ']);

        if ($this->form_validation->run() == true) {
            if (!empty($_FILES['image']['name'])) {
                // upload file image
                $ori_filename = $_FILES['image']['name'];
                $new_name = time() . "" . str_replace(' ', '-', $ori_filename);
                $config = [
                    'upload_path' => './frontend/img/blog',
                    'allowed_types' => 'gif|jpg|png|jpeg',
                    'file_name' => $new_name,
                ];
                //này phải có library upload mới thực hiện đc
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('productIMG')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->load->view('TemplateAD/header');
                    $this->load->view('TemplateAD/navbar');
                    $this->load->view('Category_blog/edit', $error);
                    $this->load->view('TemplateAD/footer');
                } else {
                    // hàm upload product
                    $blog_filename = $this->upload->data('file_name');
                    //mảng data insert
                    $data = [
                        // các cột database------------lấy từ các input 
                        'title' => $this->input->post('title'),
                        'description' => $this->input->post('description'),
                        'slug' => $this->input->post('slug'),
                        'status' => $this->input->post('status'),
                        'thumnail' => $blog_filename

                    ];
                }
            } else {
                $data = [
                    'title' => $this->input->post('title'),
                    'description' => $this->input->post('description'),
                    'slug' => $this->input->post('slug'),
                    'status' => $this->input->post('status'),
                ];
            }

            // hàm gọi 
            $this->load->model('BlogModel');
            $this->BlogModel->updateBlog($id, $data);
            $this->session->set_flashdata('success', 'sửa thành công');
            redirect(base_url('Blog/list'));
        } else {
            $this->edit($id);
        }
    }

    /* -------------------------------------------------------------------------- */



    /* -------------------------------------------------------------------------- */
    /*                                   DELETE                                   */

    public function delete($id)
    {
        $this->load->model('BlogModel');
        $this->BlogModel->delete($id);
        $this->session->set_flashdata('success', 'xoá thành công');
        redirect(base_url('Blog/list'));
    }

    /* -------------------------------------------------------------------------- */
}
