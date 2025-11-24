<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    // protected $table = 'schedules';

    protected $fillable = [
        'room_id',
        'class_id',
        'subject_id',
        'teacher_id',
        'day',
        'lesson_number',
        'start_time',
        'end_time',
    ];

    /**
     * Relasi ke Room (Lab).
     */
    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    /**
     * Relasi ke ClassRoom (Kelas).
     */
    public function classRoom()
    {
        return $this->belongsTo(ClassGroup::class, 'class_id');
    }

    /**
     * Relasi ke Subject (Mata Pelajaran).
     */
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    /**
     * Relasi ke Teacher (Guru).
     */
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
