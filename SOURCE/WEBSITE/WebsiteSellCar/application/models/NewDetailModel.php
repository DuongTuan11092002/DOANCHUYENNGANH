<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class NewDetailModel extends CI_model {

        // thêm 
            public function insertNewDetail($data){
                // câu lệnh insert
                   return $this->db->insert('newsdetail',$data);
            }

        //show select
            public function selectNewDetailList(){

                $query = $this->db->get('newsdetail');
                return $query->result();
            }

            //chose edit
            public function selectNewDetailById($newsDetailID){

                $query = $this->db->get_where('newsdetail',['newsDetailID' =>$newsDetailID]);
                return $query->row();   
            }


            // edited
            public function update($newsDetailID,$data){
                return $this->db->update('newsdetail',$data,['newsDetailID' =>$newsDetailID]);


            }

            // delete
            public function delete($newsDetailID){

                return $this->db->delete('newslist',['newsID' =>$newsDetailID]);
            }


    }


?>