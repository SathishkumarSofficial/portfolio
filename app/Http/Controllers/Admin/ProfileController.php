<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    /**
     * Show profile management form.
     */
    public function index()
    {
        $settings = [];
        try {
            foreach (Setting::all() as $s) {
                $settings[$s->key] = $s->value;
            }
        } catch (\Exception $e) {
            // Migrations not run
        }

        // Decode title arrays and socials
        $settings['titles_raw'] = '';
        if (isset($settings['titles'])) {
            $titlesArray = json_decode($settings['titles'], true) ?? [];
            $settings['titles_raw'] = implode("\n", $titlesArray);
        }

        if (isset($settings['socials'])) {
            $settings['socials'] = json_decode($settings['socials'], true) ?? [];
        } else {
            $settings['socials'] = [];
        }

        return view('admin.profile', compact('settings'));
    }

    /**
     * Update profile details.
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'titles_raw' => 'required|string',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:30',
            'location' => 'required|string|max:255',
            'bio' => 'required|string',
            'github_link' => 'nullable|url',
            'linkedin_link' => 'nullable|url',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'hero_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'about_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'resume_file' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string|max:500',
            'seo_keywords' => 'nullable|string|max:500',
            'google_analytics_id' => 'nullable|string|max:100',
        ]);

        // 1. Basic Fields
        Setting::set('name', $request->input('name'));
        Setting::set('designation', $request->input('designation'));
        Setting::set('email', $request->input('email'));
        Setting::set('phone', $request->input('phone'));
        Setting::set('location', $request->input('location'));
        Setting::set('bio', $request->input('bio'));

        // 2. Titles conversion
        $titles = array_filter(array_map('trim', explode("\n", $request->input('titles_raw'))));
        Setting::set('titles', json_encode(array_values($titles)));

        // 3. Social Media Link JSON
        $socials = [
            'github' => $request->input('github_link'),
            'linkedin' => $request->input('linkedin_link'),
            'email' => $request->input('email'),
        ];
        Setting::set('socials', json_encode($socials));
        Setting::set('github_link', $request->input('github_link'));
        Setting::set('linkedin_link', $request->input('linkedin_link'));

        // 4. SEO Settings
        Setting::set('seo_title', $request->input('seo_title'));
        Setting::set('seo_description', $request->input('seo_description'));
        Setting::set('seo_keywords', $request->input('seo_keywords'));
        Setting::set('google_analytics_id', $request->input('google_analytics_id'));

        // Ensure upload directory exists
        $uploadPath = public_path('uploads');
        if (!File::exists($uploadPath)) {
            File::makeDirectory($uploadPath, 0755, true);
        }

        // 5. Image & File Uploads
        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $filename = 'profile_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $filename);
            
            // Delete old file if exists
            $old = Setting::get('profile_image');
            if ($old && $old !== 'PROFILE_BACKGROUND_IMAGE' && File::exists(public_path($old))) {
                File::delete(public_path($old));
            }
            Setting::set('profile_image', '/uploads/' . $filename);
        }

        if ($request->hasFile('hero_image')) {
            $file = $request->file('hero_image');
            $filename = 'hero_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $filename);
            
            $old = Setting::get('hero_image');
            if ($old && $old !== 'YOUR_IMAGE_PATH' && File::exists(public_path($old))) {
                File::delete(public_path($old));
            }
            Setting::set('hero_image', '/uploads/' . $filename);
        }

        if ($request->hasFile('about_image')) {
            $file = $request->file('about_image');
            $filename = 'about_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $filename);
            
            $old = Setting::get('about_image');
            if ($old && $old !== 'ABOUT_IMAGE' && File::exists(public_path($old))) {
                File::delete(public_path($old));
            }
            Setting::set('about_image', '/uploads/' . $filename);
        }

        if ($request->hasFile('resume_file')) {
            $file = $request->file('resume_file');
            $filename = 'resume_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $filename);
            
            $old = Setting::get('resume_link');
            if ($old && $old !== 'YOUR_RESUME_LINK' && File::exists(public_path($old))) {
                File::delete(public_path($old));
            }
            Setting::set('resume_link', '/uploads/' . $filename);
        }

        return redirect()->back()->with('success', 'Profile and settings updated successfully!');
    }
}
