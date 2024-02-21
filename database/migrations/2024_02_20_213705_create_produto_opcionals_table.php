<?php

use App\Models\Opcional;
use App\Models\Produto;
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
        Schema::create('produto_opcional', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Produto::class);
            $table->foreignIdFor(Opcional::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produto_opcionals');
    }
};
