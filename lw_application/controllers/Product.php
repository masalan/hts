<?php 

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
/**
 * Contrôleur de produits de magasin
 */

class Product extends Base_Controller
{
    /**
         * Constructor
         *
         * @return void
    */
    function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->library('tank_auth');
    }

    /**
         * Index action
         *
         * @return void
    */
    function index()
    {
        $this->category();
    }

    /**
         * List of all products based on the category
         *
         * @param number $cat_id category id     
         *    
         * @return void
    */
    function category($cat_id = null, $catName = null)
    {
        parse_str($_SERVER['QUERY_STRING'], $_GET);

        $sortBy = $inSortBy =  trim(strip_tags($this->input->get('sortBy', true)));
        $sort = trim(strip_tags($this->input->get('sort', true)));
        $urlSegment = trim(strip_tags($this->input->get('per_page', true)));

        if (!$sortBy OR !$sort) {
            $sortBy = 'name';
            $sort = 'ASC';
        }

        $sortArray = array('name', 'description','price');

        $addtionalUrl = $cat_id ? $cat_id : '';
        $addtionalUrl = $addtionalUrl
                        . '/'.($catName ? url_title($catName,'-',true) : '');

        $config['base_url'] = site_url('product/category/'.$addtionalUrl.'?');

        $data['sort_type'] = "desc";
        $data['my_segment_url'] = $config['base_url'];
        
        if ($sortBy AND $sort) {
            $config['base_url'] = site_url('product/category/'.$addtionalUrl.'?')
            .'sortBy='.$inSortBy.'&sort='.$sort;
        }
        
        if (!in_array($sortBy, $sortArray)) {
            $sortBy = 'name';
        }
            
        $data['my_base_url'] = $config['base_url'];

        if ($sort == "desc") {
            $data['sort_type'] = "asc";
        }

        //load pagination library
        $this->load->library('pagination');

        $this->load->model('products_model');

         $data['currentCategory'] = 0;

        if ($cat_id != null) {
            $where_array = array(
                "category" => $cat_id
            );

            $data['currentCategory'] = $cat_id;
        }

        $allRowsCount = $this->products_model->countAll(
            isset($where_array) ? $where_array : null
        );
        
        $this->load->helper('text');

        // Pagination configuration
        $config['page_query_string']    = true;
        $config['total_rows']           = $allRowsCount;
        $config['per_page']             = config_item('pagination_items_per_page');

        $this->pagination->initialize($config);
     
        //fixe limite & offset
        $options = array(
            'limit'         =>  $config['per_page'], 
            'offset'        =>  $urlSegment, 
            'order_by'      =>  $sortBy, 
            'order_type'    =>  $sort
        );

        $data['page_title'] = __('All Products');

        $store_settings     = storeConfigItem('store_settings');

        $categories         = ($store_settings['categories']);
        $data['settings']   = ($store_settings['settings']);
        $categories_array   = array();
        
        if (isset($categories)) {
            foreach ($categories as $row) {
                $categories_array[$row->id] = $row->name;
            }
        }

        $data['categories_array'] = $categories_array;      

        if ($cat_id != null and isset($categories_array[$cat_id])) {
            $options['where'] = $where_array;
            $data['page_title'] = sprintf(
                __('Products from %s'),
                $categories_array[$cat_id]
            );
        }

        $product_query = $this->products_model->fetchAll(false, $options);

        $best_seller = $this->products_model->fetchAll_best();
        $data['best_seller'] = $best_seller;
        $data['best'] = 'template/best_seller';

        $data['product_query'] = $product_query;
        $data['header'] = 'template/header';  /*** Header ****/
        $data['page'] = 'store/products_list_view';
        $data['footer'] = 'template/footer';  /*** footer ****/

        //$data['pages'] = 'store/best_seller';
        $data['insertScripts'] = array(  'js_ajax_details' );
        loadView($data);
    }

    /**
         * Afficher les détails du produit 
         *
         * @param number $product_id Product id     
         *    
         * @return void
    */
    function details($product_id = null, $productName = null)
    {

        if (!$product_id) {
            $this->showErrorMsg(__('Product id missing!!'));
            exit();
        }

        $this->load->model('products_model');

        $product_query = $this->products_model->fetch($product_id, true);

        if (!$product_query) {
            $this->showErrorMsg();
            exit();
        }

        $arrayName = $product_query[0];

        $data['query'] = array(
                "name" => $arrayName['name'],
                "id" => $arrayName['id'],
                "product_id" => $arrayName['product_id'],
                "category" => $arrayName['category'],
                "description" => $arrayName['description'],
                "price" => $arrayName['price'],
            );

            
        if ($arrayName['sizes']) {
            $sizes_option = explode(',', $arrayName['sizes']);

            if (is_array($sizes_option)) {
                $sizes_options_available = array();
                
                foreach ($sizes_option as $size_option) {
                    $sizes_options_available[$size_option] = $size_option;
                }
                $data['query']['sizes_option'] = $sizes_options_available;
            }

        }

        if ($arrayName['colors']) {
            $colors_option = explode(',', $arrayName['colors']);

            if (is_array($colors_option)) {
                $colors_options_available = array();

                foreach ($colors_option as $color_option) {
                    $colors_options_available[$color_option] = $color_option;
                }
                $data['query']['colors_option'] = $colors_options_available;
            }
            
        }

        $this->load->helper('form');

        $data['page_title'] = $data['query']['name'];
        $best_seller = $this->products_model->fetchAll_best();
        $best_seller = $this->products_model->fetchAll_best();
        $data['best_seller'] = $best_seller;
        $data['best'] = 'template/best_seller';

        
        $data['best_seller'] = $best_seller;
        $data['header'] = 'template/header';  /*** Header ****/
        $data['page'] = 'store/product_details_view';
        $data['footer'] = 'template/footer';  /*** footer ****/

        $store_settings = storeConfigItem('store_settings');
        $categories = ($store_settings['categories']);
        $categories_array = array();

        foreach ($categories as $row) {
            $categories_array[$row->id] = $row->name;
        }

        $data['categories_array'] = $categories_array;

        $data['qty_in_cart'] = $this->checkOldQty(
            $product_id, 
            isset($sizes_option[0]) ? $sizes_option[0] : null,
            isset($colors_option[0]) ? $colors_option[0] : null,
            true
        );

        loadView($data);
    }

    /**
         * Recherche produit
         *
         * @return void
    */
    function search()
    {

        parse_str($_SERVER['QUERY_STRING'], $_GET);

        $sortBy = $inSortBy =  trim(strip_tags($this->input->get('sortBy', true)));
        $sort = trim(strip_tags($this->input->get('sort', true)));
        $urlSegment = trim(strip_tags($this->input->get('per_page', true)));
        $search_term = trim(strip_tags($this->input->get('search_query', true)));

        $data['last_search_query'] = $search_term;

        if (!$sortBy OR !$sort) {
            $sortBy     = 'name';
            $sort       = 'DESC';
        }

        $sortArray = array('name', 'description');

        $addtionalUrl = '';
        $config['base_url'] = site_url('product/search/'.$addtionalUrl.'?')
            .'search_query='.$search_term;

        $data['sort_type'] = "desc";
        $data['my_segment_url'] = $config['base_url'];
        
        if ($sortBy AND $sort) {
            $config['base_url'] = site_url('product/search/'.$addtionalUrl.'?')
                .'search_query='.$search_term.'&sortBy='.$inSortBy.'&sort='.$sort;
        }
        
        if (!in_array($sortBy, $sortArray)) {
            $sortBy = 'name';
        }

        $data['my_base_url'] = $config['base_url'];

        if ($sort == "desc") {
            $data['sort_type'] = "asc";
        }       

        //load pagination library
        $this->load->library('pagination');

        $this->load->model('products_model');

        $allRowsCount = $this->products_model->countSearchResult($search_term);
            
        $this->load->helper('text');

        // Pagination config
        $config['page_query_string'] = true;
        $config['total_rows'] = $allRowsCount;
        $config['per_page'] = config_item('pagination_items_per_page');

        $this->pagination->initialize($config); 
        
        //set limit & offset
        $options = array(
            'limit' =>  $config['per_page'], 
            'offset' =>  $urlSegment, 
            'orderBy' =>  $sortBy, 
            'orderType' =>  $sort
        );

        $data['page_title'] = __('Search Result');

        $store_settings = storeConfigItem('store_settings');

        $categories = ($store_settings['categories']);
        $data['settings'] = ($store_settings['settings']);
        $categories_array = array();

        foreach ($categories as $row) {
            $categories_array[$row->id] = $row->name;
        }

        $data['categories_array'] = $categories_array;      

        $product_query = $this->products_model->fetchSearchResult(
            $search_term, $options
        );
        
        $data['product_query'] = $product_query;

        $data['page'] = 'store/products_list_view';

        $data['insertScripts'] = array(
                'js_ajax_details'
            );

        loadView($data);
    }

    /**
         * Définir les erreurs en JSON
         *
         * @param string $error_msg Error Message    
         *    
         * @return void
    */
    function showErrorMsg($error_msg = null)
    {
        if ($error_msg == null) {
            $error_msg = __('product not found');
        }
        echo json_encode(array('error' =>  $error_msg));
    }

    /**
         * Vérifier l'ancienne quantité du produit
         *
         * @param number  $product_id    Produit Id 
         * @param string  $sizes_option  taille options 
         * @param string  $colors_option Couleur Options   
         * @param boolean $ignore_ajax   Ignorer Ajax request or not                             
         *  
         * @return void
    */
    function checkOldQty($product_id = null, $product_size = null, 
        $product_color = null, $ignore_ajax = false
    ) {

        if (!$product_id) {
            return false;
        }

        $productPostData = $this->input->post();

        //Check product if in cart
        $cartData = $this->cart->contents();

        if(!empty($productPostData)) {
            $product_size = $this->input->post('size');
            $product_color = $this->input->post('color');
        }


        if ($product_size == 'notAvailable') {
            $product_size = null;
        }

        if ($product_color == 'notAvailable') {
            $product_color = null;
        }

        foreach ($cartData as $cartRow) {
        if ($cartRow['id'] == $product_id) {
            if ($this->cart->has_options($cartRow['rowid'])) {
               if ($cartRow['options']['size'] == $product_size and $cartRow['options']['color'] == $product_color) {
                    if ($this->input->is_ajax_request() and $ignore_ajax == false) {
                            echo json_encode($cartRow);
                            return true;
                         }
                        return $cartRow['qty'];
                        break;
                    }
                }

            }                  
        }

        if ($this->input->is_ajax_request() AND $ignore_ajax == false) {
            echo json_encode(array("qty" => 0));
        }

        return 0;
    }

}

/* End of file product.php */
/* Location: ./lw_application/controllers/product.php */