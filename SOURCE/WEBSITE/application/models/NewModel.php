<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class NewModel extends CI_model {

        // thêm 
            public function insertNew($data){
                // câu lệnh insert
                   return $this->db->insert('newslist',$data);
            }

        //show select
            public function selectNewList(){

                $query = $this->db->get('newslist');
                return $query->result();
            }

            //chose edit
            public function selectNewById($newsID){

                $query = $this->db->get_where('newslist',['newsID' =>$newsID]);
                return $query->row();
            }


            // edited
            public function update($newsID,$data){
                return $this->db->update('newslist',$data,['newsID' =>$newsID]);


            }

            // delete
            public function delete($newsID){

                return $this->db->delete('newslist',['newsID' =>$newsID]);
            }


    }


?>