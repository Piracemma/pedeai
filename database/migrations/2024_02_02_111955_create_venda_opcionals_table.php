<?php

use App\Models\VendaItem;
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
        Schema::create('venda_opcionais', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(VendaItem::class);
            $table->string('nome', 30);
            $table->float('preco');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venda_opcionais');
    }
};
