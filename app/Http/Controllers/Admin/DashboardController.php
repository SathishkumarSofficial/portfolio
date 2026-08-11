<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Experience;
use App\Models\ContactMessage;

class DashboardController extends Controller
{
    /**
     * Show admin dashboard.
     */
    public function index()
    {
        $projectsCount = 0;
        $skillsCount = 0;
        $experiencesCount = 0;
        $unreadMessagesCount = 0;
        $recentMessages = collect();

        try {
            $projectsCount = Project::count();
            $skillsCount = Skill::count();
            $experiencesCount = Experience::count();
            $unreadMessagesCount = ContactMessage::where('is_read', false)->count();
            $recentMessages = ContactMessage::orderBy('created_at', 'desc')->take(5)->get();
        } catch (\Exception $e) {
            // Tables might not be migrated yet
        }

        return view('admin.dashboard', compact(
            'projectsCount',
            'skillsCount',
            'experiencesCount',
            'unreadMessagesCount',
            'recentMessages'
        ));
    }
}
