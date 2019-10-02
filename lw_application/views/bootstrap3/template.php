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




  <?php $this->load->view($apply_theme.'/'.$header, $page_data); ?>


<body>

<header class="header_area sticky-header">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light main_box">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="<?php echo site_url(); ?>">
                    <img src="<?php echo latestFile('uploads/logo/'.$settings['logo']); ?>" alt="<?php echo $this->config->item('store_name'); ?>" width="50">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="index.php.html">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link" href="categories.php.html">Catégories</a></li>
                        <li class="nav-item"><a class="nav-link" href="categories.php.html#">HTS</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact.php.html">Contact</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="nav-item">
                            <a href="<?php echo site_url('shopping_cart'); ?>" class="cart"><span class="ti-bag"><?php echo $cartBtnMarkup; ?></span></a>
                        </li>
                        <?php if(!$this->tank_auth->is_logged_in()): ?>
                        <li class="nav-item">
                            <a   class="cart"  href="<?php echo site_url('auth/login'); ?>"><span class="ti-unlock"></span></a></li>
                        <?php endIf; ?>
                        <li class="nav-item">
                            <button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
                        </li>
                        <div class="sorting mr-auto">
                            <?php $availableLanguages = config_item('availableLanguages');
                            if($this->tank_auth->is_logged_in() OR (isset($availableLanguages) AND count($availableLanguages) > 1)): ?>
                                <ul class="nav navbar-nav navbar-right">

                                    <?php if(isset($availableLanguages) AND count($availableLanguages) > 1): ?>
                                        <li class="dropdown">
                                            <a href="#" id="drop2" role="button" class="dropdown-toggle" data-toggle="dropdown"><?php echo $availableLanguages[$current_store_lang]; ?> <b class="caret"></b></a>

                                            <ul class="dropdown-menu">
                                                <?php foreach($availableLanguages as $langRow => $langValue):
                                                    if($langValue == $availableLanguages[$current_store_lang]) continue;
                                                    ?>
                                                    <li><a href="<?php echo site_url($this->uri->uri_string().'?lang='.$langRow); ?>"><?php echo $langValue; ?></a></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </li>
                                    <?php endIf; ?>
                                </ul>
                            <?php endIf; ?>
                        </div>



                    </ul>
                </div>

            </div>
        </nav>
    </div>


</header>
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1 style="color: #000;">Page catégorie</h1>
                <nav style="color: #000;" class="d-flex align-items-center">
                    <a style="color: #000;" href="index.php.html">Accueil<span class="lnr lnr-arrow-right"></span></a>
                    <a style="color: #000;" href="categories.php.html#">boutique<span class="lnr lnr-arrow-right"></span></a>
                    <a style="color: #000;" href="category.php.html">Produit</a>
                </nav>
            </div>
        </div>
    </div>
</section>

<!----- Containt -------->
<div class="container">
    <div class="row">

        <?php $this->load->view($apply_theme.'/'.'template/sidebar', $page_data); ?>

        <div class="col-xl-9 col-lg-8 col-md-7">
            <!-- Start Filter Bar -->
            <div class="filter-bar d-flex flex-wrap align-items-center">


                <div class="sorting">
                    <select>
                        <option value="1">Tri par défaut</option>
                        <option value="1">Tri par défaut</option>
                        <option value="1">Tri par défaut</option>
                    </select>
                </div>
                <div class="sorting mr-auto">
                    <select>
                        <option value="1">Afficher 12</option>
                        <option value="1">Afficher 12</option>
                        <option value="1">Afficher 12</option>
                    </select>
                </div>

                <div class="pagination">
                    <?php //echo $this->pagination->create_links(); ?>
                </div>
            </div>
            <!-- End Filter Bar -->

            <!-- Tous les produits -->
            <section class="lattest-product-area pb-40 category-list">
                <div class="row">

                        <?php if(isset($page)): ?>
                            <?php $this->load->view($apply_theme.'/'.$page, $page_data); ?>
                        <?php endif; ?>

                </div>
            </section>

            <!-- End Best Seller -->
            <!-- Start Filter Bar -->
            <div class="filter-bar d-flex flex-wrap align-items-center">
                <!---
                <div class="sorting mr-auto">
                    <select>
                        <option value="1">Afficher 12</option>
                        <option value="1">Afficher 12</option>
                        <option value="1">Afficher 12</option>
                    </select>
                </div>
                --->
                <div class="pagination">
                    <?php //echo $this->pagination->create_links(); ?>
            </div>
            <!-- End Filter Bar -->
        </div>
    </div>
</div>
<!----- Meilleur vente -------->
  

    <?php $this->load->view($apply_theme.'/'.$best, $best_seller); ?>
    <?php $this->load->view($apply_theme.'/'.$footer, $page_data); ?>