<?php

namespace App\View\Components;

use Illuminate\View\Component;


class HomeLayout extends Component
{
    public $search;
    public function render()
    {
        return view('layouts.home');
    }

}
