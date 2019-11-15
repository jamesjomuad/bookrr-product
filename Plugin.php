<?php namespace Bookrr\Product;

use Backend;
use System\Classes\PluginBase;
use Event;


class Plugin extends PluginBase
{
    // public $require = ['Bookrr.Extra'];
 
    public function pluginDetails()
    {
        return [
            'name'        => 'Product',
            'description' => 'Product management system.',
            'author'      => 'bookrr',
            'icon'        => 'icon-leaf'
        ];
    }

    public function boot()
    {
        Event::listen('backend.page.beforeDisplay', function ($controller, $action, $params) {
            if(request()->is('backend') OR request()->is('backend/*'))
            {
                $controller->addCss('/plugins/bookrr/eventor/assets/css/fontawesome.min.css');  
            }
        });
    }

    public function registerComponents()
    {
        return [
            'Bookrr\Product\Components\Products' => 'products'
        ];
    }

    public function registerPermissions()
    {
        return [
            'bookrr.product.create' => [
                'tab' => 'Bookrr Products',
                'label' => 'Can create products.'
            ],
            'bookrr.product.update' => [
                'tab' => 'Bookrr Products',
                'label' => 'Can update products.'
            ],
            'bookrr.product.delete' => [
                'tab' => 'Bookrr Products',
                'label' => 'Can delete products.'
            ],
            'bookrr.category.create' => [
                'tab' => 'Bookrr Products',
                'label' => 'Can create category.'
            ],
            'bookrr.category.update' => [
                'tab' => 'Bookrr Products',
                'label' => 'Can update category.'
            ],
            'bookrr.category.delete' => [
                'tab' => 'Bookrr Products',
                'label' => 'Can delete category.'
            ],
            'bookrr.coupon.create' => [
                'tab' => 'Bookrr Products',
                'label' => 'Can create coupon.'
            ],
            'bookrr.coupon.update' => [
                'tab' => 'Bookrr Products',
                'label' => 'Can update coupon.'
            ],
            'bookrr.coupon.delete' => [
                'tab' => 'Bookrr Products',
                'label' => 'Can delete coupon.'
            ],
        ];
    }

    public function registerNavigation()
    {
        return [
            'product' => [
                'label'       => 'Products',
                'url'         => Backend::url('bookrr/product/products'),
                'icon'        => 'icon-cart-plus',
                'permissions' => ['bookrr.product.*'],
                'order'       => 500,
                'sideMenu' => [
                    'products' => [
                        'label'       => 'Products',
                        'url' => Backend::url('bookrr/product/products'),
                        'icon'        => 'icon-cube',
                        'permissions' => ['bookrr.product.*'],
                    ],
                    'category' => [
                        'label'       => 'Category',
                        'url'         => Backend::url('bookrr/product/category'),
                        'icon'        => 'icon-tag',
                        'permissions' => ['bookrr.category.*'],
                    ],
                    'coupons' => [
                        'label'       => 'Coupons',
                        'url'         => Backend::url('bookrr/product/coupons'),
                        'icon'        => 'icon-certificate',
                        'permissions' => ['bookrr.coupon.*'],
                    ]
                ]
            ],
        ];
    }
}
