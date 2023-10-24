<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class unitTable extends Component
{
    /**
     * Create a new component instance.
     */
    public $unit;
    public $url;
    public $type;

    public function __construct($unit = null ,  $type = null )
    {
        $this->unit = $unit;
        $this->type = $type;
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.unit-table');
    }
}
