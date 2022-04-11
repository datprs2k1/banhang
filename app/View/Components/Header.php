<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\DanhMuc;

class Header extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $danh_muc = DanhMuc::all();

        return view('components.header', compact('danh_muc'));
    }
}
