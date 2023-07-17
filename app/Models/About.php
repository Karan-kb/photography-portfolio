<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'images',
        'description',
        'photos_taken',
        'projects_completed',
        'cups_of_coffee',
        'clients_working'
    ];
    
}
