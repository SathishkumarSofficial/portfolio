<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CertificateController extends Controller
{
    public function index()
    {
        $certificates = Certificate::all();
        return view('admin.certificates.index', compact('certificates'));
    }

    public function create()
    {
        return view('admin.certificates.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'issuer' => 'required|string|max:255',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'image_placeholder' => 'nullable|string',
            'verify_link' => 'required|string|max:255',
            'date' => 'nullable|string|max:100',
        ]);

        $imagePath = 'CERTIFICATE_IMAGE';
        if ($request->hasFile('image_file')) {
            $uploadPath = public_path('uploads');
            if (!File::exists($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true);
            }
            $file = $request->file('image_file');
            $filename = 'cert_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $filename);
            $imagePath = '/uploads/' . $filename;
        } elseif ($request->filled('image_placeholder')) {
            $imagePath = $request->image_placeholder;
        }

        Certificate::create([
            'title' => $request->title,
            'issuer' => $request->issuer,
            'image' => $imagePath,
            'verify_link' => $request->verify_link,
            'date' => $request->date,
        ]);

        return redirect()->route('admin.certificates.index')->with('success', 'Certificate created successfully.');
    }

    public function edit(Certificate $certificate)
    {
        return view('admin.certificates.edit', compact('certificate'));
    }

    public function update(Request $request, Certificate $certificate)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'issuer' => 'required|string|max:255',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'image_placeholder' => 'nullable|string',
            'verify_link' => 'required|string|max:255',
            'date' => 'nullable|string|max:100',
        ]);

        $imagePath = $certificate->image;
        if ($request->hasFile('image_file')) {
            $uploadPath = public_path('uploads');
            if (!File::exists($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true);
            }
            if ($certificate->image && str_starts_with($certificate->image, '/uploads/') && File::exists(public_path($certificate->image))) {
                File::delete(public_path($certificate->image));
            }
            $file = $request->file('image_file');
            $filename = 'cert_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $filename);
            $imagePath = '/uploads/' . $filename;
        } elseif ($request->filled('image_placeholder')) {
            $imagePath = $request->image_placeholder;
        }

        $certificate->update([
            'title' => $request->title,
            'issuer' => $request->issuer,
            'image' => $imagePath,
            'verify_link' => $request->verify_link,
            'date' => $request->date,
        ]);

        return redirect()->route('admin.certificates.index')->with('success', 'Certificate updated successfully.');
    }

    public function destroy(Certificate $certificate)
    {
        if ($certificate->image && str_starts_with($certificate->image, '/uploads/') && File::exists(public_path($certificate->image))) {
            File::delete(public_path($certificate->image));
        }
        $certificate->delete();
        return redirect()->route('admin.certificates.index')->with('success', 'Certificate deleted successfully.');
    }
}
