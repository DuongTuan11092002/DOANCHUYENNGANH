<?php
defined('BASEPATH') or exit('No direct script access allowed');

class OrderController extends CI_Controller
{


        public function index()
        {
                $this->load->view('TemplateAD/header');
                $this->load->view('TemplateAD/navbar');
                $this->load->model('OrderModel');
                $data['Order'] = $this->OrderModel->selectOrder();
                $this->load->view('OrderAD/list', $data);
                $this->load->view('TemplateAD/footer');
        }


        public function View($orderCode)
        {
                $this->load->view('TemplateAD/header');
                $this->load->view('TemplateAD/navbar');
                $this->load->model('OrderModel');
                $data['OrderDetail'] = $this->OrderModel->selectOrderDetail($orderCode);
                $this->load->view('OrderAD/View', $data);
                $this->load->view('TemplateAD/footer');
        }

        public function DeleteOrder($order_code)
        {
                $this->load->model('OrderModel');
                $del_order_detail = $this->OrderModel->DeleteOrderDetail($order_code); //xoa chitiet trước
                $del = $this->OrderModel->DeleteOrder($order_code); //xoa don hang sau
                if ($del) {
                        $this->session->set_flashdata('success', 'xoá thành công');
                        redirect(base_url('Order/list'));
                } else {
                        $this->session->set_flashdata('error', 'xoá không thành công');
                        redirect(base_url('Order/list'));
                }
        }

        public function Process()
        {
                $value = $this->input->post('value');
                $order_code = $this->input->post('order_code');
                $this->load->model('OrderModel');

                $data = array(
                        'status' => $value,
                );
                $this->OrderModel->UpdateOrder($data, $order_code);
        }
}
