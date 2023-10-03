<?php

namespace App\View\Components\recieve;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class tableRow extends Component
{
    public $tableRow;
    /**
     * Create a new component instance.
     */
    public function __construct($tableRow)
    {
        $this->tableRow = $tableRow;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.recieve.table-row');
    }
}
