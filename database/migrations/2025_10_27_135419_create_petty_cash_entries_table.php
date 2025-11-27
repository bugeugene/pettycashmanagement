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
        Schema::create('petty_cash_entries', function (Blueprint $table) {
            $table->id('entry_id'); //primary key
            $table->unsignedBigInteger('requester_id');
            $table->unsignedBigInteger('category_id');
            $table->text('purpose');
            $table->decimal('amount', 10, 2);
            $table->date('date');
            $table->string('entry_type')->default('Request');
            $table->unsignedBigInteger('created_by');
            $table->string('status')->default('Pending');
            $table->timestamps();
            $table->softDeletes();

            // Relationships
            $table->foreign('requester_id')->references('user_id')->on('users');
            $table->foreign('created_by')->references('user_id')->on('users');
            $table->foreign('category_id')->references('category_id')->on('petty_cash_categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('petty_cash_entries', function(Blueprint $table){
            $table->dropForeign('petty_cash_entries_requester_id_foreign');
            $table->dropForeign('petty_cash_entries_created_by_foreign');
            $table->dropForeign('petty_cash_entries_category_id_foreign');
        });
        Schema::dropIfExists('petty_cash_entries');
    }
};
