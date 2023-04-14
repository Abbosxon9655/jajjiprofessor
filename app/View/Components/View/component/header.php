<?php

namespace App\View\Components\View\component;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class header extends Component
{
    /**
     * Create a new component instance.
     */
    public $name1;
    public $name2;

    public function __construct($name1 , $name2)
    {
        $this-> name1 = $name1;
        $this-> name2 = $name2;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.header');
    }
}
