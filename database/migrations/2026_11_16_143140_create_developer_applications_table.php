<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('developer_applications', function (Blueprint $table): void {
            $table->id();
            $table->string('first_name', 80);
            $table->string('second_name', 80)->nullable();
            $table->string('surname', 80);
            $table->string('email', 180);
            $table->string('phone', 40);
            $table->string('instagram', 100)->nullable();
            $table->string('portfolio')->nullable();
            $table->text('motivation');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('developer_applications');
    }
};
