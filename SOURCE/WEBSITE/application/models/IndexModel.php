<?php
class IndexModel extends CI_model
{

    // tương tác database
    public function getCategoryHome()
    {

        $query = $this->db->get_where('categories', ['status' => 1]);
        return $query->result();
    }

    public function getAutoMakerHome()
    {

        $query = $this->db->get_where('automaker', ['status' => 1]);
        return $query->result();
    }

    public function getAllProducts()
    {

        $query = $this->db->get_where('productCar', ['status' => 1]);
        return $query->result();
    }

    /* -------------------------------------------------------------------------- */
    /*                                    BLOG                                    */
    public function getPost()
    {
        $query = $this->db->get_where('post', ['status' => 1]);
        return $query->result();
    }

    public function getCategoryBlogHome()
    {
        $query = $this->db->get_where('category_blog', ['status' => 1]);
        return $query->result();
    }

    public function getCategoryBlogTitle($id)
    {
        $this->db->select('category_blog.*');
        $this->db->from('category_blog');
        $this->db->limit(1);
        $this->db->where('category_blog.id=', $id);
        $query = $this->db->get();
        $result = $query->row();
        return $title = $result->title;
    }

    public function getCategorySlugBlog($id)
    {
        $this->db->select('category_blog.*');
        $this->db->from('category_blog');
        $this->db->limit(1);
        $this->db->where('category_blog.id=', $id);
        $query = $this->db->get();
        $result = $query->row();
    }


    public function getCategoryBlogByID($id)
    {

        $query = $this->db->select('category_blog.title as tendanhmuc, post.*')
            ->from('category_blog')
            ->join('post', 'category_blog.id = post.category_id_blog') //khóa ngoại - khóa chính <==> khóa chính = khóa ngoại
            ->where('post.category_id_blog=', $id)
            ->get();
        return $query->result();
    }

    public function getPostBlogTitle($id)
    {
        $this->db->select('post.*');
        $this->db->from('post');
        $this->db->limit(1);
        $this->db->where('post.id=', $id);
        $query = $this->db->get();
        $result = $query->row();
        return $title = $result->title;
    }

    public function getBlogByID($id)
    {
        $query = $this->db->get_where('post', ['id' => $id]);
        return $query->row();
    }
    /* -------------------------------------------------------------------------- */

    /* -------------------------------------------------------------------------- */
    /*                         Danh-mục-theo-từng-sản-phẩm                        */
    public function ItemsAutoMaker()
    {
        $this->db->select('productcar.*, automaker.autoMakerName as titleAuto, automaker.autoMakerID');
        $this->db->from('automaker');
        $this->db->join('productcar', 'productcar.autoMakerID = automaker.autoMakerID');
        $query = $this->db->get();
        $result = $query->result_array();

        // echo "<pre>";
        // print_r($result);

        $newArray = array();
        foreach ($result as $key => $value) {
            $newArray[$value['titleAuto']][] = $value;
        }
        return $newArray;
        // print_r($newArray);
    }

    /* -------------------------------------------------------------------------- */


    /* -------------------------------- category -------------------------------- */
    public function getCategoryProduct($id)
    {

        $query = $this->db->select('categories.categoriesName as tendanhmuc, productcar.*, autoMaker.autoMakerName as tenhang')
            ->from('categories')
            ->join('productcar', 'productCar.categoriesID = categories.categoriesID') //khóa ngoại - khóa chính <==> khóa chính = khóa ngoại
            ->join('autoMaker', 'autoMaker.autoMakerID = productcar.autoMakerID')
            ->where('productcar.categoriesID=', $id)
            ->get();
        return $query->result();
    }

    public function getCategoryTitle($id)
    {
        $this->db->select('categories.*');
        $this->db->from('categories');
        $this->db->limit(1);
        $this->db->where('categories.categoriesID=', $id);
        $query = $this->db->get();
        $result = $query->row();
        return $title = $result->categoriesName;
    }
    /* ---------------------------- Chi-tiet-san-pham --------------------------- */
    public function getProductDetail($id)
    {

        $query = $this->db->select('productcar.price as giasanpham, productcardetail.*, productcar.description as motasanpham, productcar.quantity as soluong, categories.categoriesID as tendanhmuc')
            ->from('productcar')
            ->join('productcardetail', 'productcardetail.productCarID = productcar.productCarID') //khóa ngoại - khóa chính <==> khóa chính = khóa ngoại
            ->join('categories', 'categories.categoriesID = productcar.categoriesID')
            ->where('productcardetail.productCarID=', $id)
            ->get();
        return $query->result();
    }

    /* ------------------------- Sản-phẩm-cùng-danh-mục ------------------------- */
    public function getProductRelated($id, $category_id)
    {
        $query = $this->db->select('categories.categoriesName as tendanhmuc, productcar.*, automaker.autoMakerName as tenhang')
            ->from('categories')
            ->join('productcar', 'productcar.categoriesID = categories.categoriesID ')
            ->join('automaker', 'automaker.automakerID = productcar.autoMakerID')
            ->where('productcar.categoriesID', $category_id)
            ->where_not_in('productcar.productCarID', $id) //trừ ra sản phẩm hiện tại 
            ->get();
        return $query->result();
    }




