<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\Setting;
use App\Models\Skill;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Certificate;
use App\Models\Education;
use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class PortfolioController extends Controller
{
    /**
     * Show the portfolio main page.
     */
    public function index()
    {
        $hasSettings = false;
        try {
            // Check if settings table exists and has entries
            if (Schema::hasTable('settings')) {
                $hasSettings = Setting::count() > 0;
            }
        } catch (\Exception $e) {
            // Database not migrated or configured
        }

        if ($hasSettings) {
            // Read from DB
            $settings = [];
            foreach (Setting::all() as $s) {
                $settings[$s->key] = $s->value;
            }
            
            // Decode serialized elements
            if (isset($settings['titles'])) {
                $settings['titles'] = json_decode($settings['titles'], true) ?? [];
            } else {
                $settings['titles'] = config('profile.titles', []);
            }
            if (isset($settings['socials'])) {
                $settings['socials'] = json_decode($settings['socials'], true) ?? [];
            } else {
                $settings['socials'] = config('profile.socials', []);
            }

            $skills = Skill::all()->groupBy('category');
            $experiences = Experience::orderBy('sort_order')->get();
            $projects = Project::orderBy('sort_order')->get();
            $certificates = Certificate::all();
            $education = Education::orderBy('sort_order')->get();
            $achievements = Achievement::all();
        } else {
            // Resilient Fallback to config file
            $profile = config('profile');
            
            $settings = $profile;
            
            $skills = collect();
            foreach ($profile['skills'] as $cat => $list) {
                $skills[$cat] = collect($list)->map(fn($item) => (object)$item);
            }
            
            $experiences = collect($profile['experiences'])->map(fn($item, $idx) => (object)array_merge($item, ['sort_order' => $idx]));
            $projects = collect($profile['projects'])->map(fn($item, $idx) => (object)array_merge($item, ['sort_order' => $idx]));
            $certificates = collect($profile['certifications'])->map(fn($item) => (object)$item);
            $education = collect($profile['education'])->map(fn($item, $idx) => (object)array_merge($item, ['sort_order' => $idx]));
            $achievements = collect($profile['achievements'])->map(fn($item) => (object)['title' => $item]);
        }

        return view('portfolio.index', compact(
            'settings',
            'skills',
            'experiences',
            'projects',
            'certificates',
            'education',
            'achievements'
        ));
    }

    /**
     * Handle contact form AJAX submission.
     */
    public function contactSubmit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|min:5',
        ]);

        try {
            // Save to database if table exists
            if (Schema::hasTable('contact_messages')) {
                ContactMessage::create($validated);
            }

            /*
            |--------------------------------------------------------------------------
            | Optional: Email Notification Integration
            |--------------------------------------------------------------------------
            | You can configure email sending by setting mail variables in your .env
            | and uncommenting the Mail block below.
            |
            | Mail::to(Setting::get('email', 'admin@portfolio.com'))->send(new ContactMail($validated));
            */

            return response()->json([
                'success' => true,
                'message' => 'Thank you! Your message has been sent successfully. We will get back to you soon.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'There was an issue processing your request: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Generate dynamic sitemap.xml.
     */
    public function sitemap()
    {
        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        $xml .= '  <url>';
        $xml .= '    <loc>' . url('/') . '</loc>';
        $xml .= '    <lastmod>' . date('Y-m-d') . '</lastmod>';
        $xml .= '    <changefreq>weekly</changefreq>';
        $xml .= '    <priority>1.0</priority>';
        $xml .= '  </url>';
        $xml .= '</urlset>';

        return response($xml, 200, ['Content-Type' => 'application/xml']);
    }

    /**
     * Generate robots.txt.
     */
    public function robots()
    {
        $robots = "User-agent: *\n";
        $robots .= "Allow: /\n\n";
        $robots .= "Sitemap: " . url('/sitemap.xml') . "\n";

        return response($robots, 200, ['Content-Type' => 'text/plain']);
    }
}
