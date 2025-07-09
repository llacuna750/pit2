<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'description',
        'title', // ✅ Step 4: Create Master Tables
    ];
}
