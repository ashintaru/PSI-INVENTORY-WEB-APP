<?php

namespace App\View\Components\navigation;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class navLink2 extends Component
{
    public $car;
    /**
     * Create a new component instance.
     */
    public function __construct($car)
    {
        $this->car = $car;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navigation.nav-link2');
    }
}
