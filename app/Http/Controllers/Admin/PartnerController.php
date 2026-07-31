<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    public function index(Request $request)
    {
        $partners = Organization::when($request->search, function ($query, $search) {
            return $query->where('name', 'LIKE', '%' . $search . '%');
        })->latest()->get();

        return view('admin.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.partners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $input = $request->except('logo');

        if ($request->hasFile('logo')) {
            $input['logo'] = $request->file('logo')->store('logos', 'public');
        }

        Organization::create($input); // Pastikan 'logo' ada di $fillable model Organization

        return redirect()->route('admin.partners.index');
    }

    public function edit(Organization $partner)
    {
        return view('admin.partners.edit', compact('partner'));
    }

    public function update(Request $request, Organization $partner)
    {
        $request->validate([
            'name' => 'required',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $input = $request->except('logo');

        if ($request->hasFile('logo')) {
            // Hapus logo lama jika ada
            if ($partner->logo) {
                Storage::disk('public')->delete($partner->logo);
            }
            $input['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $partner->update($input);

        return redirect()->route('admin.partners.index');
    }
    public function destroy(Organization $partner)
    {
        // Hapus logo dari storage jika ada
        if ($partner->logo) {
            Storage::disk('public')->delete($partner->logo);
        }
        $partner->delete();

        return redirect()->route('admin.partners.index');
    }
}