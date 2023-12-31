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

        //IN-ĐƠN-HÀNG
        public function PrintOrder($order_code)
        {

                $this->load->library('Pdf');

                $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
                $pdf->SetTitle('Print Order: ' . $order_code);
                $pdf->SetHeaderMargin(30);
                $pdf->SetTopMargin(20);
                $pdf->setFooterMargin(20);
                $pdf->SetAutoPageBreak(true);
                $pdf->SetAuthor('Author');
                $pdf->SetDisplayMode('real', 'default');
                $pdf->Write(5, 'CodeIgniter TCPDF Integration');
                $pdf->SetFont('dejavusans', '', 10);

                //in đơn hàng
                $pdf->SetFont('dejavusans', '', 10);
                // add a page
                $pdf->AddPage();
                $this->load->model('OrderModel'); //load model

                $data['order_details'] = $this->OrderModel->printOrderDetails($order_code);

                $html = '
                <h3>Đơn hàng của bạn bao gồm sản phẩm:</h3>    
                <p>Cảm ơn bạn đã ủng hộ website <a href="#">F8-CAR</a> của chúng tôi. Vui lòng liên hệ hotline nếu xảy ra sự cố: 0364202648</p>        
                <table border="1" cellspacing="3" cellpadding="4">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Mã đơn hàng</th>
                      <th>Tên sản phẩm</th>
                      <th>Product Image</th>
                      <th>Giá</th>
                      <th>Số lượng</th>
                      <th>Tổng giá</th>
                    </tr>
                  </thead>
                  <tbody>
                  ';
                $total = 0;
                foreach ($data['order_details'] as $key => $product) {
                        $total += $product->quantity * $product->price;
                        $html .= '
                        <tr>
                        <td>' . $key . '</td>
                        <td>' . $order_code . '</td>
                        <td>' . $product->productCarName . '</td> 
                        <td>' . base_url('frontend/img/' . $product->images) . '</td>
                        <td>' . $product->price . '</td>
                        <td>' . $product->quantity . '</td>
                        <td>' . number_format($product->quantity * $product->price, 0, ',', '.') . 'đ</td>
                        
                        </tr>
                        ';
                }

                $html .= '<tr><td colspan="7" align="right">Tổng tiền: ' . number_format($total, 0, ',', '.') . 'đ</td></tr>
                </tbody>
                </table>';


                // output the HTML content
                $pdf->writeHTML($html, true, false, true, false, '');
                $pdf->Output('Order: ' . $order_code . '.pdf', 'I');
        }
}
