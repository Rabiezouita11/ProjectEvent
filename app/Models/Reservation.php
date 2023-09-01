<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'user_id', 'event_id', 'nbr_ticket', 'created_at', 'updated_at'];
}
