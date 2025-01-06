<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{

    public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('permission:view-course|create-course|edit-course|delete-course', ['only' => ['index','show']]);
       $this->middleware('permission:create-course', ['only' => ['create','store']]);
       $this->middleware('permission:edit-course', ['only' => ['edit','update']]);
       $this->middleware('permission:delete-course', ['only' => ['destroy']]);
    }


    public function index(): View
    {
        return view('products.index', [
            'products' => Product::latest()->paginate(3)
        ]);
    }


    public function create(): View
    {
        return view('products.create');
    }


    public function store(StoreProductRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('video')) {
            $data['video'] = $request->file('video')->store('videos', 'public');
        }

        Product::create($data);

        return redirect()->route('products.index')
                ->withSuccess("Yangi kurs muvaffaqiyatli qo'shildi");
    }


    public function show(Product $product): View
    {
        return view('products.show', [
            'product' => $product
        ]);
    }


    public function edit(Product $product): View
    {
        return view('products.edit', [
            'product' => $product
        ]);
    }


    public function update(UpdateProductRequest $request, Product $product): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('video')) {
            if ($product->video) {
                \Storage::disk('public')->delete($product->video);
            }

            $data['video'] = $request->file('video')->store('videos', 'public');
        }

        $product->update($data);

        return redirect()->back()
                ->withSuccess('Kurs muvaffaqiyatli yangilandi');
    }


    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();
        return redirect()->route('products.index')
                ->withSuccess("Kurs muvaffaqiyatli o'chirildi");
    }
}
