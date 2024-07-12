<?php

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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Name');
            $table->enum('type', ['cash', 'card', 'deposit', 'loan'])->comment('Type');
            $table->foreignId('currency_id')->constrained()->noActionOnUpdate()->noActionOnDelete();
            $table->decimal('balance_start', 15)->default(0)->comment('Balance start');
            $table->string('comment')->nullable()->comment('Comment');
            $table->softDeletes();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
