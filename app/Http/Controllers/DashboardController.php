<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Appointment;
use App\Models\ContactMessage;
use App\Models\Glass;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(Request $request): View
    {
        $user = $request->user();
        
        if ($user->is_admin) {
            return $this->adminDashboard();
        }
        
        return $this->userDashboard($user);
    }
    
    private function adminDashboard(): View
    {
        // Stats for admin
        $stats = [
            'pending_appointments' => Appointment::where('status', 'pending')->count(),
            'total_appointments' => Appointment::count(),
            'unread_messages' => ContactMessage::whereNull('response')->count(),
            'total_glasses' => Glass::count(),
            'total_users' => User::where('is_admin', false)->count(),
            'total_news' => News::count(),
        ];
        
        // Recent pending appointments
        $pendingAppointments = Appointment::with('user')
            ->where('status', 'pending')
            ->orderBy('date')
            ->orderBy('time_slot')
            ->take(5)
            ->get();
        
        // Recent unread messages
        $unreadMessages = ContactMessage::with('user')
            ->whereNull('response')
            ->orderByDesc('created_at')
            ->take(5)
            ->get();
        
        // Recent news
        $recentNews = News::latest('published_at')->take(3)->get();
        
        return view('dashboard', compact(
            'stats',
            'pendingAppointments',
            'unreadMessages',
            'recentNews'
        ));
    }
    
    private function userDashboard($user): View
    {
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
