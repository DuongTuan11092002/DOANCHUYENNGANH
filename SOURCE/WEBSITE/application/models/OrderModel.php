<?php
defined('BASEPATH') or exit('No direct script access allowed');
class OrderModel extends CI_model
{
    //show select
    public function selectOrder()
    {
        $query = $this->db->select('order.*, shipping.*')
            ->from('order')
            ->join('shipping', 'shipping.shippingID = order.shippingID') //khóa ngoại - khóa chính <==> khóa chính = khóa ngoại
            ->get();
        return $query->result();
    }

    //view detail
    public function selectOrderDetail($orderCode)
    {
        $query = $this->db->select('order.order_code,order.status as tinhtrang,orderdetail.quantity as qty,orderdetail.orderCode,orderdetail.productCarID, productcar.*')
            ->from('orderdetail')
            ->join('productcar', 'productcar.productCarID = orderdetail.productCarID') //khóa ngoại - khóa chính <==> khóa chính = khóa ngoại
            ->join('order', 'order.order_code = orderdetail.orderCode') //khóa ngoại - khóa chính <==> khóa chính = khóa ngoại

            ->where('orderdetail.orderCode', $orderCode)
            ->get();
        return $query->result();
    }

    //khi xóa đơn hàng thì chi tiết cũng cùng xóa
    //xoá đơn hàng
    public function DeleteOrder($order_code)
    {
        return $this->db->delete('order', ['order_code' => $order_code]);
    }
    //xóa chi tiết đơn hàng 
    public function DeleteOrderDetail($data, $orderCode)
    {
        return $this->db->update('order', $data, ['order_code' => $orderCode]);
    }

    public function UpdateOrder($data, $order_code)
    {
        return $this->db->update('order', $data, ['order_code' => $order_code]);
    }
}
