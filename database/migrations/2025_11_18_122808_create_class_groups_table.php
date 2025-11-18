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
    Schema::create('class_groups', function (Blueprint $table) {
        $table->id();
        $table->string('name');  // XII RPL 2
        $table->string('major')->nullable();
        $table->string('level')->nullable(); // X / XI / XII
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_groups');
    }
};
