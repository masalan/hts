<?php defined('BASEPATH') OR exit('No direct script access allowed');

$this->output->set_content_type('text/html', 'utf-8');
$store_settings = storeConfigItem();
$settings = ($store_settings['settings']);
$categories = ($store_settings['categories']);
$page_data['settings'] = $settings;
$page_data['categories'] = $categories;

$current_store_lang = $this->session->userdata('current_store_lang');
$current_store_lang = isset($current_store_lang) ? $current_store_lang : config_item('default_language');

$glo_total = $this->cart->total();
$glo_total_items = $this->cart->total_items();

$topButtomArray = array(
  '%total_items%' => $glo_total_items,
  '%item_select%' => ($glo_total_items == 1) ? __('item') : __('items'),
  '%glo_total%' => priceFormat($glo_total, true),
  );
$cartBtnMarkup = __('<strong> %total_items%</strong> ').' <i class="glyphicon glyphicon-shopping-cart"></i>';
//$cartBtnMarkup = __('<strong>%total_items%</strong> %item_select% of <strong>%glo_total%</strong> in your').' <i class="glyphicon glyphicon-shopping-cart"></i>';
$cartBtnMarkup =  strtr($cartBtnMarkup, $topButtomArray);
$currentThemeName = 'bootstrap3/'
?>

<!DOCTYPE html>
<html lang="<?php echo substr($current_store_lang, 0, 2); ?>">
  <head>
    <meta charset="utf-8">
    <title><?php echo $settings['store_name']; ?> <?php if(isset($page_title)) echo ' - '. $page_title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
 <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="<?php echo latestFile('assets/'.$currentThemeName.'js/html5shiv.min.js'); ?>"></script>
      <script src="<?php echo latestFile('assets/'.$currentThemeName.'js/respond.min.js'); ?>"></script>
    <![endif]-->

   <!-- CSS -->

      <!-- CSS -->
      <link rel="stylesheet" href="<?php //echo latestFile('assets/'.$currentThemeName.'bootstrap-3.4.1/css/bootstrap.min.css'); ?>" type="text/css">
      <link rel="stylesheet" href="<?php echo latestFile('assets/'.$currentThemeName.'css/custom.css'); ?>" type="text/css">
      <link rel="stylesheet" href="<?php //echo latestFile('assets/css/footable.core.min.css'); ?>" type="text/css">
      <?php 	if(isset($insertCSS)):
          $insertCSS = array_filter($insertCSS);
          foreach($insertCSS as $eachCSS): ?>
              <link href="<?php echo latestFile('assets/css/'.$eachCSS.'.css'); ?>" rel="stylesheet">
          <?php 	endforeach;	endif; ?>



      <link rel="stylesheet" href="<?php echo latestFile('assets/'.$currentThemeName.'bootstrap-3.4.1/'); ?>css/linearicons.css">
      <link rel="stylesheet" href="<?php echo latestFile('assets/'.$currentThemeName.'bootstrap-3.4.1/'); ?>css/font-awesome.min.css">
      <link rel="stylesheet" href="<?php echo latestFile('assets/'.$currentThemeName.'bootstrap-3.4.1/'); ?>css/themify-icons.css">
      <link rel="stylesheet" href="<?php echo latestFile('assets/'.$currentThemeName.'bootstrap-3.4.1/'); ?>css/bootstrap.css">
      <link rel="stylesheet" href="<?php echo latestFile('assets/'.$currentThemeName.'bootstrap-3.4.1/'); ?>css/owl.carousel.css">
      <link rel="stylesheet" href="<?php echo latestFile('assets/'.$currentThemeName.'bootstrap-3.4.1/'); ?>css/nice-select.css">
      <link rel="stylesheet" href="<?php echo latestFile('assets/'.$currentThemeName.'bootstrap-3.4.1/'); ?>css/nouislider.min.css">
      <link rel="stylesheet" href="<?php echo latestFile('assets/'.$currentThemeName.'bootstrap-3.4.1/'); ?>css/ion.rangeSlider.css" />
      <link rel="stylesheet" href="<?php echo latestFile('assets/'.$currentThemeName.'bootstrap-3.4.1/'); ?>css/ion.rangeSlider.skinFlat.css" />
      <link rel="stylesheet" href="<?php echo latestFile('assets/'.$currentThemeName.'bootstrap-3.4.1/'); ?>css/magnific-popup.css">
      <link rel="stylesheet" href="<?php echo latestFile('assets/'.$currentThemeName.'bootstrap-3.4.1/'); ?>css/main.css">


    <!-- Fav and touch icons -->
    <link rel="shortcut icon" href="<?php echo latestFile('assets/ico/favicon.png'); ?>">
    <style type="text/css" id="modalModifiedStyle"></style>
     <script src="<?php echo latestFile('assets/js/jquery-1.11.1.min.js'); ?>" type="text/javascript" charset="utf-8"></script>


      <style type="text/css">
          body {
              background-color: white;
          }
          #Parcourir {
              background-color:#5d9cd3;
              padding-top: 20px;
              height:55px;
              text-align: center;
              -webkit-border-radius: 5px;
              -moz-border-radius: 5px;
              border-radius: 5px;
          }
          #Parcourir h4,h3,h2,h1,h5,h6 {
              color: white;
          }
      </style>

  </head>