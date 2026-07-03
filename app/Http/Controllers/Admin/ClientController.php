<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query()->whereNotNull('business_name')->orWhereNotNull('pic_name')->latest();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('business_name', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('category')) {
            $query->where('business_category', $request->category);
        }

        $clients = $query->paginate(10)->withQueryString();

        return view('admin.clients.index', compact('clients'));
    }

    public function create()
    {
        return view('admin.clients.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:6'],
            'business_name' => ['required', 'string', 'max:255'],
            'business_category' => ['required', 'string', 'max:255'],
            'pic_name' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string'],
            'status' => ['required', 'in:active,suspended,pending'],
        ]);

        $data['password'] = Hash::make($data['password']);

        User::create($data);

        return redirect()->route('admin.clients.index')->with('success', 'Client berhasil ditambahkan.');
    }

    public function show(User $client)
    {
        $licenses = [];
        $transactions = [];

        return view('admin.clients.show', compact('client', 'licenses', 'transactions'));
    }

    public function edit(User $client)
    {
        return view('admin.clients.edit', compact('client'));
    }

    public function update(Request $request, User $client)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email,' . $client->id],
            'password' => ['nullable', 'min:6'],
            'business_name' => ['required', 'string', 'max:255'],
            'business_category' => ['required', 'string', 'max:255'],
            'pic_name' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string'],
            'status' => ['required', 'in:active,suspended,pending'],
        ]);

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $client->update($data);

        return redirect()->route('admin.clients.index')->with('success', 'Client berhasil diperbarui.');
    }

    public function destroy(User $client)
    {
        $client->delete();

        return redirect()->route('admin.clients.index')->with('success', 'Client berhasil dihapus.');
    }

    public function toggleStatus(User $client)
    {
        $client->status = $client->status === 'active' ? 'suspended' : 'active';
        $client->save();

        return redirect()->back()->with('success', 'Status akun berhasil diperbarui.');
    }
}
