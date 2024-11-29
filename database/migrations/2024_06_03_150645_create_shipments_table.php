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
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->string('s_code');
            $table->string('author');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('user_id');
            $table->json('author_company');
            $table->json('customer');
            $table->json('carrier')->nullable();
            $table->json('upload_info')->nullable();
            $table->json('delivery_info')->nullable();
            $table->integer('status')->default(5);
            $table->string('price');
            $table->string('vat')->default('0.19');
            $table->string('carrier_price');
            $table->string('net_gain');
            $table->string('download_token')->nullable()->unique();
            $table->timestamp('invoice_date')->nullable();
            $table->integer('invoice_id')->nullable();
            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};
