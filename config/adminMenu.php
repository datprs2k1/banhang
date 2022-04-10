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
    ]
];
