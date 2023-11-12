<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docs extends Model
{
    protected $table = 'docs';

    protected $fillable = ['original_name', 'file_name', 'file_path'];
}
