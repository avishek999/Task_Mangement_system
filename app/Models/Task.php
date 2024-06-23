<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    const STATUS_PENDING = 0;
    const STATUS_IN_PROGRESS = 1;
    const STATUS_COMPLETED = 2;

    protected $fillable = [
        'title',
        'description',
        'deadline',
        'status',
        'user_id',
    ];

    protected $casts = [
        'deadline' => 'datetime',
    ];
}

