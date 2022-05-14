<?php

return [
    [
        'name' => 'Quản lý danh mục',
        'icon' => 'fa fa-list',
        'route' => 'admin.pages.danhmuc.index',
        'children' => [
            [
                'name' => 'Danh sách',
                'route' => 'danhmuc.index',
                'icon' => 'fa fa-list',
            ],
        ],
    ],
    [
        'name' => 'Quản lý nhà cung cấp',
        'icon' => 'fa fa-list',
        'route' => 'admin.pages.nhacungcap.index',
        'children' => [
            [
                'name' => 'Danh sách',
                'route' => 'nhacungcap.index',
                'icon' => 'fa fa-list',
            ],
        ],
    ],
    [
        'name' => 'Quản lý sản phẩm',
        'icon' => 'fa fa-list',
        'route' => 'admin.pages.sanpham.index',
        'children' => [
            [
                'name' => 'Danh sách',
                'route' => 'sanpham.index',
                'icon' => 'fa fa-list',
            ],
        ],
    ]
];
