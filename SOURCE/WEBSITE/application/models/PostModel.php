<?php
class PostModel extends CI_model
{

    //show select
    public function selectPost()
    {

        $query = $this->db->select('category_blog.title as tendanhmucbaiviet, post.*')
            ->from('category_blog')
            ->join('post', 'post.category_id_blog = category_blog.id') //khóa ngoại - khóa chính <==> khóa chính = khóa ngoại
            ->get();
        return $query->result();
    }

    public function insert($data)
    {
        // câu lệnh insert
        return $this->db->insert('post', $data);
    }


    //chose edit  
    public function selectPostById($id)
    {

        $query = $this->db->get_where('post', ['id' => $id]);
        return $query->row();
    }


    // edited 
    public function update($id, $data)
    {
        return $this->db->update('post', $data, ['id' => $id]);
    }

    // delete 
    public function delete($id)
    {

        return $this->db->delete('category_blog', ['id' => $id]);
    }
}
