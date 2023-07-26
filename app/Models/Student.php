<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\InteractsWithMedia;


class student extends Model
{
    use HasFactory;
    //use InteractsWithMedia;

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'address',
        'class_id',
        'section_id',
    ];

    protected $with = [
        'class',
        'section',
    ];

    public function class()
    {
        return $this->belongsTo(classe::class, 'class_id');
    }

    public function section()
    {
        return $this->belongsTo(section::class);
    }
}
