<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class ProductModel extends CI_model {

        // thêm 
            public function insertProduct($data){
                // câu lệnh insert
                   return $this->db->insert('productcar',$data);
            }

        //show select
            public function selectProduct(){

                $query = $this->db->get('productcar');
                return $query->result();
            }

            //chose edit
            public function selectProductById($productCarID){

                $query = $this->db->get_where('productcar',['productCarID' =>$productCarID]);
                return $query->row();
            }


            // edited
            public function updateProduct($productCarID,$data){
                return $this->db->update('productcar',$data,['productCarID' =>$productCarID]);


            }

            // delete
            public function deleteProduct($productCarID){

                return $this->db->delete('productcar',['productCarID' =>$productCarID]);


            }


    }


?>