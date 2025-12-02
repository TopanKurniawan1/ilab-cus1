<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    // protected $table = 'subjects';

    protected $fillable = [
        'name',
        'code',
        'teacher_id',
    ];

    /**
     * Relasi: subject dimiliki oleh satu guru.
     */
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    /**
     * Relasi: satu subject muncul di banyak jadwal.
     */
    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
