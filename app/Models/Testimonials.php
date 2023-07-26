<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonials extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'company',
        'message',
        'image',
        'image1',
    ];

    protected $casts = [
        'image' => 'array',
        'image1' => 'array',
    ];
}
