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
        Schema::create('petty_cash_funds', function (Blueprint $table) {
            $table->id('fund_id');
            // $table->unsignedBigInteger('category_id');
            $table->decimal('limit', 10, 2)->default(0.00);
            $table->dateTime('last_replenished_at')->nullable();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

            // Relationship
            // $table->foreign('category_id')->references('category_id')->on('petty_cash_categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('petty_cash_fund', function(Blueprint $table){
            // $table->dropForeign('petty_cash_fund_category_id_foreign');
        });
        Schema::dropIfExists('petty_cash_funds');
    }
};
