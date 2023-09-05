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
                ->orderBy('created_at', 'desc')
                ->get();



                $notificationsCount = Notifications::where('user_id', $user->id)
                ->where('is_read', false)
                ->orderBy('created_at', 'desc')
                ->get();

            $unreadCount = $notificationsCount->count(); // Get the count of unread notifications

            // Prepare a response JSON object containing both notifications and the count
            $response = [
                'notifications' => $notifications,
                'unread_count' => $unreadCount,
            ];
            foreach ($notifications as $notification) {
                $notification->event_id = $notification->event_id; // Change 'event_id' to the actual column name
            }
            return response()->json($response);
        } else {
            return response()->json([]);
        }
    }
    public function markAllAsRead(Request $request)
    {
        $user = Auth::user();

        if ($user) {
            // Mark all unread notifications as read
            Notifications::where('user_id', $user->id)->where('is_read', false)->update(['is_read' => true]);

            // Fetch updated notifications (including read ones)
            $notifications = Notifications::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

            // Prepare a response JSON object containing all notifications
            $response = [
                'notifications' => $notifications,
            ];

            return response()->json($response);
        }

        return response()->json([]);
    }
}
