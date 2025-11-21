<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // =============================
        //  TABLE: accounts
        // =============================
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('role')->default('student');
            $table->timestamps();
        });

        // =============================
        //  TABLE: class_groups
        // =============================
        Schema::create('class_groups', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('major')->nullable();
            $table->string('level')->nullable();
            $table->timestamps();
        });

        // =============================
        //  TABLE: rooms
        // =============================
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // =============================
        //  TABLE: teachers
        // =============================
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('photo')->nullable();
            $table->timestamps();
        });

        // =============================
        //  TABLE: subjects
        // =============================
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->nullable();
            $table->unsignedBigInteger('teacher_id')->nullable();
            $table->timestamps();

            $table->foreign('teacher_id')
                ->references('id')->on('teachers')
                ->onDelete('set null');
        });

        // =============================
        //  TABLE: schedules
        // =============================
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('room_id');
            $table->unsignedBigInteger('class_id')->nullable();
            $table->unsignedBigInteger('subject_id')->nullable();
            $table->unsignedBigInteger('teacher_id')->nullable();

            $table->enum('day', [
                'Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'
            ]);

            $table->integer('lesson_number');
            $table->time('start_time');
            $table->time('end_time');

            $table->timestamps();

            // Foreign keys
            $table->foreign('room_id')
                ->references('id')->on('rooms')
                ->onDelete('cascade');

            $table->foreign('class_id')
                ->references('id')->on('class_groups')
                ->onDelete('set null');

            $table->foreign('subject_id')
                ->references('id')->on('subjects')
                ->onDelete('set null');

            $table->foreign('teacher_id')
                ->references('id')->on('teachers')
                ->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('schedules');
        Schema::dropIfExists('subjects');
        Schema::dropIfExists('teachers');
        Schema::dropIfExists('rooms');
        Schema::dropIfExists('class_groups');
        Schema::dropIfExists('accounts');
    }
};
