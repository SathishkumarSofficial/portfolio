<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Personal Profile Configuration
    |--------------------------------------------------------------------------
    |
    | This file contains all the dynamic details for Sathishkumar S's portfolio.
    | Most of these fields use placeholders that can be replaced manually,
    | or managed dynamically through the Admin Panel.
    |
    */

    'name' => 'SATHISHKUMAR S',
    'designation' => 'Full Stack Developer',
    'titles' => [
        'Full Stack Developer',
        'PHP Laravel Developer',
        'Backend Developer',
        'AWS Enthusiast'
    ],
    'email' => 'YOUR_EMAIL_PLACEHOLDER', // e.g. sathish@example.com
    'phone' => 'YOUR_PHONE_PLACEHOLDER', // e.g. +91 98765 43210
    'location' => 'Tamil Nadu, India',
    'resume_link' => 'YOUR_RESUME_LINK',
    'github_link' => 'YOUR_GITHUB_LINK',
    'linkedin_link' => 'YOUR_LINKEDIN_LINK',
    
    // Media Placeholders
    'profile_image' => 'PROFILE_BACKGROUND_IMAGE',
    'hero_image' => 'YOUR_IMAGE_PATH',
    'about_image' => 'ABOUT_IMAGE',
    
    'bio' => 'Motivated Full Stack Developer with hands-on experience at Vhilv Technology Pvt Ltd, specializing in PHP Laravel, MySQL, HTML, CSS, JavaScript, and backend application development. Strong foundation in PC operations, Python, GitHub, and AWS cloud concepts. Passionate about building scalable, efficient web applications and eager to leverage technical expertise while continuously learning and contributing to innovative IT solutions.',

    // Social Media Links
    'socials' => [
        'github' => 'YOUR_GITHUB_LINK',
        'linkedin' => 'YOUR_LINKEDIN_LINK',
        'email' => 'YOUR_EMAIL_PLACEHOLDER',
    ],

    // Technical Skills Categorized
    'skills' => [
        'Languages' => [
            ['name' => 'PHP (Laravel)', 'level' => 90],
            ['name' => 'HTML5', 'level' => 95],
            ['name' => 'CSS3', 'level' => 90],
            ['name' => 'JavaScript', 'level' => 85],
            ['name' => 'Python', 'level' => 75],
        ],
        'Backend' => [
            ['name' => 'Core PHP', 'level' => 90],
            ['name' => 'PDO', 'level' => 85],
            ['name' => 'Model Based PHP Architecture', 'level' => 85],
            ['name' => 'MySQL', 'level' => 90],
            ['name' => 'Authentication', 'level' => 90],
            ['name' => 'Role Based Access Control', 'level' => 85],
        ],
        'Frontend' => [
            ['name' => 'HTML', 'level' => 95],
            ['name' => 'CSS', 'level' => 90],
            ['name' => 'JavaScript', 'level' => 85],
            ['name' => 'Responsive UI', 'level' => 90],
            ['name' => 'Cross Browser Support', 'level' => 85],
        ],
        'Database' => [
            ['name' => 'MySQL Design', 'level' => 90],
            ['name' => 'Database Optimization', 'level' => 85],
            ['name' => 'Secure Query Handling', 'level' => 90],
        ],
        'Cloud' => [
            ['name' => 'EC2', 'level' => 80],
            ['name' => 'VPC', 'level' => 75],
            ['name' => 'IAM', 'level' => 80],
            ['name' => 'S3', 'level' => 85],
            ['name' => 'DynamoDB', 'level' => 70],
            ['name' => 'EFS', 'level' => 70],
            ['name' => 'FSx', 'level' => 65],
            ['name' => 'CloudWatch', 'level' => 75],
            ['name' => 'CloudFront', 'level' => 75],
            ['name' => 'RDS', 'level' => 80],
            ['name' => 'Lambda', 'level' => 70],
        ],
        'Cloud Concepts' => [
            ['name' => 'Cloud Architecture', 'level' => 80],
            ['name' => 'Computing Fundamentals', 'level' => 85],
            ['name' => 'Security', 'level' => 80],
            ['name' => 'Identity Management', 'level' => 80],
            ['name' => 'Cloud Cost Management', 'level' => 75],
        ],
        'Tools' => [
            ['name' => 'Git', 'level' => 85],
            ['name' => 'GitHub', 'level' => 85],
            ['name' => 'VS Code', 'level' => 90],
            ['name' => 'phpMyAdmin', 'level' => 85],
            ['name' => 'XAMPP / WAMP', 'level' => 90],
            ['name' => 'cPanel', 'level' => 80],
            ['name' => 'Hosting Deployment', 'level' => 80],
        ],
    ],

    // Work Experience
    'experiences' => [
        [
            'company' => 'Vhilv Technology Pvt Ltd',
            'designation' => 'Full Stack Developer',
            'duration' => 'June 16 2025 – Present',
            'responsibilities' => [
                'Developed full stack web applications using Core PHP, PDO, MySQL, HTML, CSS and JavaScript with model-based backend architecture.',
                'Built secure admin panels and dashboards.',
                'Designed optimized MySQL databases.',
                'Developed e-commerce modules.',
                'Worked with AWS concepts.',
                'GitHub version control.',
                'Hosting deployment.'
            ]
        ]
    ],

    // Featured Projects
    'projects' => [
        [
            'name' => 'Invoice & Business Management Web Application',
            'description' => 'A comprehensive, enterprise-level business tool designed to manage invoices, purchases, sales, customers, and reporting for companies with multiple entities and currencies.',
            'image' => 'PROJECT_IMAGE',
            'technologies' => ['Core PHP', 'MySQL', 'HTML', 'CSS', 'JavaScript'],
            'live_link' => 'PROJECT_LIVE_LINK',
            'github_link' => 'PROJECT_GITHUB_LINK',
            'features' => [
                'Dashboard', 'Quotation', 'Proforma Invoice', 'Tax Invoice', 'Sales', 'Purchases', 
                'Expenses', 'Customers', 'Suppliers', 'Products', 'Reports', 'Role Based Permissions', 
                'Admin Panel', 'Multi Company', 'Multi Currency', 'GST', 'VAT', 'Payment Tracking', 
                'Inventory', 'PDF Invoice', 'Responsive UI', 'Secure Backend'
            ]
        ],
        [
            'name' => 'Fleet Management Manual Mode Web Application',
            'description' => 'A high-performance management dashboard for real-time tracking, hardware diagnostics, and network statistics optimized for telemetry networks.',
            'image' => 'PROJECT_IMAGE',
            'technologies' => ['Core PHP', 'MySQL', 'HTML', 'CSS', 'JavaScript'],
            'live_link' => 'PROJECT_LIVE_LINK',
            'github_link' => 'PROJECT_GITHUB_LINK',
            'features' => [
                'Fleet Dashboard', 'Live Telemetry', 'Device Health', 'Location Tracking', 
                'Database Optimization', 'Responsive Dashboard', 'Backend Modules', 
                'Time Series Database', 'Network Troubleshooting'
            ]
        ],
        [
            'name' => 'Ariviya Pet Products E-Commerce Website',
            'description' => 'A custom e-commerce solution built with a fully functional online shop, shopping cart, custom payment checkout, order tracking, and extensive admin dashboard.',
            'image' => 'PROJECT_IMAGE',
            'technologies' => ['Core PHP', 'MySQL', 'HTML', 'CSS', 'JavaScript'],
            'live_link' => 'PROJECT_LIVE_LINK',
            'github_link' => 'PROJECT_GITHUB_LINK',
            'features' => [
                'Home', 'Shop', 'Product Details', 'Categories', 'Wishlist', 'Cart', 'Checkout', 
                'Order Tracking', 'User Profile', 'Admin Panel', 'Inventory', 'Order Management', 
                'Customer Management', 'Blog', 'Analytics', 'Responsive UI'
            ]
        ],
        [
            'name' => 'Cyra Crafts Statue & Handicraft Website',
            'description' => 'An elegant visual storefront for statues and handicrafts, featuring advanced search filters, simple checkout flow, dynamic offers, and inventory administration.',
            'image' => 'PROJECT_IMAGE',
            'technologies' => ['Core PHP', 'MySQL', 'HTML', 'CSS', 'JavaScript'],
            'live_link' => 'PROJECT_LIVE_LINK',
            'github_link' => 'PROJECT_GITHUB_LINK',
            'features' => [
                'Shop', 'Categories', 'Search', 'Cart', 'Checkout', 'Order Tracking', 
                'Contact', 'Admin Dashboard', 'Offers', 'Inventory', 'Responsive UI', 'Product Filtering'
            ]
        ],
    ],

    // Certifications
    'certifications' => [
        [
            'title' => 'AWS Solutions Architect Associate',
            'issuer' => 'Kalvi Institute Private Limited',
            'image' => 'CERTIFICATE_IMAGE',
            'verify_link' => 'VERIFY_LINK_PLACEHOLDER',
        ]
    ],

    // Education
    'education' => [
        [
            'degree' => 'Bachelor of Engineering',
            'major' => 'Computer Science and Engineering',
            'institution' => 'Sembodai Rukmani Varatharajan Engineering College',
            'university' => 'Anna University',
            'duration' => '2020–2024',
            'score' => '79%'
        ]
    ],

    // Achievements
    'achievements' => [
        'First Prize in Technical Debugging Event',
        'Three Paper Presentations',
        'Second Prize',
        'Two Best Paper Awards',
        'Second Prize in Essay Writing Competition at the 12th National Voters\' Day Celebration, 2022, Nagapattinam'
    ],

    // Areas of Interest
    'interests' => [
        'Full Stack Web Development',
        'Backend Development',
        'Cloud Engineer',
        'Cloud Solutions Architect',
        'AWS Cloud Migration Specialist'
    ],

    // Core Attributes
    'attributes' => [
        ['name' => 'Problem Solving', 'level' => 95],
        ['name' => 'Critical Thinking', 'level' => 90],
        ['name' => 'Teamwork & Collaboration', 'level' => 95],
        ['name' => 'Time Management', 'level' => 90],
        ['name' => 'Strong Communication', 'level' => 90],
        ['name' => 'Adaptability & Flexibility', 'level' => 95]
    ]
];
