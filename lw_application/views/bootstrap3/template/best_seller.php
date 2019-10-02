<section class="related-product-area mt-5 section_gap_bottom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h1 style="color: black;">Ventes de la semaine</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                        magna aliqua.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-9">
                <div class="row">
                    <?php if(isset($best_seller)):  foreach ($best_seller as $best): ?>
                    <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                        <div class="single-related-product d-flex">
                            <a href="<?php echo site_url('product/details/'.$best->id); ?>/<?php echo url_title($best->name, '-', true); ?>"><img src="<?php echo latestFile('uploads/thumb/'.$best->thumbnail); ?>" height="80" width="80" class="img-rounded" alt="<?php echo $best->name; ?>"></a>
                            <div class="desc">
                                <a href="<?php echo site_url('product/details/'.$best->id); ?>/<?php echo url_title($best->name, '-', true); ?>" style="font-size: 11px" class="title"><?php echo $best->name; ?></a>
                                <div class="price">
                                    <h6 style="color: black;"><?php echo priceFormat($best->price); ?></h6>
                                    <h6 class="l-through"><?php echo priceFormat($best->price); ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; else: ?>
                        <div class="alert alert-info"><?php echo __('There are no products to show!!'); ?></div>
                    <?php endif; ?>


                    <!---
                    <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                        <div class="single-related-product d-flex">
                            <a href="categories.php.html#"><img src="img/r1.jpg" alt=""></a>
                            <div class="desc">
                                <a href="categories.php.html#" class="title">Black lace Heels</a>
                                <div class="price">
                                    <h6>$189.00</h6>
                                    <h6 class="l-through">50 000 Fcfa</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    ---->


                </div>
            </div>
            <div class="col-lg-3">
                <div class="ctg-right">
                    <a href="#" target="_blank">
                        <img class="img-fluid d-block mx-auto" src="<?php echo base_url();?>img/category/c5.jpg" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
