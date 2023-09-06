<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationsAdmin extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'message', 'is_read', 'event_id'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function event()
    {
        return $this->belongsTo(Events::class);
    }
}
