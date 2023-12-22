<?php
    class AutoMakerModel extends CI_model{

          //show select
          public function selectAutoMaker(){

            $query = $this->db->get('autoMaker');
            return $query->result();
        }

        public function insert($data){
            // câu lệnh insert
               return $this->db->insert('autoMaker',$data);
        }


           //chose edit  
           public function selectAutoMakerById($autoMakerID){

            $query = $this->db->get_where('autoMaker',['autoMakerID' =>$autoMakerID]);
            return $query->row();
        }


        // edited 
        public function update($autoMakerID,$data){
            return $this->db->update('autoMaker',$data,['autoMakerID' =>$autoMakerID]);


        }

        // delete 
        public function delete($autoMakerID){

            return $this->db->delete('autoMaker',['autoMakerID' =>$autoMakerID]);


        }


    }


?>