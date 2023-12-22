<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class ProductDetailModel extends CI_model {

        // thêm 
            public function insertProductDetail($data){
                // câu lệnh insert
                   return $this->db->insert('productcardetail',$data);
            }

        //show select
            public function selectAllProduct(){

                $query = $this->db->select(' productcar.productCarName as tensanpham, productcardetail.*')
                ->from('productcar')
                ->join('productcardetail', 'productcardetail.productCarID = productcar.productCarID') //khóa ngoại - khóa chính <==> khóa chính = khóa ngoại
                ->get();
                return $query->result();
            }

            //chose edit
            public function selectProductDetailById($productCarDetailID){

                $query = $this->db->get_where('productcardetail',['productCarDetailID' =>$productCarDetailID]);
                return $query->row();
            }


            // edited
            public function update($productCarDetailID,$data){
                return $this->db->update('productcardetail',$data,['productCarDetailID' =>$productCarDetailID]);


            }

            // delete
            public function deleteProductDetail($productCarDetailID){

                return $this->db->delete('productcardetail',['productCarDetailID' =>$productCarDetailID]);


            }


    }


?>