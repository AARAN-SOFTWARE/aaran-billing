<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (Aaran\Aadmin\Src\Customise::hasMaster()) {

            Schema::create('products', function (Blueprint $table) {
                $table->id();
                $table->string('vname')->unique();
                $table->string('product_type')->nullable();
                $table->foreignId('common_id')->references('id')->on('commons');
                $table->string('units')->nullable();
                $table->string('gst_percent')->nullable();
                $table->decimal('quantity',12,2)->nullable();
                $table->string('active_id', 3)->nullable();
                $table->foreignId('user_id')->references('id')->on('users');
                $table->foreignId('company_id')->references('id')->on('companies');
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
