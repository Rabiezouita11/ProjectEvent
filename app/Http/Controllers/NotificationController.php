<?php

namespace App\Http\Controllers;

use App\Models\Notifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user) {
            $notifications = Notifications::where('user_id', $user->id)
                ->where('is_read', false)
                ->orderBy('created_at', 'desc')
                ->get();

            $unreadCount = $notifications->count(); // Get the count of unread notifications

            // Prepare a response JSON object containing both notifications and the count
            $response = [
                'notifications' => $notifications,
                'unread_count' => $unreadCount,
            ];

            return response()->json($response);
        } else {
            return response()->json([]);
        }
    }
}
