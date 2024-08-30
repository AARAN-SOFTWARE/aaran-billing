<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('acyear')->nullable();
            $table->foreignId('company_id')->references('id')->on('companies');

            $table->foreignId('contact_id')->references('id')->on('contacts');
            $table->string('paid_to')->nullable();
            $table->string('purpose')->nullable();
            $table->foreignId('order_id')->references('id')->on('orders');

            $table->foreignId('trans_type_id')->references('id')->on('commons');
            $table->foreignId('mode_id')->references('id')->on('commons');

            $table->string('vdate');
            $table->decimal('amount', 15, 2);

            $table->foreignId('receipttype_id')->references('id')->on('commons');
            $table->string('remarks');
            $table->string('chq_no')->nullable();
            $table->string('chq_date')->nullable();
            $table->foreignId('bank_id')->references('id')->on('commons');
            $table->string('deposit_on')->nullable();
            $table->string('realised_on')->nullable();

            $table->foreignId('against_id')->references('id')->on('commons');
            $table->string('ref_no')->nullable();
            $table->string('ref_amount')->nullable();

            $table->string('verified_by')->nullable();
            $table->string('verified_no')->nullable();

            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
