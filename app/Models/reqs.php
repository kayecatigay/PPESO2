<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reqs extends Model
{
    protected $fillable = [
        'filename',
        'original_name',
    ];
}