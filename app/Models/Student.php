<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'first_name',
        'last_name',
        'grade',
        'parent_id',
        'school_id'
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
