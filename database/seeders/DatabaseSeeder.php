<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Setting;
use App\Models\Skill;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Certificate;
use App\Models\Education;
use App\Models\Achievement;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Disable foreign key constraints for truncation
        Schema::disableForeignKeyConstraints();

        // Truncate tables to allow fresh seeding
        User::truncate();
        Setting::truncate();
        Skill::truncate();
        Experience::truncate();
        Project::truncate();
        Certificate::truncate();
        Education::truncate();
        Achievement::truncate();

        Schema::enableForeignKeyConstraints();

        // 1. Create Default Admin User
        User::create([
            'name' => 'Admin',
            'email' => 'admin@portfolio.com',
            'password' => Hash::make('Password123!'),
        ]);

        // Load profile config data
        $profile = config('profile');

        if (!$profile) {
            // Fallback if config is not loaded yet
            return;
        }

        // 2. Seed Settings
        $settingsToSeed = [
            'name' => $profile['name'],
            'designation' => $profile['designation'],
            'titles' => json_encode($profile['titles']),
            'email' => $profile['email'],
            'phone' => $profile['phone'],
            'location' => $profile['location'],
            'resume_link' => $profile['resume_link'],
            'github_link' => $profile['github_link'],
            'linkedin_link' => $profile['linkedin_link'],
            'profile_image' => $profile['profile_image'],
            'hero_image' => $profile['hero_image'],
            'about_image' => $profile['about_image'],
            'bio' => $profile['bio'],
            'socials' => json_encode($profile['socials']),
            
            // Default SEO Settings
            'seo_title' => 'Sathishkumar S | Premium Portfolio',
            'seo_description' => 'Personal portfolio of Sathishkumar S, Full Stack Developer & AWS Enthusiast specializing in PHP Laravel, MySQL, and cloud concepts.',
            'seo_keywords' => 'Sathishkumar S, Full Stack Developer, PHP Developer, Laravel Developer, AWS, MySQL, Web Developer Portfolio',
            'google_analytics_id' => 'UA-XXXXX-Y',
        ];

        foreach ($settingsToSeed as $key => $value) {
            Setting::create([
                'key' => $key,
                'value' => $value
            ]);
        }

        // 3. Seed Skills
        foreach ($profile['skills'] as $category => $skillsList) {
            foreach ($skillsList as $sk) {
                Skill::create([
                    'name' => $sk['name'],
                    'category' => $category,
                    'level' => $sk['level']
                ]);
            }
        }

        // 4. Seed Experiences
        foreach ($profile['experiences'] as $index => $exp) {
            Experience::create([
                'company' => $exp['company'],
                'designation' => $exp['designation'],
                'duration' => $exp['duration'],
                'responsibilities' => $exp['responsibilities'],
                'sort_order' => $index
            ]);
        }

        // 5. Seed Projects
        foreach ($profile['projects'] as $index => $proj) {
            Project::create([
                'name' => $proj['name'],
                'description' => $proj['description'],
                'image' => $proj['image'],
                'technologies' => $proj['technologies'],
                'live_link' => $proj['live_link'],
                'github_link' => $proj['github_link'],
                'features' => $proj['features'],
                'sort_order' => $index
            ]);
        }

        // 6. Seed Certificates
        foreach ($profile['certifications'] as $cert) {
            Certificate::create([
                'title' => $cert['title'],
                'issuer' => $cert['issuer'],
                'image' => $cert['image'],
                'verify_link' => $cert['verify_link'],
                'date' => $cert['date'] ?? null
            ]);
        }

        // 7. Seed Education
        foreach ($profile['education'] as $index => $edu) {
            Education::create([
                'degree' => $edu['degree'],
                'major' => $edu['major'],
                'institution' => $edu['institution'],
                'university' => $edu['university'],
                'duration' => $edu['duration'],
                'score' => $edu['score'],
                'sort_order' => $index
            ]);
        }

        // 8. Seed Achievements
        foreach ($profile['achievements'] as $achTitle) {
            Achievement::create([
                'title' => $achTitle
            ]);
        }
    }
}
