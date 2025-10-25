<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class card extends Component
{
    public $px;

    public function __construct($px = '100')
    {
        $this->px = $px;
    }
    public function render(): View|Closure|string
    {
        return view('components.card');
    }
}
