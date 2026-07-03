<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Product;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index(Product $product)
    {
        $packages = $product->packages()->latest()->get();

        return view('admin.products.packages.index', compact('product', 'packages'));
    }

    public function create(Product $product)
    {
        return view('admin.products.packages.create', compact('product'));
    }

    public function store(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'integer', 'min:0'],
            'duration_days' => ['required', 'integer', 'min:1'],
            'description' => ['nullable', 'string'],
            'features' => ['nullable', 'string'],
            'is_popular' => ['nullable', 'boolean'],
            'status' => ['required', 'in:active,inactive'],
        ]);

        $data['product_id'] = $product->id;
        $data['features'] = array_values(array_filter(array_map('trim', preg_split('/\r\n|\n|\r/', $data['features'] ?? '')), 'strlen'));
        $data['is_popular'] = (bool) ($data['is_popular'] ?? false);

        $product->packages()->create($data);

        return redirect()->route('admin.products.packages.index', $product)->with('success', 'Paket berhasil ditambahkan.');
    }

    public function edit(Product $product, Package $package)
    {
        return view('admin.products.packages.edit', compact('product', 'package'));
    }

    public function update(Request $request, Product $product, Package $package)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'integer', 'min:0'],
            'duration_days' => ['required', 'integer', 'min:1'],
            'description' => ['nullable', 'string'],
            'features' => ['nullable', 'string'],
            'is_popular' => ['nullable', 'boolean'],
            'status' => ['required', 'in:active,inactive'],
        ]);

        $data['features'] = array_values(array_filter(array_map('trim', preg_split('/\r\n|\n|\r/', $data['features'] ?? '')), 'strlen'));
        $data['is_popular'] = (bool) ($data['is_popular'] ?? false);

        $package->update($data);

        return redirect()->route('admin.products.packages.index', $product)->with('success', 'Paket berhasil diperbarui.');
    }

    public function destroy(Product $product, Package $package)
    {
        $package->delete();

        return redirect()->route('admin.products.packages.index', $product)->with('success', 'Paket berhasil dihapus.');
    }
}
