<footer class="footer_widgets">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-7 col-md-7 col-sm-7">
                            <div class="widgets_container contact_us">
                                <!-- <div class="footer_logo">
                                       <a href="index.html"><img style="height: 100px;" src="./views/assets/img/logo/logo_computer.png" alt="Ảnh lgo"></a>
                                   </div> -->
                                <div class="footer_desc">
                                    <p>Chúng tôi là một nhóm gồm các nhà thiết kế và phát triển tạo ra Mẫu HTML, Woocommerce, Shopify Theme chất lượng cao.</p>
                                </div>

                                <p><span>Address:</span>FPT Polytechnic Trịnh Văn Bô</p>
                                <p><span>Email:</span> <a target="_blank" href="https://hasthemes.com/contact-us/">baotheha@gmail.com</a></p>
                                <p><span>Phone:</span> <a href="#">0377887668</a></p>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5">
                            <div class="widgets_container widget_menu">
                                <h3>Dịch vụ</h3>
                                <div class="footer_menu">
                                    <ul>

                                        <li><a href="about.html">Về chúng tôi</a></li>
                                        <li><a href="#">Thông tin giao hàng</a></li>
                                        <li><a href="#">Chính sách bảo mật</a></li>
                                        <li><a href="#">Điều khoản và chính sách</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="widgets_container widget_menu">
                                <h3>Tài khoản</h3>
                                <div class="footer_menu">
                                    <ul>
                                        <li><a href="my-account.html">Tài Khoản</a></li>
                                        <li><a href="#">lịch sử đơn hàng</a></li>

                                        <li><a href="#">Trả lại </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            <div class="widgets_container widget_menu">
                                <h3>Đăng kí</h3>
                                <div class="subscribe_form">
                                    <form id="mc-form" class="mc-form footer-newsletter">
                                        <input id="mc-email" type="email" autocomplete="off" placeholder="Emali của bạn .." />
                                        <button id="mc-submit"><i class="zmdi zmdi-email-open"></i></button>
                                    </form>
                                    <!-- mailchimp-alerts Start -->
                                    <div class="mailchimp-alerts text-centre">
                                        <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                                        <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                                        <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                                    </div><!-- mailchimp-alerts end -->
                                </div>
                                <div class="footer_social">
                                    <h3>Theo dõi</h3>
                                    <ul>
                                        <li><a href="#"><i class="zmdi zmdi-facebook"></i></a></li>
                                        <li><a href="#"><i class="zmdi zmdi-twitter"></i></a></li>
                                        <li><a href="#"><i class="zmdi zmdi-rss"></i></a></li>
                                        <li><a href="#"><i class="zmdi zmdi-youtube-play"></i></a></li>
                                        <li><a href="#"><i class="zmdi zmdi-google-old"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--footer area end-->

<!-- modal area start-->
<!-- modal area end-->

<!--news letter popup start-->


<!-- JS
============================================ -->
<!--jquery min js-->
<script src="./views/assets/js/vendor/jquery-3.4.1.min.js"></script>
<!--popper min js-->
<script src="./views/assets/js/popper.js"></script>
<!--bootstrap min js-->
<script src="./views/assets/js/bootstrap.min.js"></script>
<!--owl carousel min js-->
<script src="./views/assets/js/owl.carousel.min.js"></script>
<!--slick min js-->
<script src="./views/assets/js/slick.min.js"></script>
<!--magnific popup min js-->
<script src="./views/assets/js/jquery.magnific-popup.min.js"></script>
<!--counterup min js-->
<script src="./views/assets/js/jquery.counterup.min.js"></script>
<!--jquery countdown min js-->
<script src="./views/assets/js/jquery.countdown.js"></script>
<!--jquery ui min js-->
<script src="./views/assets/js/jquery.ui.js"></script>
<!--jquery elevatezoom min js-->
<script src="./views/assets/js/jquery.elevatezoom.js"></script>
<!--isotope packaged min js-->
<script src="./views/assets/js/isotope.pkgd.min.js"></script>
<!--slinky menu js-->
<script src="./views/assets/js/slinky.menu.js"></script>
<!-- Plugins JS -->
<script src="./views/assets/js/plugins.js"></script>

<!-- Main JS -->
<script src="./views/assets/js/main.js"></script>


<script>
    const ipnElement = document.querySelector('#ipnPassword')
    const btnElement = document.querySelector('#btnPassword')

    // step 2
    btnElement.addEventListener('click', function() {
        // step 3
        const currentType = ipnElement.getAttribute('type')
        // step 4
        ipnElement.setAttribute(
            'type',
            currentType === 'password' ? 'text' : 'password'
        )
    })
</script>
</body>


<!-- Mirrored from htmldemo.net/presiden/presiden/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Nov 2023 14:48:28 GMT -->

</html>