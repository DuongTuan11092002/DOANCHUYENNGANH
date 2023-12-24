<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class OrderModel extends CI_model {
        //show select
            public function selectOrder(){
                $query = $this->db->select('order.*, shipping.*')
                ->from('order')
                ->join('shipping', 'shipping.shippingID = order.shippingID') //khóa ngoại - khóa chính <==> khóa chính = khóa ngoại
                ->get();
                return $query->result();
            }
    }


?>