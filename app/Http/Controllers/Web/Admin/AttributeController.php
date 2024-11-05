<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\ProductSize;
use App\Models\Size;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    public function storeCategory(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;

        $category->save();

        return redirect()->route('products')->with(['success' => 'Category created successfully']);
    }

    public function destroyCategory(string $id)
    {
        Category::find($id)->delete();

        return redirect()->route('products')->with(['success' => 'Category deleted successfully']);
    }

    public function storeSize(Request $request)
    {
        $category = new Size();
        $category->name = $request->size;

        $category->save();

        return redirect()->route('products')->with(['success' => 'Size created successfully']);
    }

    public function destroySize(string $id)
    {
        Size::find($id)->delete();

        return redirect()->route('products')->with(['success' => 'Size deleted successfully']);
    }

    public function storeColor(Request $request)
    {
        $category = new Color();
        $category->name = $request->name;
        $category->hex = $request->hex;

        $category->save();

        return redirect()->route('products')->with(['success' => 'Color created successfully']);
    }

    public function destroyColor(string $id)
    {
        Color::find($id)->delete();

        return redirect()->route('products')->with(['success' => 'Color deleted successfully']);
    }

    public function storeStock(Request $request){
        
        $productSize = new ProductSize();
        $productSize->stock = $request->stock;
        $productSize->size_id = $request->size_id;
        $productSize->product_id = $request->product_id;

        $productSize->save();

        return redirect()->route('products')->with(['success' => 'Stock Add successfully']);
    }

    public function destroyStock(string $id){
        $productSize = ProductSize::find($id)->delete();

        return redirect()->route('products')->with(['success' => 'Stock Deleted successfully']);
    }

    public function updateStock(Request $request, string $id){
        $productSize = ProductSize::find($id);

        $productSize->update([
            'stock' => $request->stock
        ]);


        return redirect()->route('products')->with(['success' => 'Stock Update successfully']);
    }
}
