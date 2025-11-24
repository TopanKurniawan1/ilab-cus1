<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassGroup extends Model
{
    use HasFactory;

    protected $table = 'class_groups';

    protected $fillable = [
        'name',
        'major',
        'level',
    ];

    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'class_id');
    }
}
