<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adware extends Model
{
    use HasFactory;

    protected $table = 'adware';

    protected $fillable = [
        'source_user_id',
        'target_user_id',
        'planted_at',
        'removed_at',
        'active',
        'last_income'
    ];

    public function planter()
    {
        return $this->belongsTo(User::class, 'source_user_id');
    }

    public function target()
    {
        return $this->belongsTo(User::class, 'target_user_id');
    }
}
