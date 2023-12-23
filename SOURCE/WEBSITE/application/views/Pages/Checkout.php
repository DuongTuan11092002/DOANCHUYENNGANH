    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <?php
                            if($this->cart->contents()){
                        ?>
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Sản phẩm</th>
                                    <th>Giá</th>
                                    <th></th>
                                    <th>Số lượng</th>   
                                    <th></th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $subtotal = 0;
                                $total = 0;
                                foreach ($this->cart->contents() as $items) { 
                                    $subtotal = $items['qty'] * $items['price'];
                                ?>  
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img src="<?php echo base_url('uploads/libraryDetail/'.$items['options']['image']) ?>" alt="" width="150" height="150">
                                        <h5><?php echo $items['name'] ?></h5>
                                    </td>
                                     <td class="shoping__cart__price">
                                        <?php echo number_format($items['price']).'VNĐ'?>
                                    </td>
                                    <td></td>
                                    <!-- <td class="shoping__cart__total">
                                        <?php  ?>
                                    </td> -->
                                 
                                    <td class="shoping__cart__quantity">
                                    <form action="<?php echo base_url('cap-nhat-gio-hang') ?>" method="post">
                                        <div class="quantity">
                                                <input type="hidden" name="rowid" value="<?php echo $items['rowid'] ?>">
                                                <input type="number" min="1" value="<?php echo $items['qty'] ?>" name="quantity" style="display: inline-block; width:50px;" >

                                                
                                                <input type="submit" name="gui-cap-nhat" class="btn btn-success text-uppercase" style="display:inline-block; width: 100px" value="Cập nhật">
                                            </div>
                                    </form>
                                    
                                    </td>

                                     
                                </tr>

                                <?php 
                                } 
                                ?>
                       
                            </tbody>
                        </table>
                       
                    </div>
                </div>
            </div>
            <div class="row">
            
                <div class="col-lg-8">
                <form  onsubmit="return confirm('Xác nhận đặt hàng')" method="POST" action="<?php echo base_url('xac-nhan-dat-hang') ?>">
                        <div class="checkout__form">
                        <h4>Thông tin chi tiết </h4>
                        <?php
                            if($this->session->flashdata('success')){
                                ?>
                            <div class="alert alert-success"> <?php echo $this->session->flashdata('success') ?></div>
                            <?php
                            }elseif($this->session->flashdata('error')){
                            ?>
                            <div class="alert alert-danger"> <?php echo $this->session->flashdata('error') ?></div>
                        <?php
                            }
                        ?>
                            <div class="row">
                                <div class="col-lg-8 col-md-6">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="checkout__input">
                                                <p>Họ Tên<span>*</span></p>
                                                <input type="text" name="Fullname">
                                                <?php echo form_error('Fullname'); ?>
                                            </div>
                                        </div>
                                    
                                    </div>
                                    <div class="checkout__input">
                                        <p>Địa chỉ<span>*</span></p>
                                        <input type="text" name="Address">
                                                <?php echo form_error('Address'); ?>

                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="checkout__input">
                                                <p>Phone<span>*</span></p>
                                                <input type="text" name="Phone">
                                                <?php echo form_error('Phone'); ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="checkout__input">
                                                <p>Email<span>*</span></p>
                                                <input type="text" name="Email">
                                                <?php echo form_error('Email'); ?>
                                            </div>
                                        </div>
                                        
                                        <div class="checkout__input" >
                                        <div class="col-lg-12">
            
                                                <p>Hình thức thanh toán<span>*</span></p>
                                                <select name="hinh-thuc-thanh-toan" id="">
                                                    <option value="cod" selected>Tiền mặt</option>
                                                    <option value="vnpay">Thẻ ngân hàng</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
            </div>  
                </div>
                <div class="col-lg-4">
                    <div class="shoping__checkout">
                        <h5 class="text-uppercase">Tổng hóa đơn</h5>
                        <ul>
                            <li>Tổng <span>
                                <?php echo number_format($subtotal) ?>   
                            </span></li>
                        </ul>
                        <button type="submit" class="primary-btn text-uppercase">Xác nhận thanh toán</button>
                    </div>
                </div>
            </div>
            </form>

            <?php
                        }else{
                            echo '<span class="text text-danger">Không có sản phẩm thanh toán</span>';
                        ?>

                        <?php
                        }
                        ?>
        </div>
    </section>
    <!-- Shoping Cart Section End -->