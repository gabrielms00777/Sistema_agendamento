<?php

use App\Models\Client;
use App\Models\Professional;
use App\Models\Service;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('schedulings', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Client::class);
            $table->foreignIdFor(Service::class);
            $table->foreignIdFor(Professional::class);
            $table->date('date');
            $table->time('time');
            $table->decimal('value');
            $table->enum('status', ['pending', 'confirmed', 'rejected', 'realized'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedulings');
    }
};
