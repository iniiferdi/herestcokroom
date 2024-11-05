<?php

namespace App\View\Components\Admin\Modal;

use Closure;
use App\Models\Size;
use App\Models\Product;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class StockCrud extends Component
{
    public $product;
    public $sizes;

    public function __construct(Product $product)
    {
        $this->product = $product;
        $this->sizes = Size::whereDoesntHave('productSizes', function ($query) {
            $query->where('product_id', $this->product->id);
        })->get();
    }

    public function render(): View|Closure|string
    {
        return view('components.admin.modal.stock-crud', [
            'sizes' => $this->sizes,
            'product' => $this->product,
        ]);
    }
}

