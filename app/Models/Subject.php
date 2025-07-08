<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['name', 'course_id'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    
    public function enrollments()
    {
        return $this->hasMany(\App\Models\Enrollment::class);
    }
}
