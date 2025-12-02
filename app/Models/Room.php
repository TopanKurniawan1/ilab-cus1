<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    // Jika tabel: rooms (default Laravel), tidak perlu $table
    // protected $table = 'rooms';

    protected $fillable = [
        'name',
        'code',
        'description',
    ];

    /**
     * Relasi: satu room memiliki banyak jadwal.
     */
    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
