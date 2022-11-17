<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'company',
        'description',
        'salary_range',
        'location',
        'tags',
        'expires_at',
        'applications'
    ];

    protected $casts = [
        'tags' => 'array',
        'applications' => 'array',
    ];
}
