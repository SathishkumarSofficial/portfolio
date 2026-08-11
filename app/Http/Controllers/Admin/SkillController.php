<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::all()->groupBy('category');
        return view('admin.skills.index', compact('skills'));
    }

    public function create()
    {
        $categories = ['Languages', 'Backend', 'Frontend', 'Database', 'Cloud', 'Cloud Concepts', 'Tools'];
        return view('admin.skills.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string',
            'level' => 'required|integer|between:0,100',
        ]);

        Skill::create($request->all());

        return redirect()->route('admin.skills.index')->with('success', 'Skill created successfully.');
    }

    public function edit(Skill $skill)
    {
        $categories = ['Languages', 'Backend', 'Frontend', 'Database', 'Cloud', 'Cloud Concepts', 'Tools'];
        return view('admin.skills.edit', compact('skill', 'categories'));
    }

    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string',
            'level' => 'required|integer|between:0,100',
        ]);

        $skill->update($request->all());

        return redirect()->route('admin.skills.index')->with('success', 'Skill updated successfully.');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();
        return redirect()->route('admin.skills.index')->with('success', 'Skill deleted successfully.');
    }
}
