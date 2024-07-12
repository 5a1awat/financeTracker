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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->dateTime('datetime')->comment('Date time');
            $table->string('Name')->nullable()->comment('Name');
            $table->foreignId('account_id')->constrained()->noActionOnUpdate()->noActionOnDelete();
            $table->foreignId('category_id')->constrained()->noActionOnUpdate()->noActionOnDelete();
            $table->foreignId('country_id')->constrained()->noActionOnUpdate()->noActionOnDelete();
            $table->decimal('amount', 15, 2)->comment('Amount');
            $table->decimal('amount_account_currency', 15, 2)->nullable()
                ->comment('Amount account currency');
            $table->enum('type', ['income', 'expense', 'transfer', 'exchange', 'correction'])
                ->comment('Type');
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
        Schema::dropIfExists('transactions');
    }
};
