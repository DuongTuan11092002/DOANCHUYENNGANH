<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <!-- thông báo -->
                <?php
                if ($this->session->flashdata('success')) {
                ?>
                    <div class="alert alert-success"> <?php echo $this->session->flashdata('success') ?></div>
                <?php
                } elseif ($this->session->flashdata('error')) {
                ?>
                    <div class="alert alert-danger"> <?php echo $this->session->flashdata('error') ?></div>
                <?php
                }
                ?>
                <div class="shoping__cart__table">
                    <?php
                    if ($this->cart->contents()) {
                    ?>
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Số lượng còn</th>
                                    <th></th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $subtotal = 0;
                                $total = 0;
                                foreach ($this->cart->contents() as $items) {
                                    $subtotal = $items['qty'] * $items['price'];
                                    $total += $subtotal;
                                ?>
                                    <tr>
                                        <td class="shoping__cart__item">
                                            <img src="<?php echo base_url('uploads/libraryDetail/' . $items['options']['image']) ?>" alt="" width="150" height="150">
                                            <h5><?php echo $items['name'] ?></h5>
                                        </td>
                                        <td class="shoping__cart__price">
                                            <?php echo number_format($items['price']) . 'VNĐ' ?>
                                        </td>

                                        <!-- <td class="shoping__cart__total">
                                        <?php  ?>
                                    </td> -->

                                        <td class="shoping__cart__quantity">
                                            <form action="<?php echo base_url('cap-nhat-gio-hang') ?>" method="post">
                                                <div class="quantity">
                                                    <input type="hidden" name="rowid" value="<?php echo $items['rowid'] ?>">
                                                    <?php //nếu số lượng đặt cao hơn số lượng còn thì chỉ hiển thị số lượng còn (finish)
                                                    if ($items['qty'] > $items['options']['quantity_current']) {
                                                    ?>
                                                        <input type="number" min="1" value="<?php echo $items['options']['quantity_current'] ?>" name="quantity" style="display: inline-block; width:50px;">

                                                    <?php
                                                    } else { // ngược lại nhỏ hơn số lượng tồn thì cho đặt hàng
                                                    ?>
                                                        <input type="number" min="1" value="<?php echo $items['qty'] ?>" name="quantity" style="display: inline-block; width:50px;">

                                                    <?php
                                                    }
                                                    ?>


                                                    <input type="submit" name="gui-cap-nhat" class="btn btn-success text-uppercase" style="display:inline-block; width: 100px" value="Cập nhật">
                                                </div>
                                            </form>

                                        </td>

                                        <td class="shoping__cart__price">
                                            <?php echo $items['options']['quantity_current'] ?>
                                        </td>

                                        <td class="shoping__cart__item__close">
                                            <a href="<?php echo base_url('xoa-san-pham/' . $items['rowid']) ?>">
                                                <span class="icon_close"></span>

                                            </a>
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
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="<?php echo base_url('xoa-gio-hang') ?>" class="primary-btn cart-btn">Xoá tất cả</a>

                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__continue">
                    <div class="shoping__discount">
                        <h5>Mã giảm giá</h5>
                        <form action="#">
                            <input type="text" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn text-uppercase">Áp dụng</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Tổng giỏ hàng</h5>
                    <ul>
                        <li>Tổng <span>
                                <?php echo number_format($total) ?>
                            </span></li>
                    </ul>
                    <a href="<?php echo base_url('kiem-tra-thanh-toan') ?>" class="primary-btn text-uppercase">đặt hàng</a>
                </div>
            </div>
        </div>
    <?php
                    } else {
                        echo '<span class="text text-danger">Vui lòng thêm sản phẩm vào giỏ hàng</span>';
    ?>

    <?php
                    }
    ?>
    </div>
</section>
<!-- Shoping Cart Section End -->