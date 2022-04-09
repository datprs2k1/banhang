<?php

return [
    [
        'name' => 'Quản lý danh mục',
        'icon' => 'fa fa-list',
        'route' => 'admin.categories.index',
        'children' => [
            [
                'name' => 'Danh sách',
                'route' => 'admin.categories.index',
                'icon' => 'fa fa-list',
            ],
            [
                'name' => 'Thêm mới',
                'route' => 'admin.categories.create',
                'icon' => 'fa fa-plus',
            ],
        ],
    ]
];
