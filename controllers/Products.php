<?php namespace Bookrr\Product\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Bookrr\Product\Models\Products as Model;

/**
 * Products Back-end Controller
 */
class Products extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Bookrr.Product', 'product', 'products');

        $this->addJs('/plugins/bookrr/product/assets/js/product.js');
    }

    public function onPublish()
    {
        $products = Model::whereIn('id',input('checked'));

        $products->update(['status' => 1]);

        return $this->listRefresh();
    }

    public function onUnpublish()
    {
        $products = Model::whereIn('id',input('checked'));

        $products->update(['status' => 0]);
        
        return $this->listRefresh();
    }
}
