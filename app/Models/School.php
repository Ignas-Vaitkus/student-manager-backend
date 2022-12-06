<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'address'
    ];

    protected $primaryKey = 'code';

    public $incrementing = false;

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
