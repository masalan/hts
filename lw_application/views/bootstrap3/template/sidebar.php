<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

?>

<div class="col-xl-3 col-lg-4 col-md-5">
    <div class="panel panel-default">
        <div class="panel-heading" id="Parcourir"> <h5>Parcourir les catégories</h5></div>
        <div class="list-group">
            <a class="list-group-item <?php echo (isset($currentCategory) and ($currentCategory == 0)) ? 'active' : ''; ?>" href="<?php echo site_url('product/'); ?>"><?php echo __('All Products'); ?> <i class="glyphicon glyphicon-arrow-right pull-right"></i></a>
            <?php if(isset($categories)): foreach($categories as $row): ?>
                <a class="list-group-item <?php echo (!empty($currentCategory) and ($currentCategory == $row->id)) ? 'active' : ''; ?>" href="<?php echo site_url('product/category/'.$row->id.'/'.url_title($row->name,"-",true)); ?>"><?php echo $row->name; ?> <i class="glyphicon glyphicon-arrow-right pull-right"></i></a>
            <?php endforeach; endIf; ?>
        </div>

    </div>


</div>





















