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

        $query = $this->db->select('productcar.price as giasanpham, productcardetail.*, productcar.description as motasanpham')
            ->from('productcar')
            ->join('productcardetail', 'productcardetail.productCarID = productcar.productCarID') //khóa ngoại - khóa chính <==> khóa chính = khóa ngoại
            ->where('productcardetail.productCarID=', $id)
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

    /* -------------------------------------------------------------------------- */
}
