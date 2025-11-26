<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    /** @use HasFactory<\Database\Factories\EnrollmentFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'course_id',
        'status'
    ];
    protected $table = 'enrollments';

public function enrollments() {
    return $this->hasMany(Enrollment::class);
}
public function courses() {
    return $this->belongsToMany(Courses::class, 'enrollments');
}

}

