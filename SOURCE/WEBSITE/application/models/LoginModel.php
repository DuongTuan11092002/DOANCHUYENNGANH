<?php
defined('BASEPATH') or exit('No direct script access allowed');
class LoginModel extends CI_model
{

    // tương tác database
    public function checkLogin($email, $password)
    {
        //câu lệnh query "$this->db->where là lấy phần nào trong data" 
        //email = $email gán biến trong bẳng data là email
        //password = $password gán biến trong bảng data là password
        //phương thức get('') cọn bảng trong database cần lấy
        $query = $this->db->where('email', $email)->where('password', $password)->get('admin');
        return $query->result(); // trả về kết quả
    }


    public function insertAdmin($data)
    {
        return $this->db->insert('admin', $data);
    }

    public function checkLoginCustomer($email, $password)
    {
        //câu lệnh query "$this->db->where là lấy phần nào trong data" 
        //email = $email gán biến trong bẳng data là email
        //password = $password gán biến trong bảng data là password
        //phương thức get('') cọn bảng trong database cần lấy
        $query = $this->db->where('email', $email)->where('password', $password)->get('users');
        return $query->result(); // trả về kết quả
    }
    public function RegisterCustomer($data)
    {
        return $this->db->insert('users', $data);
    }


    //tạo vận chuyển
    public function NewShipping($data)
    {
        $this->db->insert('shipping', $data); //tạo xong
        return $shippingID = $this->db->insert_ID(); //lấy từ shippingID lấy tạo ra order 

    }

    //tạo đơn hàng
    public function them_order($data_order)
    {
        $this->db->insert('order', $data_order);
    }

    public function them_order_detail($data_order_detail)
    {
        $this->db->insert('orderdetail', $data_order_detail);
    }



    //thống kê
    // Hàm để đếm đơn hàng chưa xử lý

    public function Count_order_chuaxuly()
    {
        $query = $this->db->select('COUNT(*) as count')
            ->from('order')
            ->where('status', 1) // Điều kiện chưa xử lý, có thể thay đổi tùy vào cấu trúc bảng của bạn
            ->get();
        return $query->row()->count;
    }

    // Hàm để đếm đơn hàng đã xử lý

    public function Count_order_daxuly()
    {
        $query = $this->db->select('COUNT(*) as count')
            ->from('order')
            ->where('status', 2) // Điều kiện chưa xử lý, có thể thay đổi tùy vào cấu trúc bảng của bạn
            ->get();
        return $query->row()->count;
    }

    //hàm đếm số tài khoản trong website
    public function Count_user()
    {
        $query = $this->db->select('COUNT(*) as count')
            ->from('users')
            ->where('status', 1) // Điều kiện chưa xử lý, có thể thay đổi tùy vào cấu trúc bảng của bạn
            ->get();
        return $query->row()->count;
    }
}
