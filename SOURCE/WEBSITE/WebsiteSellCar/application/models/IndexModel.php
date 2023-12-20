<?php
    class IndexModel extends CI_model{

        // tương tác database
            public function getCategoryHome(){
                
                $query = $this->db->get_where('categories',['status' => 1]);
                return $query->result();
            }

            public function getAutoMakerHome(){
                
                $query = $this->db->get_where('automaker',['status' => 1]);
                return $query->result();
            }


            public function getAllProducts(){

                $query = $this->db->get_where('productCar',['status' => 1]);
                return $query->result();
            }

    }


?>