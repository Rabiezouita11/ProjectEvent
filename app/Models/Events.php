<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;
    protected $fillable = ['status'];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
    public function isAvailable()
    {
        return $this->Nombre_total_abonnés > 0;
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
