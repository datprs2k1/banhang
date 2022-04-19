<?php

use App\Models\User;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('admin.dashboard', function ($trail) {
    $trail->push('Trang quản lý', route('admin.dashboard'));
});

Breadcrumbs::for('danhmuc.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Danh mục', route('danhmuc.index'));
});

Breadcrumbs::for('danhmuc.create', function ($trail) {
    $trail->parent('danhmuc.index');
    $trail->push('Thêm mới', route('danhmuc.create'));
});

Breadcrumbs::for('danhmuc.edit', function ($trail, $id) {
    $trail->parent('danhmuc.index');
    $trail->push('Sửa', route('danhmuc.edit', $id));
});

Breadcrumbs::for('nhacungcap.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Nhà cung cấp', route('nhacungcap.index'));
});

Breadcrumbs::for('nhacungcap.create', function ($trail) {
    $trail->parent('nhacungcap.index');
    $trail->push('Thêm mới', route('nhacungcap.create'));
});

Breadcrumbs::for('nhacungcap.edit', function ($trail, $id) {
    $trail->parent('nhacungcap.index');
    $trail->push('Sửa', route('nhacungcap.edit', $id));
});
