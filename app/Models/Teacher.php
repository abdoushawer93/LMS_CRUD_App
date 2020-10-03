<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class teacher extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'suspended_at',
        'suspended_by',
        'password',
    ];

    public function addresses()
    {
        return $this->hasMany(Address::class, 'teacher_id');
    }

}
