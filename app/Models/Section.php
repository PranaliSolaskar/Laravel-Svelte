<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class section extends Model
{
    use HasFactory;
    protected $fillable = [
        'class_id',
        'name',
    ];

    protected $with = [
        'class',
    ];

    public function class()
    {
        return $this->belongsTo(Classe::class, 'class_id');
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