    /* ------------------------------- THUONG-HIEU ------------------------------ */
    public function getAutoMakerProduct($AutoMakerID)
    {

        $query = $this->db->select('categories.categoriesName as tendanhmuc, productcar.*, autoMaker.autoMakerName as tenhang')
            ->from('categories')
            ->join('productcar', 'productCar.categoriesID = categories.categoriesID') //khóa ngoại - khóa chính <==> khóa chính = khóa ngoại
            ->join('autoMaker', 'autoMaker.autoMakerID = productcar.autoMakerID')
            ->where('productcar.autoMakerID=' . $AutoMakerID)
            ->get();
        return $query->result();
    }

    public function getAutoMakerTitle($AutoMakerID)
    {
        $this->db->select('automaker.*');
        $this->db->from('automaker');
        $this->db->limit(1);
        $this->db->where('automaker.autoMakerID=' . $AutoMakerID);
        $query = $this->db->get();
        $result = $query->row();
        return $title = $result->autoMakerName;
    }


    /* --------------------------------- Search --------------------------------- */
    public function getProductByKeyWord($Keyword)
    {
        $this->db->like('productCarName', $Keyword);
        $query = $this->db->get('productcar');
        return $query->result();
    }


    /* ------------------------------- PANIGATION ------------------------------- */
    public function countAllProduct()
    {
        return $this->db->count_all('productcar');
    }

