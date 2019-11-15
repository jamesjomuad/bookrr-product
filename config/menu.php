<?php

return [
    'booking' => [
        'label' => 'Booking',
        'url' => Backend::url('bookrr/travelrr/booking'),
        'icon' => 'icon-book',
        'permissions' => ['bookrr.user.*'],
        'order' => 800,
        'sideMenu' => [
            'booking' => [
                'label'       => 'Bookings',
                'url'         => Backend::url('bookrr/travelrr/booking'),
                'icon'        => 'icon-book',
                'permissions' => ['bookrr.user.*'],
            ]
        ]
    ],
    'products' => [
        'label' => 'Products',
        'url' => Backend::url('bookrr/travelrr/products'),
        'icon' => 'icon-cube',
        'permissions' => ['bookrr.user.*'],
        'order' => 810,
        'sideMenu' => [
            'products' => [
                'label'       => 'Products',
                'url' => Backend::url('bookrr/travelrr/products'),
                'icon'        => 'icon-cube',
                'permissions' => ['bookrr.user.*'],
            ],
            'categories' => [
                'label'       => 'Category',
                'url'         => Backend::url('bookrr/travelrr/categories'),
                'icon'        => 'icon-tag',
                'permissions' => ['bookrr.user.*'],
            ],
            'orders' => [
                'label'       => 'Orders',
                'url'         => Backend::url('bookrr/travelrr/orders'),
                'icon'        => 'icon-cart-plus',
                'permissions' => ['bookrr.user.*'],
            ],
            'coupons' => [
                'label'       => 'Coupons',
                'url'         => Backend::url('bookrr/travelrr/coupons'),
                'icon'        => 'icon-tags',
                'permissions' => ['bookrr.user.*'],
            ]
        ]
    ]
];