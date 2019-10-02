<footer class="footer-area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-3  col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>A propos</h6>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore
                        magna aliqua.
                    </p>
                </div>
            </div>
            <div class="col-lg-4  col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>Newsletter</h6>
                    <p>Restez informé de nos nouveautés</p>
                    <div class="" id="mc_embed_signup">

                        <form target="_blank" novalidate="true" action="h"
                              method="get" class="form-inline">

                            <div class="d-flex flex-row">

                                <input class="form-control" name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '"
                                       required="" type="email">


                                <button class="click-btn btn btn-default"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
                                <div style="position: absolute; left: -5000px;">
                                    <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                                </div>

                                <!-- <div class="col-lg-4 col-md-4">
                                            <button class="bb-btn btn"><span class="lnr lnr-arrow-right"></span></button>
                                        </div>  -->
                            </div>
                            <div class="info"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3  col-md-6 col-sm-6">
                <div class="single-footer-widget mail-chimp">
                    <h6 class="mb-20">Instragram Feed</h6>
                    <ul class="instafeed d-flex flex-wrap">
                        <li><img class="rounded" src="<?php echo base_url() ;?>img/i1.jpg" alt=""></li>
                        <li><img class="rounded"  src="<?php echo base_url() ;?>img/i2.jpg" alt=""></li>
                        <li><img class="rounded"  src="<?php echo base_url() ;?>img/i3.jpg" alt=""></li>
                        <li><img class="rounded"  src="<?php echo base_url() ;?>img/i4.jpg" alt=""></li>
                        <li><img class="rounded"  src="<?php echo base_url() ;?>img/i5.jpg" alt=""></li>
                        <li><img class="rounded"  src="<?php echo base_url() ;?>img/i6.jpg" alt=""></li>
                        <li><img class="rounded"  src="<?php echo base_url() ;?>img/i7.jpg" alt=""></li>
                        <li><img class="rounded"  src="<?php echo base_url() ;?>img/i8.jpg" alt=""></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>Suivez nous</h6>
                    <p>Let us be social</p>
                    <div class="footer-social d-flex align-items-center">
                        <a href="categories.php.html#"><i class="fa fa-facebook"></i></a>
                        <a href="categories.php.html#"><i class="fa fa-twitter"></i></a>
                        <a href="categories.php.html#"><i class="fa fa-dribbble"></i></a>
                        <a href="categories.php.html#"><i class="fa fa-behance"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
            <p class="footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright © 2019 HTS Inc. Tous droits réservés | Cree par FontecSys
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
        </div>
    </div>
</footer>




<script src="<?php echo latestFile('assets/'.$currentThemeName.'bootstrap-3.4.1/'); ?>js/vendor/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
            crossorigin="anonymous"></script>
    <script src="<?php //echo latestFile('assets/'.$currentThemeName.'bootstrap-3.4.1/'); ?>js/vendor/bootstrap.min.js"></script>
    <script src="<?php echo latestFile('assets/'.$currentThemeName.'bootstrap-3.4.1/'); ?>js/jquery.ajaxchimp.min.js"></script>
    <script src="<?php echo latestFile('assets/'.$currentThemeName.'bootstrap-3.4.1/'); ?>js/jquery.nice-select.min.js"></script>
    <script src="<?php echo latestFile('assets/'.$currentThemeName.'bootstrap-3.4.1/'); ?>js/jquery.sticky.js"></script>
    <script src="<?php echo latestFile('assets/'.$currentThemeName.'bootstrap-3.4.1/'); ?>js/nouislider.min.js"></script>
    <script src="<?php echo latestFile('assets/'.$currentThemeName.'bootstrap-3.4.1/'); ?>js/countdown.js"></script>
    <script src="<?php echo latestFile('assets/'.$currentThemeName.'bootstrap-3.4.1/'); ?>js/jquery.magnific-popup.min.js"></script>
    <script src="<?php //echo latestFile('assets/'.$currentThemeName.'bootstrap-3.4.1/'); ?>js/owl.carousel.min.js"></script>
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="<?php echo latestFile('assets/'.$currentThemeName.'bootstrap-3.4.1/'); ?>js/gmaps.min.js"></script>
    <script src="<?php echo latestFile('assets/'.$currentThemeName.'bootstrap-3.4.1/'); ?>js/main.js"></script>
    <script type="text/javascript">
        $('#owl-carousel').owlCarousel({
            items:1,
            loop:true,
            margin:10,
            autoplay:true,
            autoplayTimeout:1500,
            autoplayHoverPause:true
        });
    </script>

    <script src="<?php echo latestFile('assets/js/footable.min.js'); ?>" type="text/javascript"></script>
    <?php $this->load->view($apply_theme.'/'.'template/js_scripts');  ?>




    <script src="<?php echo latestFile('assets/js/footable.min.js'); ?>" type="text/javascript"></script>
    <?php $this->load->view($apply_theme.'/'.'template/js_scripts');  ?>
    <script type="text/javascript">
        $(document).ready(function($) {
            $(window).on('resize', onResizeWindow);

            $('.warning-msg .alert').addClass('alert-warning');

            function onResizeWindow(){
                var modalModifiedStyle = '.modal-body{max-height:'+($(window).height() * 0.35)+'px;}';
                $('#modalModifiedStyle').html(modalModifiedStyle);
            }

            onResizeWindow();

            $('#shopping-cart-btn, .shopping-cart-btn').on('click', function(e){
                e.preventDefault();

                $('#cartModal').modal('show');

                var $this = $(this),
                    $cartModal = $('#cartContent'),
                    requestURL = $this.attr('href');
                $cartModal.html('<div style="padding:10%; text-align:center;">  <img src="<?php echo base_url("assets/img/ajax-loader.gif"); ?>"></br> <?php echo __("Loading..."); ?></div>');
                $.post(requestURL, function(data){
                    $cartModal.html(data.page_data);
                },'JSON');
            });

        });
    </script>

  </body>
</html>