    public function getIndexPagination($limit, $start)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get_where('productcar', ['status' => 1]);
        return $query->result();
    }


    /* -------------------------------------------------------------------------- */
    /*                               SECTION-FILTER                               */
    //productcar
    public function getProductKytu($kytu)
    {
        $query = $this->db->select('productcar.*')
            ->from('productcar')
            ->order_by('productcar.productCarName', $kytu)
            ->get();
        return $query->result();
    }

    public function getProductGia($gia)
    {
        $query = $this->db->select('productcar.*')
            ->from('productcar')
            ->order_by('productcar.price', $gia)
            ->get();
        return $query->result();
    }

    /* ----------------------------- FILTER-CATEGORY ---------------------------- */
    public function getCategoryKytu($id, $kytu)
    {
        $query = $this->db->select('categories.categoriesName as tendanhmuc, productcar.*, autoMaker.autoMakerName as tenhang')
            ->from('categories')
            ->join('productcar', 'productCar.categoriesID = categories.categoriesID') //khóa ngoại - khóa chính <==> khóa chính = khóa ngoại
            ->join('autoMaker', 'autoMaker.autoMakerID = productcar.autoMakerID')
            ->where('productcar.categoriesID=' . $id)
            ->order_by('productcar.productCarName', $kytu)

            ->get();
        return $query->result();
    }

    public function getCategoryGia($id, $gia)
    {
        $query = $this->db->select('categories.categoriesName as tendanhmuc, productcar.*, autoMaker.autoMakerName as tenhang')
            ->from('categories')
            ->join('productcar', 'productCar.categoriesID = categories.categoriesID') //khóa ngoại - khóa chính <==> khóa chính = khóa ngoại
            ->join('autoMaker', 'autoMaker.autoMakerID = productcar.autoMakerID')
            ->where('productcar.categoriesID=', $id)
            ->order_by('productcar.price', $gia)

            ->get();
        return $query->result();
    }

    /* ------------------------------- RANGE PRICE ------------------------------ */
    public function getMinCategoryPrice($id)
    {
        $this->db->select('productcar.*');
        $this->db->from('productcar');
        $this->db->select_min('price');
        $this->db->where('productcar.categoriesID', $id);
        $this->db->limit(1);
        $query = $this->db->get();
        $result = $query->row();
        return $price = $result->price;
    }

    public function getMaxCategoryPrice($id)
    {
        $this->db->select('productcar.*');
        $this->db->from('productcar');
        $this->db->select_max('price');
        $this->db->where('productcar.categoriesID', $id);
        $this->db->limit(1);
        $query = $this->db->get();
        $result = $query->row();
        return $price = $result->price;
    }

    public function getCategoryPriceRange($id, $price_from, $price_to)
    {
        $query = $this->db->select('categories.categoriesName as tendanhmuc, productcar.*, autoMaker.autoMakerName as tenhang')
            ->from('categories')
            ->join('productcar', 'productCar.categoriesID = categories.categoriesID') //khóa ngoại - khóa chính <==> khóa chính = khóa ngoại
            ->join('autoMaker', 'autoMaker.autoMakerID = productcar.autoMakerID')
            ->where('productcar.categoriesID=', $id)
            ->where('productcar.price >=', $price_from)
            ->where('productcar.price <=', $price_to)
            ->order_by('productcar.price', 'asc')
            ->get();
        return $query->result();
    }

    /* ----------------------------- FILTER-AUTOMAKER ---------------------------- */
    public function getAutoMakerKytu($AutoMakerID, $kytu)
    {
        $query = $this->db->select('categories.categoriesName as tendanhmuc, productcar.*, autoMaker.autoMakerName as tenhang')
            ->from('categories')
            ->join('productcar', 'productCar.categoriesID = categories.categoriesID') //khóa ngoại - khóa chính <==> khóa chính = khóa ngoại
            ->join('autoMaker', 'autoMaker.autoMakerID = productcar.autoMakerID')
            ->where('productcar.autoMakerID=' . $AutoMakerID)
            ->order_by('productcar.productCarName', $kytu)
            ->get();
        return $query->result();
    }

    public function getAutoMakerGia($AutoMakerID, $gia)
    {
        $query = $this->db->select('categories.categoriesName as tendanhmuc, productcar.*, autoMaker.autoMakerName as tenhang')
            ->from('categories')
            ->join('productcar', 'productCar.categoriesID = categories.categoriesID') //khóa ngoại - khóa chính <==> khóa chính = khóa ngoại
            ->join('autoMaker', 'autoMaker.autoMakerID = productcar.autoMakerID')
            ->where('productcar.autoMakerID=' . $AutoMakerID)
            ->order_by('productcar.price', $gia)
            ->get();
        return $query->result();
    }

    /* ----------------------------- RANGE-AUTOMAKER ---------------------------- */
    public function getMinAutoMakerPrice($AutoMakerID)
    {
        $this->db->select('productcar.*');
        $this->db->from('productcar');
        $this->db->select_min('price');
        $this->db->where('productcar.autoMakerID', $AutoMakerID);
        $this->db->limit(1);
        $query = $this->db->get();
        $result = $query->row();
        return $price = $result->price;
    }

    public function getMaxAutoMakerPrice($AutoMakerID)
    {
        $this->db->select('productcar.*');
        $this->db->from('productcar');
        $this->db->select_max('price');
        $this->db->where('productcar.autoMakerID', $AutoMakerID);
        $this->db->limit(1);
        $query = $this->db->get();
        $result = $query->row();
        return $price = $result->price;
    }

    public function getAutoMakerPriceRange($id, $price_from, $price_to)
    {
        $query = $this->db->select('categories.categoriesName as tendanhmuc, productcar.*, autoMaker.autoMakerName as tenhang')
            ->from('categories')
            ->join('productcar', 'productCar.categoriesID = categories.categoriesID') //khóa ngoại - khóa chính <==> khóa chính = khóa ngoại
            ->join('autoMaker', 'autoMaker.autoMakerID = productcar.autoMakerID')
            ->where('productcar.autoMakerID=', $id)
            ->where('productcar.price >=', $price_from)
            ->where('productcar.price <=', $price_to)
            ->order_by('productcar.price', 'asc')
            ->get();
        return $query->result();
    }
    /* -------------------------------------------------------------------------- */

    /* -------------------------------------------------------------------------- */
    /*                               FILTER-PRODUCT                               */

    public function getMinProductPrice()
    {
        $this->db->select('productcar.*');
        $this->db->from('productcar');
        $this->db->select_min('price');
        $this->db->limit(1);
        $query = $this->db->get();
        $result = $query->row();
        return $price = $result->price;
    }

    public function getMaxProductPrice()
    {
        $this->db->select('productcar.*');
        $this->db->from('productcar');
        $this->db->select_max('price');
        $this->db->limit(1);
        $query = $this->db->get();
        $result = $query->row();
        return $price = $result->price;
    }

    public function getProductPriceRange($price_from, $price_to)
    {
        $query = $this->db->select('categories.categoriesName as tendanhmuc, productcar.*, autoMaker.autoMakerName as tenhang')
            ->from('categories')
            ->join('productcar', 'productCar.categoriesID = categories.categoriesID') //khóa ngoại - khóa chính <==> khóa chính = khóa ngoại
            ->join('autoMaker', 'autoMaker.autoMakerID = productcar.autoMakerID')
            ->where('productcar.price >=', $price_from)
            ->where('productcar.price <=', $price_to)
            ->order_by('productcar.price', 'asc')
            ->get();
        return $query->result();
    }
    /* -------------------------------------------------------------------------- */

    /* -------------------------------------------------------------------------- */
    /*                                   CONTACT                                  */
    public function ContactList()
    {
        $query = $this->db->get_where('contact', ['status' => 1]);
        return $query->result();
    }

    public function insertContact($data)
    {
        return $this->db->insert('contact', $data);
    }

    // delete
    public function delete($contactID)
    {

        return $this->db->delete('contact', ['contactID' => $contactID]);
    }
    /* -------------------------------------------------------------------------- */

    /* -------------------------------------------------------------------------- */
    /*                           Authentication register                          */
    public function getCustomerToken($email)
    {
        $query = $this->db->get_where('users', ['email' => $email]);
        return $query->result();
    }

    //hàm xác nhận status
    public function ActiveCustomer($email, $data_customer)
    {
        return $this->db->update('users', $data_customer, ['email' => $email]);
    }
    /* -------------------------------------------------------------------------- */
}
