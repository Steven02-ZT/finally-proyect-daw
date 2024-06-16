<?php

namespace App\View\Components\admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class category_gender extends Component
{

    public function __construct()
    {
        
    }

    public function render():View|Closure|string
    {
        return view('components.admin.category_gender');
    }
}
