<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {
        $education = Education::orderBy('sort_order')->get();
        return view('admin.education.index', compact('education'));
    }

    public function create()
    {
        return view('admin.education.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'degree' => 'required|string|max:255',
            'major' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'university' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
            'score' => 'required|string|max:100',
            'sort_order' => 'required|integer',
        ]);

        Education::create($request->all());

        return redirect()->route('admin.education.index')->with('success', 'Education record created successfully.');
    }

    public function edit(Education $education)
    {
        return view('admin.education.edit', compact('education'));
    }

    public function update(Request $request, Education $education)
    {
        $request->validate([
            'degree' => 'required|string|max:255',
            'major' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'university' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
            'score' => 'required|string|max:100',
            'sort_order' => 'required|integer',
        ]);

        $education->update($request->all());

        return redirect()->route('admin.education.index')->with('success', 'Education record updated successfully.');
    }

    public function destroy(Education $education)
    {
        $education->delete();
        return redirect()->route('admin.education.index')->with('success', 'Education record deleted successfully.');
    }
}
