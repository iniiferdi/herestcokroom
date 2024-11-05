<?php

namespace App\View\Components\Admin\Modal;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StockCrudUpgrade extends Component
{
    public $stock;

    /**
     * Create a new component instance.
     */
    public function __construct($stock)
    {
        $this->stock = $stock;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.modal.stock-crud-upgrade');
    }
}
