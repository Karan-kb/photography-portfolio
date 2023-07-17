<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [

        'title',
        'description',
        'images',

    ];
    protected $casts = [
        'images' => 'array',
    ];
}
