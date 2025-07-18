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

    /**
     * Get the user that owns the software.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
