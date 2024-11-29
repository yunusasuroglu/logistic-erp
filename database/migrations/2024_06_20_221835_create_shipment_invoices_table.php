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
        Schema::create('shipment_invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('shipment_id');
            $table->string('i_no');
            $table->string('author');
            $table->json('author_company');
            $table->json('customer');
            $table->json('upload_info');
            $table->json('delivery_info');
            $table->string('price');
            $table->string('vat')->default('0.19');
            $table->string('net_gain');
            $table->string('download_token')->nullable()->unique();
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('shipment_id')->references('id')->on('shipments');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipment_invoices');
    }
};
