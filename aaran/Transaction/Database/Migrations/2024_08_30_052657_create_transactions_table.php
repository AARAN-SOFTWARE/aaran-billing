<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contact_id')->references('id')->on('contacts');
            $table->string('acyear')->nullable();
            $table->string('trans_type');
            $table->string('mode');
            $table->string('vdate');
            $table->decimal('vname');
            $table->foreignId('receipttype_id')->references('id')->on('commons');
            $table->string('chq_no')->nullable();
            $table->string('chq_date')->nullable();
            $table->foreignId('bank_id')->references('id')->on('banks');
            $table->string('remarks');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
