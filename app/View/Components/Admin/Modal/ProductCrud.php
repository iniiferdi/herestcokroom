<?php

namespace App\View\Components\Admin\Modal;

use Closure;
use App\Models\Color;
use App\Models\Category;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class ProductCrud extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $categories = Category::all();
        $colors = Color::all();
        return view('components.admin.modal.product-crud', compact('categories',  'colors'));
    }
}
