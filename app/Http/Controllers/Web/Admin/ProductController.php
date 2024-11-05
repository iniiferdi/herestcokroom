<?php

namespace App\Http\Controllers\Web\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItems;
use App\Models\ProductImage;
use App\Models\ProductSize;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required|integer|exists:categories,id',
            'color_id' => 'required|integer|exists:colors,id',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
        ]);

        // Temukan produk berdasarkan ID
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('products')->with('error', 'Product not found.');
        }

        // Update data produk
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category_id');
        $product->color_id = $request->input('color_id');
        $product->description = $request->input('description');

        $product->save();

        // Jika ada gambar yang diunggah, hapus gambar lama dan simpan yang baru
        if ($request->hasFile('images')) {
            // Hapus gambar lama
            foreach ($product->images as $image) {
                $imagePath = public_path('images/product') . '/' . $image->images;
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
                $image->delete();
            }

            // Simpan gambar baru
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images/product'), $imageName);

                $product_image = new ProductImage();
                $product_image->product_id = $product->id;
                $product_image->images = $imageName;
                $product_image->save();
            }
        }

        return redirect()->route('products')->with('success', 'Product updated successfully.');
    }


    public function store(Request $request)
    {



        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required|integer|exists:categories,id',
            'color_id' => 'required|integer|exists:colors,id',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
        ]);


        $product = new Product();
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category_id');
        $product->color_id = $request->input('color_id');
        $product->description = $request->input('description');

        $product->save();


        $productSize = new ProductSize();
        $productSize->product_id = $product->id;
        $productSize->save();


        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {

                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images/product'), $imageName);

                $product_image = new ProductImage();
                $product_image->product_id = $product->id;
                $product_image->images = $imageName;

                $product_image->save();
            }
        }



        return redirect()->route('products')->with('success', 'Product created successfully.');
    }

    public function destroy(string $id)
    {
        // Temukan produk berdasarkan ID atau gagal jika tidak ditemukan
        $product = Product::findOrFail($id);

        // Hapus semua gambar terkait dari penyimpanan dan database
        if ($product->images) {
            foreach ($product->images as $image) {
                $imagePath = 'images/product/' . $image->images;
                if (Storage::disk('public')->exists($imagePath)) {
                    Storage::disk('public')->delete($imagePath);
                }
                $image->delete();
            }
        }

        // Hapus produk dari database
        $product->delete();

        // Redirect ke halaman daftar produk dengan pesan sukses
        return redirect()->route('products')->with('success', 'Product deleted successfully.');
    }



    public function showProduct(string $id)
    {
        $product = Product::with('images', 'sizes.size')->find($id);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        return response()->json([
            'id' => $product->id,
            'name' => $product->name,
            'description' => $product->description,
            'price' => $product->price,
            'images' => $product->images->pluck('images'), // assuming 'image' is the column name
            'sizes' => $product->sizes->map(function ($productSize) {
                return [
                    'id' => optional($productSize->size)->id,
                    'name' => optional($productSize->size)->name,
                    'stock' => $productSize->stock, // Include stock information
                ];
            }),
        ]);
    }




    public function show(string $id)
    {
        $product = Product::with('images',  'category', 'color')->find($id);

        return response()->json([
            'id' => $product->id,
            'name' => $product->name,
            'description' => $product->description,
            'price' => $product->price,
            'category_id' => $product->category->id,
            'category_name' => $product->category->name,
            'color_id' => $product->color->id,
            'color_name' => $product->color->name,
            'images' => $product->images->pluck('images')
        ]);
    }



    public function addChart(Request $request)
    {

        $cart = Cart::where('user_id', Auth::user()->id)->first();


        if (!$cart) {
            $cart = new Cart();
            $cart->user_id = Auth::user()->id;
            $cart->save();
        }


        $cartItems = new CartItems();
        $cartItems->cart_id = $cart->id;
        $cartItems->product_id = $request->product_id;
        $cartItems->size_id     = $request->size;
        $cartItems->qty = 1;
        $cartItems->save();


        return redirect()->route('home')->with(['success' => 'Add cart successfully']);
    }
}
