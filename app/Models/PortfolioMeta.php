<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioMeta extends Model
{
    use HasFactory;
    protected $fillable =[
        'title',
        'meta_tags',
        'meta_description'

    ];
}
