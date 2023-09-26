<?php

use App\Models\Examination;
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
        Schema::create('pawns', function (Blueprint $table) {
            $table->string('contract_id')->primary();
            $table->foreignIdFor(User::class, 'customer_id');
            $table->foreignIdFor(Examination::class, 'examination_id');
            $table->dateTime('contract_date');
            $table->dateTime('expiry_date');
            $table->float('interest_rate');
            $table->float('loan_amount');
            $table->integer('total_term');
            $table->float('fine');
            $table->float('paid_amount');
            $table->integer('paid_term');
            $table->dateTime('next_payment');
            $table->string('status')->default('unfinish'); //unfinish, finish
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pawns');
    }
};
