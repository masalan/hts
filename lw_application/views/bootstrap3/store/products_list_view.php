<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * manage products view
 *
 * @package   JQuery PHP Store/Shop
 * @author    Vinod
 * @copyright Copyright (c) 2013, LivelyWorks. (http://livelyworks.net)
 * @link      http://livelyworks.net
 * @since     Version 1.1
 */
?>


<?php if(isset($product_query)):  foreach ($product_query as $row): ?>
<!--<div class="col-lg-4 col-md-6">-->

<!--    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 thumb thumb-image-view" style="background-color: red;">-->
        <div class="col-lg-4 col-md-6 thumb thumb-image-view">
        <div class="single-product border p-1" >
            <a href="<?php echo site_url('product/details/'.$row->id); ?>/<?php echo url_title($row->name, '-', true); ?>" target="_self"><img  src="<?php echo latestFile('uploads/thumb/'.$row->thumbnail); ?>" height="200" alt="<?php echo $row->name; ?>"></a>
            <div class="product-details" style="color: black;">
                <a href="<?php echo site_url('product/details/'.$row->id); ?>/<?php echo url_title($row->name, '-', true); ?>">
                    <bold><?php echo $row->name; ?></bold>
                </a>
                <div class="price">
                    <p><?php echo priceFormat($row->price); ?></p>
                </div>
                <div class="prd-bottom">

                    <a href="" class="social-info">
                        <span class="ti-bag"></span>
                        <p class="hover-text">Ajouter au panier</p>
                    </a>
                    <a href="" class="social-info">
                        <span class="lnr lnr-heart"></span>
                        <p class="hover-text">Favoris</p>
                    </a>
                    <a href="" class="social-info">
                        <span class="lnr lnr-sync"></span>
                        <p class="hover-text">Comparer</p>
                    </a>
                    <a href="<?php echo site_url('product/details/'.$row->id); ?>/<?php echo url_title($row->name, '-', true); ?>" class="social-info">
                        <span class="lnr lnr-move"></span>
                        <p class="hover-text">Voir plus</p>
                    </a>
                </div>
            </div>
        </div>
    </div>

<?php endforeach; else: ?>
    <div class="alert alert-info"><?php echo __('There are no products to show!!'); ?></div>
<?php endif; ?>


    <script>
        /*! Equal Heights */
        var currentTallest=0,currentRowStart=0,rowDivs=new Array(),$el,topPosition=0;$(".thumb-image-view").each(function(){$el=$(this);topPostion=$el.position().top;if(currentRowStart!=topPostion){for(currentDiv=0;currentDiv<rowDivs.length;currentDiv++){rowDivs[currentDiv].height(currentTallest)}rowDivs.length=0;currentRowStart=topPostion;currentTallest=$el.height();rowDivs.push($el)}else{rowDivs.push($el);currentTallest=(currentTallest<$el.height())?($el.height()):(currentTallest)}for(currentDiv=0;currentDiv<rowDivs.length;currentDiv++){rowDivs[currentDiv].height(currentTallest)}});
    </script>