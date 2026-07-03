<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\License;
use App\Models\Package;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class LicenseController extends Controller
{
    public function index(Request $request)
    {
        $query = License::query()->with(['user', 'product', 'package'])->latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('product_id')) {
            $query->where('product_id', $request->product_id);
        }

        $licenses = $query->paginate(10)->withQueryString();
        $products = Product::orderBy('name')->get();

        return view('admin.licenses.index', compact('licenses', 'products'));
    }

    public function create()
    {
        $clients = User::orderBy('business_name')->get();
        $products = Product::orderBy('name')->get();
        $packages = Package::orderBy('name')->get();

        return view('admin.licenses.create', compact('clients', 'products', 'packages'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'product_id' => ['required', 'exists:products,id'],
            'package_id' => ['nullable', 'exists:packages,id'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after_or_equal:start_date'],
            'status' => ['required', 'in:active,expired,suspended'],
            'note' => ['nullable', 'string'],
        ]);

        $product = Product::findOrFail($data['product_id']);
        $data['license_key'] = License::generateKey($product);

        License::create($data);

        return redirect()->route('admin.licenses.index')->with('success', 'Lisensi berhasil ditambahkan.');
    }

    public function show(License $license)
    {
        return view('admin.licenses.show', compact('license'));
    }

    public function edit(License $license)
    {
        $clients = User::orderBy('business_name')->get();
        $products = Product::orderBy('name')->get();
        $packages = Package::orderBy('name')->get();

        return view('admin.licenses.edit', compact('license', 'clients', 'products', 'packages'));
    }

    public function update(Request $request, License $license)
    {
        $data = $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'product_id' => ['required', 'exists:products,id'],
            'package_id' => ['nullable', 'exists:packages,id'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after_or_equal:start_date'],
            'status' => ['required', 'in:active,expired,suspended'],
            'note' => ['nullable', 'string'],
        ]);

        $license->update($data);

        return redirect()->route('admin.licenses.index')->with('success', 'Lisensi berhasil diperbarui.');
    }

    public function destroy(License $license)
    {
        $license->delete();

        return redirect()->route('admin.licenses.index')->with('success', 'Lisensi berhasil dihapus.');
    }

    public function toggleStatus(License $license)
    {
        $license->status = $license->status === 'active' ? 'suspended' : 'active';
        $license->save();

        return redirect()->back()->with('success', 'Status lisensi berhasil diubah.');
    }
}
