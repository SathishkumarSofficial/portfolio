<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('sort_order')->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'image_placeholder' => 'nullable|string',
            'technologies_raw' => 'required|string', // Comma separated
            'live_link' => 'required|string|max:255',
            'github_link' => 'required|string|max:255',
            'features_raw' => 'nullable|string', // Newline separated
            'sort_order' => 'required|integer',
        ]);

        $imagePath = 'PROJECT_IMAGE';
        if ($request->hasFile('image_file')) {
            $uploadPath = public_path('uploads');
            if (!File::exists($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true);
            }
            $file = $request->file('image_file');
            $filename = 'project_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $filename);
            $imagePath = '/uploads/' . $filename;
        } elseif ($request->filled('image_placeholder')) {
            $imagePath = $request->image_placeholder;
        }

        $technologies = array_filter(array_map('trim', explode(',', $request->technologies_raw)));
        $features = array_filter(array_map('trim', explode("\n", $request->features_raw ?? '')));

        Project::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imagePath,
            'technologies' => array_values($technologies),
            'live_link' => $request->live_link,
            'github_link' => $request->github_link,
            'features' => array_values($features),
            'sort_order' => $request->sort_order,
        ]);

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
    }

    public function edit(Project $project)
    {
        $project->technologies_raw = implode(', ', $project->technologies ?? []);
        $project->features_raw = implode("\n", $project->features ?? []);
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'image_placeholder' => 'nullable|string',
            'technologies_raw' => 'required|string',
            'live_link' => 'required|string|max:255',
            'github_link' => 'required|string|max:255',
            'features_raw' => 'nullable|string',
            'sort_order' => 'required|integer',
        ]);

        $imagePath = $project->image;
        if ($request->hasFile('image_file')) {
            $uploadPath = public_path('uploads');
            if (!File::exists($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true);
            }
            // Delete old file if dynamic
            if ($project->image && str_starts_with($project->image, '/uploads/') && File::exists(public_path($project->image))) {
                File::delete(public_path($project->image));
            }
            $file = $request->file('image_file');
            $filename = 'project_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $filename);
            $imagePath = '/uploads/' . $filename;
        } elseif ($request->filled('image_placeholder')) {
            $imagePath = $request->image_placeholder;
        }

        $technologies = array_filter(array_map('trim', explode(',', $request->technologies_raw)));
        $features = array_filter(array_map('trim', explode("\n", $request->features_raw ?? '')));

        $project->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imagePath,
            'technologies' => array_values($technologies),
            'live_link' => $request->live_link,
            'github_link' => $request->github_link,
            'features' => array_values($features),
            'sort_order' => $request->sort_order,
        ]);

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        if ($project->image && str_starts_with($project->image, '/uploads/') && File::exists(public_path($project->image))) {
            File::delete(public_path($project->image));
        }
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully.');
    }
}
