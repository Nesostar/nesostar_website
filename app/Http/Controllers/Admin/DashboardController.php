<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DeveloperApplication;
use App\Models\Inquiry;
use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('admin.dashboard', [
            'inquiryCount' => Inquiry::count(),

            'applicationCount' => DeveloperApplication::count(),

            'userCount' => User::where('is_admin', false)->count(),
        ]);
    }
}
