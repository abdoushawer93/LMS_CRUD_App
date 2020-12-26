<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
