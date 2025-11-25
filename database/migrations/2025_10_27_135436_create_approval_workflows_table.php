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
        Schema::create('approval_workflows', function (Blueprint $table) {
            $table->id('workflow_id'); //primary key
            // $table->unsignedBigInteger('fund_id');
            $table->unsignedBigInteger('entry_id');
            $table->unsignedBigInteger('approver_id');
            // $table->string('approve_role');
            $table->string('status');
            $table->text('remarks')->nullable();
            $table->timestamp('created_at')->useCurrent();

            // Relationship
            // $table->foreign('fund_id')->references('fund_id')->on('petty_cash_funds');
            $table->foreign('entry_id')->references('entry_id')->on('petty_cash_entries');
            $table->foreign('approver_id')->references('user_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('approval_workflows', function(Blueprint $table){
            // $table->dropForeign('approval_workflows_fund_id_foreign');
            $table->dropForeign('approval_workflow_entry_id_foreign');
            $table->dropForeign('approval_workflow_approver_id_foreign');
        });
        Schema::dropIfExists('approval_workflows');
    }
};
