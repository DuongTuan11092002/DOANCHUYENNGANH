<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to Car Shop</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="<?php echo base_url('frontend/css/bootstrap.min.css') ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('frontend/css/font-awesome.min.css') ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('frontend/css/elegant-icons.css') ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('frontend/css/nice-select.css') ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('frontend/css/jquery-ui.min.css') ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('frontend/css/owl.carousel.min.css') ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('frontend/css/slicknav.min.css') ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('frontend/css/style.css') ?>" type="text/css">
<style>
    .divider:after,
    .divider:before {
    content: "";
    flex: 1;
    height: 1px;
    background: #eee;
    }
    .h-custom {
    height: calc(100% - 73px);
    }
    @media (max-width: 450px) {
    .h-custom {
    height: 100%;
    }
    }

</style>
</head>

<body>

    
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>


    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> Kim884740@gmail.com</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                    
                            <?php
                                if($this->session->userdata('loggedInCustomer')) {
                            ?>
                            <div class="header__top__right__auth">
                                <a href="<?php echo base_url('dang-xuat') ?>"><i class="fa fa-user"> <?php echo $this->session->userdata('loggedInCustomer')['fullname']  ?> </i> Đăng xuất</a>
                            </div>

                            <?php
                                }else{
                            ?>

                            <div class="header__top__right__auth">
                                <a href="<?php echo base_url('dang-nhap') ?>"><i class="fa fa-user"></i> Đăng nhập</a>
                            </div>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="<?php echo base_url('/') ?>"><img src="<?php echo base_url('frontend/img/logo.png') ?>" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu text-uppercase">
                        <ul>
                            <li class="active"><a href="<?php base_url('/') ?>">Trang chủ</a></li>
                            <!-- <li><a href="./shop-grid.html">Shop</a></li> -->
                            <li><a href="#">Cửa hàng</a>        
                                <ul class="header__menu__dropdown">
                                    <?php 
                                        foreach ($Category as $key => $cate) {
                                    ?>
                                    <li><a href="<?php echo base_url('danh-muc/'.$cate -> categoriesID)  ?>"><?php echo $cate -> categoriesName ?></a></li>
                                   <?php
                                        }
                                   ?>
                                </ul>
                            </li>
                            <li><a href="./blog.html">Blog</a></li>
                            <li><a href="./contact.html">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <?php
                            if($this->session->userdata('loggedInCustomer')) {
                            ?>
                            <li><a href="<?php echo base_url('kiem-tra-thanh-toan')?>"><i class="fa fa-money"> checkout</i></a></li>
                            <?php
                            }
                            ?>
                            <li><a href="<?php echo base_url('gio-hang') ?>"><i class="fa fa-shopping-bag"> cart</i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->
