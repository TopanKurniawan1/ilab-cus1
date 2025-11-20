<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        /*
        |--------------------------------------------------------------------------
        | ACCOUNTS (AUTH)
        |--------------------------------------------------------------------------
        */
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('role')->default('student'); // student, admin
            $table->timestamps();
        });

        /*
        |--------------------------------------------------------------------------
        | ROOMS (LAB)
        |--------------------------------------------------------------------------
        */
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        /*
        |--------------------------------------------------------------------------
        | TEACHERS
        |--------------------------------------------------------------------------
        */
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('photo')->nullable();
            $table->timestamps();
        });

        /*
        |--------------------------------------------------------------------------
        | CLASS GROUPS
        |--------------------------------------------------------------------------
        */
        Schema::create('class_groups', function (Blueprint $table) {
            $table->id();
            $table->string('name');   // contoh: 12 RPL 2
            $table->string('major')->nullable();
            $table->string('level')->nullable();
            $table->timestamps();
        });

        /*
        |--------------------------------------------------------------------------
        | SUBJECTS
        |--------------------------------------------------------------------------
        */
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->nullable();
            $table->foreignId('teacher_id')->nullable()->constrained('teachers')->nullOnDelete();
            $table->timestamps();
        });

        /*
        |--------------------------------------------------------------------------
        | SCHEDULES (JADWAL)
        |--------------------------------------------------------------------------
        */
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();

            $table->foreignId('room_id')->constrained('rooms')->cascadeOnDelete();
            $table->foreignId('class_id')->constrained('class_groups')->cascadeOnDelete();
            $table->foreignId('subject_id')->constrained('subjects')->cascadeOnDelete();
            $table->foreignId('teacher_id')->constrained('teachers')->cascadeOnDelete();

            $table->enum('day', [
                'Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'
            ]);

            $table->integer('lesson_number'); // jam ke-1 sampai 10
            $table->time('start_time');
            $table->time('end_time');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('schedules');
        Schema::dropIfExists('subjects');
        Schema::dropIfExists('class_groups');
        Schema::dropIfExists('teachers');
        Schema::dropIfExists('rooms');
        Schema::dropIfExists('accounts');
    }
};
