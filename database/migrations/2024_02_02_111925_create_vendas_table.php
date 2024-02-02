<?php

use App\Models\Finalizadora;
use App\Models\User;
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
        Schema::create('vendas', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Finalizadora::class);
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(User::class, 'vendedor_id');
            $table->float('produtos');
            $table->float('frete');
            $table->float('total');
            $table->text('observacao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendas');
    }
};
