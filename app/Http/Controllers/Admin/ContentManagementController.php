<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class ContentManagementController extends Controller
{
    public function index(): View
    {
        $pages = [
            [
                'title' => 'Homepage',
                'description' => 'Main Nesostar landing page.',
                'url' => route('home'),
                'section' => 'Main Website',
            ],
            [
                'title' => 'About Us',
                'description' => 'Company information and introduction.',
                'url' => route('about'),
                'section' => 'Company',
            ],
            [
                'title' => 'Services',
                'description' => 'Services offered by Nesostar.',
                'url' => route('services'),
                'section' => 'Company',
            ],
            [
                'title' => 'Insights',
                'description' => 'Articles, updates and insights.',
                'url' => route('insights'),
                'section' => 'Resources',
            ],
            [
                'title' => 'Contact',
                'description' => 'Public contact page and inquiry form.',
                'url' => route('contact'),
                'section' => 'Contact',
            ],
            [
                'title' => 'Developer Program',
                'description' => 'Developer application page.',
                'url' => route('apply'),
                'section' => 'Programs',
            ],
        ];

        return view('admin.content.index', compact('pages'));
    }
}