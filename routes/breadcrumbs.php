<?php

use App\Models\User;
use App\View\Components\Breadcrumb;
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

Breadcrumbs::for('sanpham.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Sản phẩm', route('sanpham.index'));
});

Breadcrumbs::for('sanpham.create', function ($trail) {
    $trail->parent('sanpham.index');
    $trail->push('Thêm mới', route('sanpham.create'));
});

Breadcrumbs::for('sanpham.edit', function ($trail, $id) {
    $trail->parent('sanpham.index');
    $trail->push('Sửa', route('sanpham.edit', $id));
});

Breadcrumbs::for('admin.hoadon', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Hóa đơn', route('admin.hoadon'));
});
