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
        Schema::create('audit_logs', function (Blueprint $table) {
            $table->id('audit_id'); //primary key
            $table->unsignedBigInteger('user_id');
            $table->string('action_type', 100);
            $table->text('details')->nullable();
            $table->timestamp('time_stamp')->useCurrent();

            // Relationships
            $table->foreign('user_id')->references('user_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('audit_log', function(Blueprint $table){
            $table->dropForeign('audit_log_user_id,foreign');
        });
        Schema::dropIfExists('audit_logs');
    }
};
