<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PostController extends CI_Controller
{


    public function index()
    {
        $this->load->view('TemplateAD/header');
        $this->load->view('TemplateAD/navbar');
        $this->load->view('Post/index');
        $this->load->view('TemplateAD/footer');
    }

    public function create()
    {
        $this->load->view('TemplateAD/header');
        $this->load->view('TemplateAD/navbar');
        $this->load->model('BlogModel');
        $data['Category_blog'] = $this->BlogModel->selectBlog();
        $this->load->view('Post/create', $data);
        $this->load->view('TemplateAD/footer');
    }


    public function list()
    {
        $this->load->view('TemplateAD/header');
        $this->load->view('TemplateAD/navbar');
        $this->load->model('PostModel');
        $data['Posts'] = $this->PostModel->selectPost();
        $this->load->view('Post/list', $data);
        $this->load->view('TemplateAD/footer');
    }

    // section handle
    // thêm sản phẩm
    public function formCreatePost()
    {
        //check product
        $this->form_validation->set_rules('title', 'Tên bài viết', 'trim|required', ['required' => 'Vui lòng nhập %s']);
        $this->form_validation->set_rules('description', 'mô tả', 'trim|required', ['required' => 'Vui lòng nhập %s ']);
        $this->form_validation->set_rules('slug', 'slug', 'trim|required', ['required' => 'Vui lòng nhập %s ']);
        $this->form_validation->set_rules('content', 'Nội dung', 'trim|required', ['required' => 'Vui lòng nhập %s ']);
        $this->form_validation->set_rules('short_content', 'nội dung ngắn', 'trim|required', ['required' => 'Vui lòng nhập %s ']);
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
                $this->load->view('Post/create', $error);
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
                    'content' => $this->input->post('content'),
                    'short_content' => $this->input->post('short_content'),
                    'status' => $this->input->post('status'),

                    'category_id_blog' => $this->input->post('category_id_blog'),
                    'image' => $blog_filename

                ];
                // hàm gọi 
                $this->load->model('PostModel');
                $this->PostModel->insert($data);
                $this->session->set_flashdata('success', 'thêm thành công');
                redirect(base_url('Post/create'));
            }
        } else {
            $this->create();
        }
    }



    public function edit($id)
    {
        $this->load->view('TemplateAD/header');
        $this->load->view('TemplateAD/navbar');
        $this->load->model('BlogModel');
        $data['Category_blog'] = $this->BlogModel->selectBlog();
        $this->load->model('PostModel');
        $data['PostEdit'] = $this->PostModel->selectPostById($id);
        $this->load->view('Post/edit', $data);
        $this->load->view('TemplateAD/footer');
    }


    public function update($id)
    {
        $this->form_validation->set_rules('title', 'Tên bài viết', 'trim|required', ['required' => 'Vui lòng nhập %s']);
        $this->form_validation->set_rules('description', 'mô tả', 'trim|required', ['required' => 'Vui lòng nhập %s ']);
        $this->form_validation->set_rules('slug', 'slug', 'trim|required', ['required' => 'Vui lòng nhập %s ']);
        $this->form_validation->set_rules('content', 'Nội dung', 'trim|required', ['required' => 'Vui lòng nhập %s ']);
        $this->form_validation->set_rules('short_content', 'nội dung ngắn', 'trim|required', ['required' => 'Vui lòng nhập %s ']);

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

                if (!$this->upload->do_upload('image')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->load->view('TemplateAD/header');
                    $this->load->view('TemplateAD/navbar');
                    $this->load->view('Post/edit', $error);
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
                        'content' => $this->input->post('content'),
                        'short_content' => $this->input->post('short_content'),
                        'status' => $this->input->post('status'),
                        'category_id_blog' => $this->input->post('category_id_blog'),
                        'image' => $blog_filename

                    ];
                }
            } else {
                $data = [
                    // các cột database------------lấy từ các input 
                    'title' => $this->input->post('title'),
                    'description' => $this->input->post('description'),
                    'slug' => $this->input->post('slug'),
                    'content' => $this->input->post('content'),
                    'short_content' => $this->input->post('short_content'),
                    'status' => $this->input->post('status'),
                    'category_id_blog' => $this->input->post('category_id_blog'),


                ];
            }

            // hàm gọi 
            $this->load->model('PostModel');
            $this->PostModel->update($id, $data);
            $this->session->set_flashdata('success', 'sửa thành công');
            redirect(base_url('Post/list'));
        } else {
            $this->edit($id);
        }
    }

    /* -------------------------------------------------------------------------- */
    /*                                   DELETE                                   */

    public function delete($categoriesID)
    {
        $this->load->model('CategoryModel');
        $this->CategoryModel->delete($categoriesID);
        $this->session->set_flashdata('success', 'xoá thành công');
        redirect(base_url('Category/list'));
    }

    /* -------------------------------------------------------------------------- */
}
