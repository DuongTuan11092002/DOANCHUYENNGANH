 <!-- Footer Section Begin -->
 <footer class="footer spad">
     <div class="container">
         <div class="row">
             <div class="col-lg-4 col-md-6 col-sm-6">
                 <div class="footer__about">
                     <div class="footer__about__logo">
                         <h1 class="text-uppercase  ">F8-Car</h1>
                     </div>
                     <ul>
                         <li>Địa chỉ: Châu thành , Trà Vinh</li>
                         <li>Số điện thoại: +84 364202648</li>
                         <li>Email: Kim884740@gmail.com</li>
                     </ul>
                 </div>
             </div>
             <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                 <div class="footer__widget">
                     <h6>Chính sánh và điều khoản</h6>
                     <ul>
                         <li><a href="#">về chúng tôi</a></li>
                         <li><a href="#">Chính sách</a></li>

                     </ul>
                     <ul>

                         <li><a href="#">Dự án</a></li>
                         <li><a href="#">Liên hệ</a></li>

                     </ul>
                 </div>
             </div>

         </div>
         <div class="row">
             <div class="col-lg-12">
                 <div class="footer__copyright">
                     <div class="footer__copyright__text">
                         <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                             Copyright &copy;<script>
                                 document.write(new Date().getFullYear());
                             </script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                             <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                     </div>
                     <div class="footer__copyright__payment"><img src="img/payment-item.png" alt=""></div>
                 </div>
             </div>
         </div>
     </div>
 </footer>
 <!-- Footer Section End -->

 <!-- Js Plugins -->
 <script src="<?php echo base_url('frontend/js/jquery-3.3.1.min.js') ?>"></script>
 <script src="<?php echo base_url('frontend/js/bootstrap.min.js') ?>"></script>
 <script src="<?php echo base_url('frontend/js/jquery.nice-select.min.js') ?>"></script>
 <script src="<?php echo base_url('frontend/js/jquery-ui.min.js') ?>"></script>
 <script src="<?php echo base_url('frontend/js/jquery.slicknav.js') ?>"></script>
 <script src="<?php echo base_url('frontend/js/mixitup.min.js') ?>"></script>
 <script src="<?php echo base_url('frontend/js/owl.carousel.min.js') ?>"></script>
 <script src="<?php echo base_url('frontend/js/main.js') ?>"></script>
 <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

 <!-- lọc sản phẩm js  -->
 <script>
     $(document).ready(function() {
         var active = location.search; //?kytu=asc
         $('#select-filter option[value="' + active + '"]').attr('selected', 'selected');
     })
     $('.select-filter').change(function() {
         var value = $(this).find(':selected').val();

         //  alert(value);

         if (value != 0) {
             var url = value;
             window.location.replace(url);
         } else {
             alert('Vui lòng chọn phần lọc sản phẩm bạn muốn');

         }

     })
 </script>


 <!-- lọc theo thanh giá  -->
 <script>
     $('.price_from').val(<?php echo $min_price ?>);
     $('.price_to').val(<?php echo $max_price  ?>);
     $(function() {
         $("#slider-range").slider({
             range: true,
             min: <?php echo $min_price ?>,
             max: <?php echo $max_price ?>,
             values: [<?php echo $min_price ?>, <?php echo $max_price ?>],
             slide: function(event, ui) {
                 $("#amount").val("đ" + addPlus(ui.values[0]).toString() + " - đ" + addPlus(ui.values[1]));
                 $('.price_from').val(ui.values[0]);
                 $('.price_to').val(ui.values[1]);
             }

         });
         $("#amount").val("đ" + addPlus($("#slider-range").slider("values", 0)) +
             " - đ" + addPlus($("#slider-range").slider("values", 1)));
     });

     function addPlus(nStr) {
         nStr += '';
         x = nStr.split('.');
         x1 = x[0];
         x2 = x.length > 1 ? '.' + x[1] : '';
         var rgx = /(\d+)(\d{3})/;
         while (rgx.test(x1)) {
             x1 = x1.replace(rgx, '$1' + '.' + '$2');
         }
         return x1 + x2;
     }
 </script>

 <script>
     function showVerificationMessage() {
         alert("sau khi đăng ký bạn hãy kiểm tra email để xác thực tài khoản nhé!.");
     }
 </script>


 </body>

 </html>