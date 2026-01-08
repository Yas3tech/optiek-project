<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(Request $request): View
    {
        $user = $request->user();
        
        $appointmentCounts = [
            'pending' => $user->appointments()->where('status', 'pending')->count(),
            'approved' => $user->appointments()->where('status', 'approved')->count(),
            'rejected' => $user->appointments()->where('status', 'rejected')->count(),
        ];
        
        $nextAppointment = $user->appointments()
            ->where('status', 'approved')
            ->where('date', '>=', now()->toDateString())
            ->orderBy('date')
            ->orderBy('time_slot')
            ->first();
        
        $recentNews = News::latest('published_at')->take(3)->get();
        
        return view('dashboard', compact(
            'appointmentCounts',
            'nextAppointment',
            'recentNews'
        ));
    }
}
