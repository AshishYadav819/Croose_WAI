<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('business_name');
        $table->string('business_location');
        $table->string('email')->unique();
        $table->string('password');
        $table->tinyInteger('status')->default(1); // 1 = active, 0 = inactive
        $table->softDeletes(); // for soft delete
        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
