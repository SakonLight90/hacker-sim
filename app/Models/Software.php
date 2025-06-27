<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Software extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'type', 'level'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
