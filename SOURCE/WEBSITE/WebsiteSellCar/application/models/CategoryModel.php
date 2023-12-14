<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class CategoryModel extends CI_model {

        // thêm 
            public function insertCategory($data){
                // câu lệnh insert
                   return $this->db->insert('categories',$data);
            }

        //show select
            public function selectCategory(){

                $query = $this->db->get('categories');
                return $query->result();
            }

            //chose edit
            public function selectCategoryById($categoriesID){

                $query = $this->db->get_where('categories',['categoriesID' =>$categoriesID]);
                return $query->row();
            }


            // edited
            public function updateCategory($categoriesID,$data){
                return $this->db->update('categories',$data,['categoriesID' =>$categoriesID]);


            }

            // delete
            public function deleteCategory($categoriesID){

                return $this->db->delete('categories',['categoriesID' =>$categoriesID]);
            }


    }


?>