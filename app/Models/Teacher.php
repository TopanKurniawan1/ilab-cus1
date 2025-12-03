<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    // protected $table = 'teachers';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'photo', // path file foto
    ];

    /**
     * Relasi: satu guru bisa mengajar banyak mata pelajaran.
     */
    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }

    /**
     * Relasi: satu guru muncul di banyak jadwal.
     */
    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
