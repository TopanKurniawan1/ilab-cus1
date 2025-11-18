<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::create('schedules', function (Blueprint $table) {
        $table->id();

        $table->unsignedBigInteger('room_id');
        $table->unsignedBigInteger('class_id');
        $table->unsignedBigInteger('subject_id');
        $table->unsignedBigInteger('teacher_id');

        $table->enum('day', [
            'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'
        ]);

        $table->integer('lesson_number'); // 1 - 10

        $table->time('start_time');
        $table->time('end_time');

        $table->timestamps();

        // Foreign Keys
        $table->foreign('room_id')->references('id')->on('rooms')->cascadeOnDelete();
        $table->foreign('class_id')->references('id')->on('classes')->cascadeOnDelete();
        $table->foreign('subject_id')->references('id')->on('subjects')->cascadeOnDelete();
        $table->foreign('teacher_id')->references('id')->on('teachers')->cascadeOnDelete();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
