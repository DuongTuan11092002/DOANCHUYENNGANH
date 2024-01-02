<?php
class BlogModel extends CI_model
{

    //show select
    public function selectBlog()
    {

        $query = $this->db->get('category_blog');
        return $query->result();
    }

    public function insertBlog($data)
    {
        // câu lệnh insert
        return $this->db->insert('category_blog', $data);
    }


    //chose edit  
    public function selectBlogById($id)
    {

        $query = $this->db->get_where('category_blog', ['id' => $id]);
        return $query->row();
    }


    // edited 
    public function updateBlog($id, $data)
    {
        return $this->db->update('category_blog', $data, ['id' => $id]);
    }

    // delete 
    public function delete($id)
    {

        return $this->db->delete('category_blog', ['id' => $id]);
    }
}
